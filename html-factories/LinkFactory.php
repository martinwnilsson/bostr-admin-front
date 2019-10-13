<?php

final class LinkFactory
{
    static function mainNavLink($label, $route, $icon = null, $active = true){
        $href = CONFIG::BASE_URL . "?" . CONFIG::PARAM_NAV . "=" . $route;
        if($icon){
            $icon = '<i class="fas fa-'.$icon.'"></i>';
        } else {
            $icon = "";
        }
        if(!$active){
            $disabled = "disabled";
        } else {
            $disabled = "";
        }

        $current = '';
        if(getRoute() == $route){
            $current .= ' active';
        }

        $classes = '"nav-link '. $disabled.$current .'"';

        if(getRoute() == $route){
            $classes .= " active";
        }

        return "<a class=$classes href=\"$href\">$icon$label</a>";
    }
}