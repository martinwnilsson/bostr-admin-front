<?php
req("api", "ApiHello");

    $call = new ApiHello();
    $r =  $call->fetch();

    if(isset($r->result) && $r->result == "OK"){
        $_SESSION["isLive"] = true;
    }
?>
