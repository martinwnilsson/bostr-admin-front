<?php

final class LinkFactory
{
    static function mainNavLink($label, $route, $icon = null, $disabled = false){
        $href = CONFIG::BASE_URL . "?" . CONFIG::PARAM_NAV . "=" . $route;
        if($icon){
            $icon = '<i class="fas fa-'.$icon.'"></i>';
        } else {
            $icon = "";
        }
        if($disabled){
            $disabled = "disabled";
        } else {
            $disabled = "";
        }

        $classes = '"nav-link '. $disabled.'"';

        print "<a class=$classes href=\"$href\">$icon$label</a>";
    }
}