<?php

return [
    'connections' =>
        [
            'default' => [
                'host'       => env('KEYCLOAK_PHP_HOST'),
                'realm'      => 'MEC',
                'grant_type' => env('KEYCLOAK_PHP_GRANT_TYPE', 'client_credentials'), //client_credentials, password
                'username'   => env('KEYCLOAK_PHP_USERNAME'),
                'password'   => env('KEYCLOAK_PHP_PASSWORD'),
            ]
    ],
];