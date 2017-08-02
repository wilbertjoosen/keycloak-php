<?php

namespace WilbertJoosen\KeycloakPHP\Keycloak;

use Illuminate\Support\Facades\Config as IlluminateConfig;
use WilbertJoosen\KeycloakPHP\Traits\Singleton;

class Config
{
    use Singleton;

    protected $config;
    public $request;

    public function setParams(array $data = NULL)
    {
        $this->config = [
            'host' => self::_resolveParam($data, 'host'),
            'token' => $this->request->bearerToken(),
            'connection' => !isset($data['connection']) ? 'default' : $data['connection'],

            //Used only if consumed endpoint is service account or specific user
            'grant_type' => self::_resolveParam($data, 'grant_type'),
            'username' => self::_resolveParam($data, 'username'),
            'password' => self::_resolveParam($data, 'password'),
            'client_id' => self::_resolveParam($data, 'client_id'),
            'client_secret' => self::_resolveParam($data, 'client_secret'),
        ];
    }

    public function getParams()
    {
        return $this->config;
    }

    private static function _resolveParam($data, $param)
    {
        return isset($data['connection']) ? IlluminateConfig::get('keycloak-php.connections.' . $data['connection'] . '.' . $param) : IlluminateConfig::get('keycloak-php.connections.default.' . $param);
    }

    public static function setUriParams($uri, array $params)
    {
        return vsprintf($uri, $params);
    }
}