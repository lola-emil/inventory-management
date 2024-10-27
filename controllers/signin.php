<?php
require_once "dal/admin.php";
require_once "validators/user-validator.php";

function signin() {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $matchedUser = getAdminByUsername($username);

    $error = validateUserLogin($username, $password);

    if ($error) {
        $_SESSION["error"] = $error;
        $_SESSION["fields"]["username"] = $_POST["username"];
        $_SESSION["fields"]["password"] = $_POST["password"];

        header("Location: ".PROJECT_FOLDER."/signin");
        return;
    }

    // If sakto tanan, redirect ta sa dashboard
    $_SESSION["ADMIN_ID"] = $matchedUser["id"];
    header("Location: ".PROJECT_FOLDER."/");
}