<?php
namespace WilbertJoosen\KeycloakPHP\Keycloak\Consumer\Factory;

use WilbertJoosen\KeycloakPHP\Exception\ConsumerException;

class ConsumerFactory
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
        $className = __NAMESPACE__.$business.'Consumer';

        if(class_exists($className)){
            return new $className();
        }
        throw new ConsumerException('Class not found');
    }
}