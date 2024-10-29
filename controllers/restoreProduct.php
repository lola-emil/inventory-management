<?php
if (!isset($_SESSION["ADMIN_ID"]))
  header("Location: /signin");

require_once "dal/product.php";

if (!isset($_GET["id"])) {
    header("Location: ".PROJECT_FOLDER."/");
    return;
}

$id = $_GET["id"];

restoreProductById($id);

$_SESSION["message"] = "Restored successfully";
header("Location: ".PROJECT_FOLDER."/deleted-products");