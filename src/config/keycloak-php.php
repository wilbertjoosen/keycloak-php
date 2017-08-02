<?php

return [
    'connections' =>
        [
            'default' => [
                'host'       => env('KEYCLOAK_PHP_DEFAULT_HOST'),
                'realm'      => env('KEYCLOAK_PHP_DEFAULT_REALM'),
                'grant_type' => env('KEYCLOAK_PHP_DEFAULT_GRANT_TYPE', 'client_credentials'), //client_credentials, password
                'username'   => env('KEYCLOAK_PHP_DEFAULT_USERNAME'),
                'password'   => env('KEYCLOAK_PHP_DEFAULT_PASSWORD'),
            ]
    ],
];