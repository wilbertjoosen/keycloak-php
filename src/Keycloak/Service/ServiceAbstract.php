<?php

namespace WilbertJoosen\KeycloakPHP\Keycloak\Service;

use WilbertJoosen\KeycloakPHP\Exception\ServiceException;
use WilbertJoosen\KeycloakPHP\Keycloak\Consumer\Factory\ConsumerFactory;
use WilbertJoosen\KeycloakPHP\Keycloak\Service\Contracts\ServiceContract;
use WilbertJoosen\KeycloakPHP\Keycloak\Config;

abstract class ServiceAbstract implements ServiceContract
{
    protected $keycloakConsumer;
    protected $params;
    protected $url;
    private $config;

    public function __construct($request)
    {
       $this->config = Config::getInstance();
       $this->config->request = $request;
       $this->config->setParams();
    }

    public function setConnection($connection = NULL)
    {
        $this->config->setParams(['connection' => $connection]);
        return $this;
    }

    public function find($idx)
    {
        try{
            return ConsumerFactory::build($this->keycloakConsumer)->url($this->url)->params($this->params)->find($idx);
        }catch (\Exception $exception){
            throw new ServiceException($exception->getMessage(), $exception->getCode());
        }
    }

    public function delete($idx)
    {
        try{
            return $this->keycloakConsumer->delete($idx);
        }catch (\Exception $exception){
            throw new ServiceException($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(array $data)
    {
        try{
            return $this->keycloakConsumer->delete($data);
        }catch (\Exception $exception){
            throw new ServiceException($exception->getMessage(), $exception->getCode());
        }
    }

    public function add(array $data)
    {
        try{
            return $this->keycloakConsumer->add($data);
        }catch (\Exception $exception){
            throw new ServiceException($exception->getMessage(), $exception->getCode());
        }
    }

    public function all(array $search = NULL)
    {
        try{
            return $this->keycloakConsumer->all($search);
        }catch (\Exception $exception){
            throw new ServiceException($exception->getMessage(), $exception->getCode());
        }
    }
}