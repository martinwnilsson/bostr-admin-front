<?php

req("api", "ApiCaller");

class ApiHello extends ApiCaller {


    function __construct(){
        parent::__construct("checkBackendLive", CONFIG::API_ENTRY_USER . CONFIG::API_USER_PIMG);
    }

    function fetch(){

        return $result = parent::fetch();

    }

}