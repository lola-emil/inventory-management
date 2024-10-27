<?php

define("PROJECT_FOLDER", "/inventory-management");
define("PROJECT_TITLE", "Inventory Management");

define("VIEWS_FOLDER", "views");
define("CONTROLLERS_FOLDER", "controllers");

$routes = [

    // Pages
    PROJECT_FOLDER."/" => [
        "title" => PROJECT_TITLE." | Dashboard",
        "page" => VIEWS_FOLDER."/dashboard.php"     
    ],

    PROJECT_FOLDER."/signin" => [
        "title" => PROJECT_TITLE." | Sign In",
        "page" => VIEWS_FOLDER."/signin.php"     
    ],

    PROJECT_FOLDER."/add-product" => [
        "title" => PROJECT_TITLE." | Add Product",
        "page" => VIEWS_FOLDER."/addProductPage.php"     
    ],

    PROJECT_FOLDER."/update-product" => [
        "title" => PROJECT_TITLE." | Update Product",
        "page" => VIEWS_FOLDER."/updateProductPage.php"     
    ],

    PROJECT_FOLDER."/deleted-products" => [
        "title" => PROJECT_TITLE." | Deleted Product",
        "page" => VIEWS_FOLDER."/deletedProductsPage.php"     
    ],


    // Controllers

    PROJECT_FOLDER."/soft-delete-product" => [
        "title" => "Deleting Product",
        "page" => CONTROLLERS_FOLDER."/deleteProduct.php"     
    ],

    PROJECT_FOLDER."/hard-delete-product" => [
        "title" => "Deleting Product",
        "page" => CONTROLLERS_FOLDER."/hardDeleteProduct.php"     
    ],

    PROJECT_FOLDER."/restore-product" => [
        "title" => "Restoring Product",
        "page" => CONTROLLERS_FOLDER."/restoreProduct.php"     
    ],

    PROJECT_FOLDER."/signout" => [
        "title" => "Signing Out",
        "page" => CONTROLLERS_FOLDER."/signout.php"     
    ],

    // 404 Page
    "*" => [
        "title" => PROJECT_TITLE." | Page Not Found",
        "page" => VIEWS_FOLDER."/404Page.php"     
    ],
];

