<?php

$GLOBALS["DEBUG"] = [];
$GLOBALS["DEBUG_R"] = [];
$GLOBALS["DEBUG_RESPONSES"] = [];
$GLOBALS["LOCAL_PATH"] = $_SERVER["DOCUMENT_ROOT"]."/";

$GLOBALS["DEBUG_R"]["SESSION"]=  $_SESSION;
$GLOBALS["DEBUG_R"]["SERVER"]=  $_SERVER;
$GLOBALS["DEBUG_R"]["POST"]=  $_POST;
$GLOBALS["DEBUG_R"]["GET"]=  $_GET;

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