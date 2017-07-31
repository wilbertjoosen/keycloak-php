<?php
namespace WilbertJoosen\KeycloakPHP\Keycloak\Service;

use WilbertJoosen\KeycloakPHP\Constant\KeycloakEndpoints;
use WilbertJoosen\KeycloakPHP\Traits\Config;

class UserService extends ServiceAbstract
{
    use Config;

    public function __construct()
    {
        $this->keycloakConsumer = "User";
        $this->url = Config::setUriParams(KeycloakEndpoints::KEYCLOAK_URI_USER_CRUD, $this->config['connection']['realm']);
    }
}