<?php
namespace WilbertJoosen\KeycloakPHP\Keycloak\Consumer\Factory;

use WilbertJoosen\KeycloakPHP\Exception\ConsumerException;

class ConsumerFactory
{
    /**
     * @param $consumer
     *
     * @return mixed
     * @throws \Exception
     */
    public static function build($consumer){
        $className =str_replace('Factory','',__NAMESPACE__.$consumer.'Consumer');

        if(class_exists($className)){
            return new $className();
        }
        throw new ConsumerException('Class not found');
    }
}