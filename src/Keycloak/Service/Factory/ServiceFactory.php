<?php
namespace WilbertJoosen\KeycloakPHP\Keycloak\Service\Factory;

use Illuminate\Http\Request;
use WilbertJoosen\KeycloakPHP\Exception\ServiceException;

class ServiceFactory
{
    public static $request;
    public function __construct(Request $request)
    {
        self::$request = $request;
    }

    /**
     * @param $business
     *
     * @return mixed
     * @throws \Exception
     */
    public static function build($business){
        $className = str_replace('Factory','',__NAMESPACE__.$business.'Service');

        if(class_exists($className)){
            return new $className(self::$request);
        }
        throw new ServiceException('Class not found');
    }
}