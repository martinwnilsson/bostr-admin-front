<?php

req("api", "ApiCaller");

class ApiLogin extends ApiCaller {


    function __construct(){
        // med metod = POST läses $_POST autoamtiskt av efter POST-parametrar
        parent::__construct("login", CONFIG::API_ENTRY_USER . CONFIG::API_ADMIN_LOGIN, "POST");

    }

    function fetch(){

        return $result = parent::fetch();

    }

}