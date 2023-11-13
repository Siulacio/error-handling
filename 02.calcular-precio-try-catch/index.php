<?php

$dividendo = 100;
$divisor = 0;

try {
    echo $resultado = $dividendo / $divisor;
} catch (DivisionByZeroError $exception) {
    echo $exception->getMessage();
}
