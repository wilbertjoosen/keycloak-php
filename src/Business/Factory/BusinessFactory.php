<?php
namespace WilbertJoosen\KeycloakPHP\Business\Factory;

use WilbertJoosen\KeycloakPHP\Exception\BusinessException;

class BusinessFactory
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
        $className = __NAMESPACE__.$business.'Business';

        if(class_exists($className)){
            return new $className();
        }
        throw new BusinessException('Class not found');
    }
}