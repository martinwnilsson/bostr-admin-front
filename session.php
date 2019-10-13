<?php
if(!isset($_SESSION["isLive"])){
    $_SESSION["isLive"] = false;
}

// user specifikc
if(!isset($_SESSION["authToken"])){
    $_SESSION["authToken"] = null;
}
if(!isset($_SESSION["user"])) {
    $_SESSION["user"] = null; // användarnamn
}


// misc
if(!isset($_SESSION["iterator"])){
    $_SESSION["iterator"] = 0;
}