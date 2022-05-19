<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI()
    {
        // Return request string
        if (!empty($_SERVER['REQUEST_URI'])) {
            $uri = trim($_SERVER['REQUEST_URI'], '/');
        }
        return $uri;
    }

    public function run()
    {
        // Получить строку запроса
        $uri = $this->getURI();
        //echo $uri;
        //echo "</br>";
        // Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            //echo "</br> $uriPattern->$path </br>";
            // Сравниваем $uri и $uriPattern
            if (preg_match("~$uriPattern~", $uri)) {
                //echo '</br> Где ищем: ' . $uri;
                //echo '</br> Что ищем - совпадение из правила: ' . $uriPattern;
                //echo '</br> Кто обрабатывает: ' . $path;
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                //echo '</br> Получаем внутренний путь: ' .  $internalRoute;
                // echo $path;
                // Определить какой контроллер и acntion обрабатывает запрос
                $segments = explode('/', $internalRoute);
                //echo '<pre>';
                //print_r($segments);
                //echo '<pre>';
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = 'action' . ucfirst(array_shift($segments));
                //echo '<br>controllerName: ' . $controllerName;
                //echo '<br>actionName: ' . $actionName;
                $parameteres = $segments;
                //echo '<pre>';
                //print_r($parametres);
                //die();
                // Подключить файл класса контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once $controllerFile;
                }
                // Создать объект, вызвать метод(то есть action)
                $controllerObject = new $controllerName;

                //$result = $controllerObject->$actionName($parametres);
                $result = call_user_func_array(array($controllerObject, $actionName), $parameteres);


                if ($result != null) {
                    break;
                }
            }

        }

    }

}