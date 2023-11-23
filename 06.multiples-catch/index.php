<?php

function divide($dividendo, $divisor): int|float
{
    if ($divisor === 0) {
        throw new Exception('No se puede dividir por cero');
    }

    if (!is_int($dividendo) || !is_int($divisor)) {
        throw new \http\Exception\InvalidArgumentException('Los argumentos deben ser números enteros');
    }

    return $dividendo / $divisor;
}

try {
    echo divide(100, 0);
} catch (InvalidArgumentException $exception) {
    echo 'InvalidArgumentException: ' . $exception->getMessage();
} catch (Exception $exception) {
    echo 'Exception: ' . $exception->getMessage();
}
