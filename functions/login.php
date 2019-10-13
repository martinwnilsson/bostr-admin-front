<?php
req("api", "ApiLogin");
req("api", "ApiLogout");

function routeLogin(){
    global $ROUTES;
    $loginRoute = "location: ".CONFIG::BASE_URL."?".CONFIG::PARAM_NAV."=login";
    header($loginRoute);
    die();
}

function routeHome(){
    global $ROUTES;
    $homeRoute = "location: ".CONFIG::BASE_URL;
    header($homeRoute);
    die();
}

function clearUser(){
    session_destroy ();
    unset($_SESSION["authToken"]);
    unset($_SESSION["user"]);
}

if(isset($_POST["login"])&&isset($_POST["username"])&&isset($_POST["username"])){
    $l = new ApiLogin($_POST["username"], $_POST["password"]);
    $r = $l->fetch();
    if(isset($r->token)){
        $_SESSION["authToken"] = $r->token;
        $_SESSION["user"] = $_POST["username"];
        routeHome();
     } else {
        $_SESSION["authToken"] = null;
        $_SESSION["user"] = null;
    }
}

if(isset($_SESSION["authToken"]) && (getRoute() == "logout")){
    /* tar för lång tid - loggar ut i klient bara */
    //$l = new ApiLogout();
    //$r = $l->fetch();
    /*if(isset($r->result)){
        //clearUser();
    }*/
    // rensar oavsett hur det gick med utloggningen.
    clearUser();
    routeLogin();
}

if(!isset($_SESSION["user"]) && (getRoute() != "login")){
    routeLogin();
}

