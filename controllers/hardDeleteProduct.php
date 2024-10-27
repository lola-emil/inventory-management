<?php
if (!isset($_SESSION["ADMIN_ID"]))
  header("Location: /inventory-management/signin");

require_once "dal/product.php";

if (!isset($_GET["id"])) {
    header("Location: ".PROJECT_FOLDER."/");
    return;
}


$id = $_GET["id"];

hardDeleteProductById($id);

$_SESSION["message"] = "Deleted successfully";
header("Location: ".PROJECT_FOLDER."/deleted-products");