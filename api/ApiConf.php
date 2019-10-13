<?php

req("api", "ApiCaller");

final class ApiConf {


    static function get($query = null){
        $call = new ApiCaller("conf get", CONFIG::API_ENTRY_ADMIN . CONFIG::API_ADMIN_CONF_GET, "GET");
        $r = $call->fetch();
    }

}