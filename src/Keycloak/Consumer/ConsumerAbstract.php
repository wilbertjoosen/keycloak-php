<?php
namespace WilbertJoosen\KeycloakPHP\Keycloak\Consumer;

use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as IlluminateRequest;

abstract class ConsumerAbstract implements ConsumerContratct
{
    private $request;

    public function __construct()
    {
        $this->request = new IlluminateRequest();
    }

    public final function find(){
        return new Request('GET', 'http://httpbin.org/get');
    }

    public final function add(){

    }

    public final function update(){

    }

    public final function delete(){

    }

    public final function all(){

    }
}