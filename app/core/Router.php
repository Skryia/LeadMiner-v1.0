<?php

namespace App\Core;

class Router
{
    public function resolve(): void
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        switch ($path) {
            case '/':
                $controller = new \App\Controllers\HomeController();
                $controller->index();
                break;

            default:
                http_response_code(404);
                echo "404 - Not Found";
                break;
        }
    }
}
