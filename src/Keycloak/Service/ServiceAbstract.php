<?php

namespace WilbertJoosen\KeycloakPHP\Keycloak\Service;

use WilbertJoosen\KeycloakPHP\Exception\ServiceException;
use WilbertJoosen\KeycloakPHP\Keycloak\Consumer\Factory\ConsumerFactory;
use WilbertJoosen\KeycloakPHP\Keycloak\Service\Contracts\ServiceContract;

abstract class ServiceAbstract implements ServiceContract
{
    protected $service;
    protected $keycloakConsumer;

    public function __construct()
    {
        $this->keycloakConsumer = ConsumerFactory::build($this->service);
    }

    public function find($idx)
    {
        try{
            return $this->keycloakConsumer->find($idx);
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