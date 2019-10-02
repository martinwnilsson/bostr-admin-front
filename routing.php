<?php

$GLOBALS["DEBUG"]["getRoute"]=  getRoute();
$GLOBALS["DEBUG_R"]["SESSION"]=  $_SESSION;
$GLOBALS["DEBUG_R"]["SERVER"]=  $_SERVER;
$GLOBALS["DEBUG_R"]["POST"]=  $_POST;
$GLOBALS["DEBUG_R"]["GET"]=  $_GET;

if(isset($_SESSION["user"])){
    $route = getRoute();

    if($route == "conf"){
        incV("conf");
    } else {
        echo "<p>Välj en tjänst för att gå vidare</p>";
    }
} else {
    incV("login");
}