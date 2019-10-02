<?php
// https://www.phpflow.com/php/creating-log-file-in-your-project-in-easy-way/

require_once("../classes/Config.php");

function __log($msg, $type = null, $source = null){
    $logFile = CONFIG::LOG_DIR . CONFIG::LOG_FILENAME_BASE . date('Ymd-Hi') . CONFIG::LOG_FILENAME_EXT;

    $meta = "[".date('H:i:s')."]";

    if(!empty($type)){
        $meta .= "[$type]";
    }

    if(!empty($source)){
        $meta .= "[$source]";
    }

    $msg = $meta.$msg."\n";

    if(CONFIG::LOG_TO_SCREEN) {

        print($msg);

    }

    $fHandler=fopen($logFile,'a+');
    //write the info into the file
    fwrite($fHandler,$msg);
    //close handler
    fclose($fHandler);
}

function b_log($msg, $source = null){
    __log($msg, "INFO");
}

function b_log_var($var, $source = null){
    $msg = var_export($var, true);
    __log($msg, "DEBUG-VAR");
}

function b_log_e($msg, $source = null){
    __log($msg, "*** ERROR ***");
}