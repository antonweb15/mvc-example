<?php
include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class CatalogController
{
    public static function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts();
        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }

    public static function actionCategory($categoryId)
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $categoryProducts = array();
        $categoryProducts = Product::getLatestProductsListByCategory($categoryId);
        require_once(ROOT . '/views/catalog/category.php');
        return true;
    }
}