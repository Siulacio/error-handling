<?php

class InvalidControllerException extends Exception {};
class InvalidActionException extends Exception {};
class InvalidUrlException extends Exception {};

/**
 * @throws InvalidUrlException
 * @throws InvalidControllerException
 * @throws InvalidActionException
 */
function parseActionUrl(string $url): array
{
    $url = trim(string: $url, characters: '/');
    $urlParts = explode(separator: '/', string: $url);

    if (empty($url)) {
        return [
            'controller' => 'HomeController',
            'action' => 'index',
        ];
    }

    if (preg_match('/[^a-z]/', $urlParts[0])) {
        throw new InvalidControllerException('El controlador no es válido, solo deben ser letras minusculas');
    }

    if (count($urlParts) === 1) {
        return [
            'controller' => ucfirst($urlParts[0]) . 'Controller',
            'action' => 'index',
        ];
    }

    if (preg_match('/[^a-z]/', $urlParts[1])) {
        throw new InvalidActionException('La acción no es válida, solo deben ser letras minusculas');
    }

    if (count($urlParts) === 2) {
        return [
            'controller' => ucfirst($urlParts[0]) . 'Controller',
            'action' => $urlParts[1],
        ];
    }

    throw new InvalidUrlException('La url no es válida');
}

try {

    $urlParts = parseActionUrl($_SERVER['REQUEST_URI']);
    $controller = $urlParts['controller'];
    $action = $urlParts['action'];

    echo "Controller: $controller, Action: $action";

} catch (InvalidControllerException $exception) {
    echo 'InvalidControllerException: ' . $exception->getMessage();
} catch (InvalidActionException $exception) {
    echo 'InvalidActionException: ' . $exception->getMessage();
} catch (InvalidUrlException $exception) {
    echo 'InvalidUrlException: ' . $exception->getMessage();
}



