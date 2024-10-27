<?php
require_once "config/dbconnection.php";

function getAllProducts() {
    $conn = dbconnection();
    $sql = "SELECT *, tbl_product.id AS product_id, "
    ." CONCAT(u.firstname, ' ', u.lastname) as updated_by,"
    ." tbl_product.created_date as created_date,"
    ." tbl_product.updated_date as updated_date,"
    ." CONCAT(c.firstname, ' ', c.lastname) as created_by FROM tbl_product"
    ." LEFT JOIN tbl_admin as c ON c.id = tbl_product.created_by"
    ." LEFT JOIN tbl_admin as u ON u.id = tbl_product.updated_by"
    ." WHERE tbl_product.deleted_date IS NULL"
    ." ORDER BY tbl_product.created_date DESC"
    ;
    
    $result = mysqli_query($conn, $sql);
    $products = [];

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}


function getAllDeletedProducts() {
    $conn = dbconnection();
    $sql = "SELECT *, tbl_product.id AS product_id, "
    ." tbl_product.deleted_date as deleted_date,"
    ." CONCAT(c.firstname, ' ', c.lastname) as deleted_by FROM tbl_product"
    ." LEFT JOIN tbl_admin as c ON c.id = tbl_product.deleted_by"
    ." WHERE tbl_product.deleted_date IS NOT NULL"
    ." ORDER BY tbl_product.deleted_date DESC"
    ;
    
    $result = mysqli_query($conn, $sql);
    $products = [];

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}


function insertProduct($name, $qty, $price) {
    $adminId = $_SESSION["ADMIN_ID"];
    $conn = dbconnection();
    $sql = "INSERT INTO tbl_product (name, qty, price, created_by) "
    ." VALUES ('".$name."', ".$qty.", ".$price.", ".$adminId." )";

    return mysqli_query($conn, $sql);
}

function getProductById($id) {
    $conn = dbconnection();
    $sql = "SELECT * FROM tbl_product WHERE id = '".$id."'";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) 
        return $result->fetch_assoc();
    else
        return null;
}

function searchProduct($q) {
    $conn = dbconnection();
    $sql = "SELECT *, tbl_product.id AS product_id, "
    ." CONCAT(u.firstname, ' ', u.lastname) as updated_by,"
    ." tbl_product.created_date as created_date,"
    ." tbl_product.updated_date as updated_date,"
    ." CONCAT(c.firstname, ' ', c.lastname) as created_by FROM tbl_product"
    ." LEFT JOIN tbl_admin as c ON c.id = tbl_product.created_by"
    ." LEFT JOIN tbl_admin as u ON u.id = tbl_product.updated_by"
    ." WHERE name LIKE '%".$q."%'" 
    ." AND tbl_product.deleted_by IS NULL"
    ." AND tbl_product.deleted_date IS NULL"
    ." ORDER BY tbl_product.created_date DESC"
    ;

    $result = mysqli_query($conn, $sql);
    $products = [];

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    return $products;
}

function searchDeletedProduct($q) {
    $conn = dbconnection();
    $sql = "SELECT *, tbl_product.id AS product_id, "
    ." tbl_product.deleted_date as deleted_date,"
    ." CONCAT(c.firstname, ' ', c.lastname) as deleted_by FROM tbl_product"
    ." LEFT JOIN tbl_admin as c ON c.id = tbl_product.deleted_by"
    ." WHERE name LIKE '%".$q."%'" 
    ." AND tbl_product.deleted_by IS NOT NULL"
    ." AND tbl_product.deleted_date IS NOT NULL"
    ." ORDER BY tbl_product.deleted_date DESC"
    ;

    $result = mysqli_query($conn, $sql);
    $products = [];

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    return $products;
}


function updateProductById($id, $name, $qty, $price) {
    $conn = dbconnection();
    $sql = "UPDATE tbl_product SET name = '".$name."', "
    ."qty = ".$qty.", "
    ."price = ".$price.", "
    ."updated_by = ".$_SESSION["ADMIN_ID"].", "
    ."updated_date = CURRENT_TIMESTAMP"
    ." WHERE id = ".$id
    ;

    return mysqli_query($conn, $sql);
}

function softDeleteProductById($id) {
    $conn = dbconnection();
    $sql = "UPDATE tbl_product SET deleted_date = CURRENT_TIMESTAMP,"
    ." deleted_by = '".$_SESSION["ADMIN_ID"]."' "
    ." WHERE id = '".$id."'";    

    return mysqli_query($conn, $sql);
}


function hardDeleteProductById($id) {
    $conn = dbconnection();
    $sql = "DELETE FROM tbl_product WHERE id = '".$id."'";

    return mysqli_query($conn, $sql);
}

function restoreProductById($id) {
    $conn = dbconnection();
    $sql = "UPDATE tbl_product SET "
    ." deleted_by = NULL,"
    ." deleted_date = NULL"
    ." WHERE id = ".$id
    ;

    return mysqli_query($conn, $sql);
}