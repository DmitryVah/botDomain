<?php
/**
 * Класс инициализации маршрутов
 */
class Route
{
    /**
     * Метод для обработки входящих маршрутов
     *
     * Доступно 2 вида путей
     * .../bot - инициализация бота telegram
     * .../check - инициализация проверки доменов
    */
    public static function create()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if ($routes[1] === 'bot'){
            include "./Controllers/TelegramController.php";
            $bot = new Bot();
        } elseif ($routes[1] === 'check') {
            include "./Controllers/CheckerController.php";
            $checker = new CheckDomain();
        } else {
            $route = new Route();
            $route->ErrorPage404();
        }

        die();
    }

    /**
     * Метод для обработки маршрутов которые не заданы в create
     * @redirect /404
    */
    function ErrorPage404()
{
    header('HTTP/1.1 404 Not Found');
    header("Status: 404 Not Found");
    echo "<h1>404 — страница не найдена</h1>";
    die();
}

}
