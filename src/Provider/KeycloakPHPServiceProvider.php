<?php

namespace WilbertJoosen\KeycloakPHP\Provider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use WilbertJoosen\KeycloakPHP\Keycloak\Service\Factory\ServiceFactory;
class KeycloakPHPServiceProvider extends ServiceProvider
{
    protected $defer = false;
    public function boot()
    {
        include __DIR__.'/../Http/routes.php';
        $this->app->configure('keycloak-php');
    }

    public function register()
    {
        //Controllers
        $this->app->make("WilbertJoosen\KeycloakPHP\Http\Controllers\AuthController");

        //Services
        $this->app->bind('WilbertJoosen\KeycloakPHP\Keycloak\Service\Contracts\ServiceContract', function () {
            $request = app(Request::class);
            return new ServiceFactory($request);
        });

    }

    protected function setupConfig($app)
    {
        $config = realpath(__DIR__.'/../config/keycloak-php.php');
        if ($app->runningInConsole()) {
            $this->publishes([
                $config => base_path('config/keycloak-php.php'),
            ]);
        }
        $this->mergeConfigFrom($config, 'keycloak-php');
    }

    public function provides()
    {
        return [
            \WilbertJoosen\KeycloakPHP\Keycloak\Service\Contracts\ServiceContract::class
        ];
    }
}