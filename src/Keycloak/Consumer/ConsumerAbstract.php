<?php
namespace WilbertJoosen\KeycloakPHP\Keycloak\Consumer;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use WilbertJoosen\KeycloakPHP\Keycloak\Consumer\Contracts\ConsumerContract;
use WilbertJoosen\KeycloakPHP\Keycloak\Config;

abstract class ConsumerAbstract implements ConsumerContract
{
    private $_url;
    private $_params = [];
    private $_headers;
    private $_client;
    private $_config;

    public function __construct()
    {
        $this->_config = Config::getInstance();
        $this->_client =  new Client(['verify' => false]);
        $this->_headers = ['headers' => ['Authorization' => 'Bearer '.$this->_config->getParams()['token']]];
    }

    public function url($url)
    {
        $this->_url = $url;
        return $this;
    }

    public function params(array $params = NULL)
    {
        $this->_params = is_array($params) ? array_merge($this->_headers, $params) : $this->_headers;
        return $this;
    }

    private static function prepareResponse($response)
    {
        return json_decode($response->getBody()->getContents());
    }

    public final function find($idx){
        return self::prepareResponse($this->_client->request('GET', $this->_config->getParams()['host'].$this->_url, $this->_params));
    }

    public final function add(array $data){

    }

    public final function update(array $data){

    }

    public final function delete($idx){

    }

    public final function all(array $search = NULL){

    }
}