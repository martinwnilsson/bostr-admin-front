<?php

req("api", "ApiCaller");

final class ApiScript {


    static function get($query = null){
        $call = new ApiCaller("script get all", CONFIG::API_ENTRY_ADMIN . CONFIG::API_ADMIN_SCRIPT_REST, "GET");
        return $call->fetch();
    }

    static function add($scriptfile, $scriptName = null, $query = null){
        if(empty($scriptName)){
            $scriptName = basename($scriptfile);
        }
        $endpoint = CONFIG::API_ENTRY_ADMIN . CONFIG::API_ADMIN_SCRIPT_REST . '/' . $scriptName;
        $call = new ApiCaller("script add", $endpoint, "PUT", $scriptfile);
        return $call->fetch();
    }

    static function delete($scriptName, $query = null){
        $endpoint = CONFIG::API_ENTRY_ADMIN . CONFIG::API_ADMIN_SCRIPT_REST . '/' . $scriptName;
        $call = new ApiCaller("script delete", $endpoint, "DELETE");
        return $call->fetch();
    }

}