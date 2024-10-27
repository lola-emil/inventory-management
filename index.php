<?php
session_start();

require_once "utils/route-utils.php";

$requestUri = $_SERVER['REQUEST_URI'];
$requestUri = strtok($requestUri, '?'); // Remove queries

$view = array_key_exists($requestUri, $routes) ?
$routes[$requestUri] :
$routes["*"];

?>

<!DOCTYPE html>
<html lang="en" data-theme="business">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $view["title"] ?></title>
    
    <link rel="stylesheet" href="<?= PROJECT_FOLDER ?>/assets/css/style.css">
</head>
<body>

<?php
    // Pages goes here
    require_once $view["page"];
?>

<script src="<?= PROJECT_FOLDER ?>/assets/js/toast.js"></script>
<script src="<?= PROJECT_FOLDER ?>/assets/js/inputnumber.js"></script>
</body>
</html>