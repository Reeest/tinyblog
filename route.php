<?php

/**
 * Типа роутер
 * Class Route
 */
class Route
{
    static function start()
    {
        // контроллер и действие по умолчанию
        $controllerName = 'Main';
        $actionName = 'index';
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        // получаем имя контроллера
        if (!empty($routes[2])) {
            $controllerName = $routes[2];
        }
        // получаем имя экшена
        if (!empty($routes[3])) {
            $actionName = $routes[3];
        }
        // добавляем префиксы
        $controllerName = 'Controller_' . $controllerName;
        // подцепляем файл с классом контроллера
        $controllerPath = str_replace('_', '/', $controllerName) . '.php';
        if (file_exists($controllerPath)) {
            include $controllerPath;
        } else {
            Route::ErrorPage404();
        }
        // создаем контроллер
        $controller = new $controllerName;
        if (method_exists($controller, $actionName)) {
            $controller->$actionName($_REQUEST);
        } else {
            Route::ErrorPage404();
        }

    }

    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}