<?php
if (!isset($_SESSION["ADMIN_ID"]))
  header("Location: /inventory-management/signin");

require_once "dal/product.php";

if (!isset($_GET["id"])) {
    header("Location: ".PROJECT_FOLDER."/");
    return;
}


$id = $_GET["id"];

softDeleteProductById($id);

$_SESSION["message"] = "Product moved to 'Deleted Products'";
header("Location: ".PROJECT_FOLDER."/");