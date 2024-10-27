<?php
require_once "dal/admin.php";

function validateUserLogin ($username, $password) {
    $matchedUser = getAdminByUsername($username);
    
    if (!$matchedUser) {
        return "Invalid username";
    }

    if (!password_verify($password, $matchedUser["password"])) {
        return "Incorrect password";
    }

    return null;
}