<?php
    echo CardFactory::getStart("debug bg-warning");
    echo CardFactory::getHeader("Debug");
    echo CardFactory::getBodyStart();

    echo CardFactory::getBodyTitle("Simple vars");
    foreach($GLOBALS["DEBUG"] as $var=>$print){
        if(empty($print)){
            $print = "NULL";
        }
        echo "<p><strong>$var</strong> = $print</p>";
    }

    echo CardFactory::getBodyTitle("Arrays & objects");
    foreach($GLOBALS["DEBUG_R"] as $var=>$printR){
        print("<h6><strong>$var</strong></h6><p>");
        print_r($printR);
        print("</p>");
    }

    echo CardFactory::getBodyTitle("API responses");
    foreach($GLOBALS["DEBUG_RESPONSES"] as $var=>$printR){
        print("<h6><strong>$var</strong></h6><p>");
        print_r($printR);
        print("</p>");
    }

    echo CardFactory::getBodyEnd();
    echo CardFactory::getEnd();
?>
