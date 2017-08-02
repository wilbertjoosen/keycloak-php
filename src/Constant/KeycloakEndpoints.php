<?php
namespace WilbertJoosen\KeycloakPHP\Constant;

class KeycloakEndpoints
{
    //Global endpoints
    const KEYCLOAK_URI_AUTHORIZE = "/auth/realms/%s/protocol/openid-connect/auth";
    const KEYCLOAK_URI_LOGOUT    = "/auth/realms/irispass/%s/openid-connect/logout";
    const KEYCLOAK_URI_TOKEN     = "/auth/realms/%s/protocol/openid-connect/token";

    //User account Endpoints
    const KEYCLOAK_URI_USER_INFO = "/auth/realms/%s/protocol/openid-connect/userinfo";

    //User CRUD endpoints
    const KEYCLOAK_URI_USER_CRUD = "/auth/admin/realms/%s/users/";
}