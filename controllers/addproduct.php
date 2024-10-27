<?php
require_once "dal/product.php";
require_once "validators/product-validator.php";

function addProduct() {
    $name = $_POST["name"];
    $qty = $_POST["qty"];
    $price = $_POST["price"];

    $error = validateProduct($name, $qty, $price);

    if ($error) {
        $_SESSION["error"] = $error;

        $_SESSION["fields"]["name"] = $_POST["name"];
        $_SESSION["fields"]["qty"] = $_POST["qty"];
        $_SESSION["fields"]["price"] = $_POST["price"];

        header("Location: ".PROJECT_FOLDER."/add-product");
        return;
    } 

    // Insert new product to the database
    insertProduct($name, $qty, $price);
    $_SESSION["message"] = "Added successfully";
    header("Location: ".PROJECT_FOLDER."/");
}