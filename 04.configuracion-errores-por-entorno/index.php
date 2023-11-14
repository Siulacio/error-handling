<?php

/*
 * importamos libreria para manejo de variables de entorno
 * validamos el entorno para determinar el manejo de errores
 */

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if ($_ENV['APP_ENV'] === 'production') {
    error_reporting(0);
} else {
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 1);
    ini_set('log_errors', 1);
    ini_set('error_log', __DIR__ . '/logs/php_errors.log');
}

$dividendo = 100;
$divisor = 0;
$resultado = $dividendo / $divisor;
