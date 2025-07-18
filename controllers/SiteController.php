<?php
include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class SiteController
{
    public static function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(3);
        require_once(ROOT . '/views/site/index.php');
        return true;
    }
}