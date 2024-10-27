<?php
require_once "dal/product.php";
require_once "validators/product-validator.php";

function updateProduct() {
    $name = $_POST["name"];
    $qty = $_POST["qty"];
    $price = $_POST["price"];

    $error = validateProduct($name, $qty, $price);

    if ($error) {
        $_SESSION["error"] = $error;

        $_SESSION["fields"]["name"] = $_POST["name"];
        $_SESSION["fields"]["qty"] = $_POST["qty"];
        $_SESSION["fields"]["price"] = $_POST["price"];
        header("Location: ".PROJECT_FOLDER."/update-product?id=".$_GET["id"]);
        return;
    } 
    
    updateProductById($_GET["id"], $name, $qty, $price);
    $_SESSION["message"] = "Updated successfully";
    header("Location: ".PROJECT_FOLDER."/");
}