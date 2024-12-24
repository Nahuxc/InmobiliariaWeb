
<?php

    /* iniciar la sesion */
    session_status() === PHP_SESSION_ACTIVE ?: session_start();

    require_once(__DIR__."/../App/autoload.php");

    $router = new Router();
    $router->run();


?>

