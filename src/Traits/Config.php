<?php

namespace WilbertJoosen\KeycloakPHP\Traits;

use Illuminate\Support\Facades\Config as IlluminateConfig;

trait Config
{
    use Singleton;

    protected $config;
    protected $url;
    protected $token;
    protected $connection;

    public function __construct(array $data)
    {
        $this->config = [
            'host' => self::_resolveParam($data, 'host'),
            'url' => $this->url,
            'token' => $this->token,
            'connection' => is_null($this->connection) ? 'default' : $this->connection,

            //Used only if consumed endpoint is service account or specific user
            'grant_type' => self::_resolveParam($data, 'grant_type'),
            'username' => self::_resolveParam($data, 'username'),
            'password' => self::_resolveParam($data, 'password'),
            'client_id' => self::_resolveParam($data, 'client_id'),
            'client_secret' => self::_resolveParam($data, 'client_secret'),
        ];
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