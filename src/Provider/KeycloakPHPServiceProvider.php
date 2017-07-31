<?php

namespace WilbertJoosen\KeycloakPHP\Provider;

use Illuminate\Support\ServiceProvider;

class KeycloakPHPServiceProvider extends ServiceProvider
{
    public function boot()
    {
        include __DIR__.'/../Http/routes.php';
    }

    public function register()
    {
        $this->app->make("WilbertJoosen\KeycloakPHP\Http\Controllers\AuthController");
    }
}