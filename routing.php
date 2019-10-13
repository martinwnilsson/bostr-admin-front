<?php
/*
 * $ROUTES används för att skapa navigeringsvägar
 * Används både för att skapa main nav och inkludera view i main html container
 *
 * key -> Namn på routen, används för navigeringsmenyn
 * route -> URL-query
 * view -> skript i mappen views som ska inkluderas i main när routen valts
 * icon -> OPTIONAL namn på icon att visas i menyn, ta exakt namn från https://fontawesome.com/icons?m=free en default-icon visas om utlämnad
 * active -> OPTIONAL om routen ska vara klickbar (aktiv) i menyn - defaultar till true
 * hidden -> OPTIONAL om visas i nav - defaultar till true
 *
 * OBS ordningen på route-items i $ROUTES bestämmer ordningen i navigeringsmenyn
 */
$ROUTES = [];

$ROUTES["Dashboard"] = [
    "route" => "home",
    "view" => "home",
    "icon" => "home",
];
$ROUTES["Skript"] = [
    "route" => "scripts",
    "view" => "scripts",
    "icon" => "file-code",
];
$ROUTES["Konfigrationer"] = [
    "route" => "conf",
    "view" => "main_conf",
    "icon" => "wrench",
    "active" => false,
];
$ROUTES["Logga ut"] = [
    "route" => "logout",
    "view" => "logout",
    "icon" => "sign-out-alt",
];
$ROUTES["Logga in"] = [
    "route" => "login",
    "view" => "login",
    "hidden" => true,
];

// function som laddar view i HTML-mani efter aktuell route
function route()
{
    global $ROUTES;

    $route = getRoute();
    $gotRoute = false;

    if (isset($_SESSION["user"])) {
        foreach($ROUTES as $label => $rt){
            if($route == $rt["route"]){
                incV($rt["view"]);
                $gotRoute = true;
                break;
            }
        }

        if (!$gotRoute) {
            incV("main_home");
        }
    } else {
        incV("login");
    }
}

// läser av route från URL query
function getRoute(){
    if(isset($_GET[CONFIG::PARAM_NAV])){
        return $_GET[CONFIG::PARAM_NAV];
    } else {
        return "home";
    }
}

$GLOBALS["DEBUG"]["getRoute"]=  getRoute();