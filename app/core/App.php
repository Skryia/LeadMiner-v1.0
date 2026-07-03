<?php

namespace App\Core;

class App
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function run(): void
    {
        $this->router->resolve();
    }
}
