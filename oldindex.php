<?
print("Hellow World!");

class Car
{
    public $color = 'White';
    public $speed;
    public $fuel;
    public $brand;

    public function test()
    {
        echo '<br>test function';
    }

    public function tripTime($distance)
    {
        $time = $distance / $this->speed;
        return $time;
    }

    public function __construct()
    {
        echo '<br>New Object of class: ' . __CLASS__ . ' created';
        echo '<br>Metod ' . __METHOD__ . ' colled';
    }

    public function __destruct()
    {
        //echo '<br>New Object of class: '.__CLASS__.' created';
        //echo '<br>Metod '.__METHOD__.' colled';
    }

}

$car1 = new Car;
$car1->brand = 'Audi';
$car1->speed = 110;
$car1->fuel = 12;

$car2 = new Car;
$car2->brand = 'Mesrcedes';
$car2->speed = 130;
$car2->fuel = 14;
$car2->color = 'Black';

echo '<pre>';

print_r($car1);
print_r($car2);
echo $car2->color;
$car1->test();
$car2->test();
echo '<br>Car1 Time: ' . $car1->tripTime(1000);
echo '<br>Car2 Time: ' . $car2->tripTime(1000);
echo '</pre>';
?>
    <p>Практика</p>
<?
$string = 'Ученик сидит за партой.';
$pattern = '/сидит/';
$result = preg_match($pattern, $string);
var_dump($result);
echo '<br>';
// FRONT CONTROLLER

// Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Подключение файлов системы
define('ROOT', dirname(__FILE__));
echo ROOT;
echo '<br>';
require_once(ROOT . '/components/Router.php');

// Соединение с базой данных

// Вызов Router
$router = new Router();
$router->run();

//print_r($_SERVER);




