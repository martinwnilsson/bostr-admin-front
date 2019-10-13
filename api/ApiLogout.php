<?php

req("api", "ApiCaller");

class ApiLogout extends ApiCaller {


    function __construct(){
        // med metod = POST läses $_POST autoamtiskt av efter POST-parametrar
        parent::__construct("logout", CONFIG::API_ENTRY_ADMIN . CONFIG::API_ADMIN_LOGOUT, "POST");

    }

    function fetch(){

        return $result = parent::fetch();

    }

}