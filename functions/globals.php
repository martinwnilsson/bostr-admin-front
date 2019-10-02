<?php

$GLOBALS["DEBUG"] = [];
$GLOBALS["DEBUG_R"] = [];
$GLOBALS["DEBUG_RESPONSES"] = [];
$GLOBALS["LOCAL_PATH"] = $_SERVER["DOCUMENT_ROOT"]."/";

function getRoute(){
    if(isset($_GET[CONFIG::PARAM_NAV])){
        return $_GET[CONFIG::PARAM_NAV];
    } else {
        return null;
    }
}

function req($folder, $phpfile){
    if($folder != ""){
        $folder .= "/";
    }
    require_once($GLOBALS["LOCAL_PATH"].$folder.$phpfile.".php");
}

function inc($folder, $phpfile){
    if($folder != ""){
        $folder .= "/";
    }
    include($GLOBALS["LOCAL_PATH"].$folder.$phpfile.".php");
}

function incV($phpfile){
    include($GLOBALS["LOCAL_PATH"]."views/".$phpfile.".php");
}