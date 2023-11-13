<?php

$dividendo = 100;
$divisor = 0;

try {
    if ($divisor === 0) {
        throw new Exception('No se puede dividir por cero');
    }
    echo $resultado = $dividendo / $divisor;
} catch (Exception $exception) {
    echo $exception->getMessage();
}
