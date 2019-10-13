<nav class="nav flex-column">
    <?php
        global $ROUTES;

        foreach($ROUTES as $label => $rt){
            $hidden = false;
            if(isset($rt["hidden"]) && $rt["hidden"]) {
                $hidden = true;
            }

            if(!$hidden){
                $icon = null;
                $active = true;
                if (isset($rt["icon"])) {
                    $icon = $rt["icon"];
                }
                if (isset($rt["active"])) {
                    $active = $rt["active"];
                }
                print LinkFactory::mainNavLink($label, $rt["route"], $icon, $active);
            }

        }
    ?>
</nav>