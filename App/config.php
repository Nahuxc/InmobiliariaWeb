<?php

$folderPath = dirname($_SERVER["SCRIPT_NAME"]);
$urlPath = $_SERVER["REQUEST_URI"];
$url = substr($urlPath, strlen($folderPath));


//variables globales
define("URL", $url);
define("URL_PATH", $folderPath);

?>