<?php
namespace WilbertJoosen\KeycloakPHP\Keycloak\Service;

use WilbertJoosen\KeycloakPHP\Constant\KeycloakEndpoints;
use WilbertJoosen\KeycloakPHP\Keycloak\Config;

class UserService extends ServiceAbstract
{
    protected $keycloakConsumer = 'User';

    public function __construct($request)
    {
        parent::__construct($request);
        $this->keycloakConsumer = "User";
        $this->url = Config::setUriParams(KeycloakEndpoints::KEYCLOAK_URI_USER_CRUD, ['MEC']);
    }
}