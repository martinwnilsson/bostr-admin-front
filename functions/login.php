<?php
req("api", "ApiLogin");

if(isset($_POST["login-form"])&&isset($_POST["username"])&&isset($_POST["username"])){
    $l = new ApiLogin($_POST["username"], $_POST["password"]);
    $r = $l->fetch();
    if(isset($r->token)){
        $_SESSION["authToken"] = $r->token;
        $_SESSION["user"] = $_POST["username"];
        $_SESSION["logginSuccess"] = true;
    } else {
        $_SESSION["authToken"] = null;
        $_SESSION["user"] = null;
        $_SESSION["logginSuccess"] = false;
    }
}