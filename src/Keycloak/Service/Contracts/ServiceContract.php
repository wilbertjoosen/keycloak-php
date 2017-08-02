<?php

namespace WilbertJoosen\KeycloakPHP\Keycloak\Service\Contracts;

interface ServiceContract
{
    public function find($idx);

    public function add(array $data);

    public function update(array $data);

    public function delete($idx);

    public function all(array $search = NULL);
}