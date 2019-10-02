<?php
$loggedin = false;
if(isset($_SESSION["user"])){
    $loggedin = true;
}
?>
<aside>
    <?php incV("aside_header"); ?>

    <?php if(!isset($_SESSION["isLive"])){ ?>

    <?php incV("backendDead"); ?>

    <?php } else { ?>

        <?php incV("loggedin"); ?>
        <?php if($loggedin){ ?>
        <section class="side-body">
            <div class="main-nav">
                <h4>Sektioner</h4>
                <?php incV("aside_nav_main"); ?>
            </div>
        </section>
        <?php } ?>
    <?php } ?>
</aside>