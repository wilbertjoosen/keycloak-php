<?php
namespace WilbertJoosen\KeycloakPHP\Keycloak\Service\Factory;

use WilbertJoosen\KeycloakPHP\Exception\ServiceException;

class ServiceFactory
{
    private function __construct()
    {

    }

    /**
     * @param $business
     *
     * @return mixed
     * @throws \Exception
     */
    public static function build($business){
        $className = __NAMESPACE__.$business.'Service';

        if(class_exists($className)){
            return new $className();
        }
        throw new ServiceException('Class not found');
    }
}