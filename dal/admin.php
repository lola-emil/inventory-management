<?php

require_once "config/dbconnection.php";



function getAdminByUsername($username) {
    $conn = dbconnection();
    $sql = "SELECT * FROM tbl_admin WHERE username = '".$username."'";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) 
        return $result->fetch_assoc();
    else
        return null;
}

function getAdminById($id) {
    $conn = dbconnection();
    $sql = "SELECT * FROM tbl_admin WHERE id = '".$id."'";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) 
        return $result->fetch_assoc();
    else
        return null;
}
