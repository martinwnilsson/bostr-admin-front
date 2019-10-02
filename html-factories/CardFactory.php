<?php

final class CardFactory
{
    static function getStart($classes = "", $id = null){
        $classes = "card " . $classes;
        if($id){
            $id = ' id="'.$id.'"';
        } else {
            $id = "";
        }
        return '<div '.$id.' class="' .$classes. '">';
    }

    static function getEnd(){
        return '</div>';
    }

    static function getHeader($title = "Untitled"){
        return '<h4 class="card-header">'.$title.'</h4>';
    }

    static function getBodyStart(){
        return '<div class="card-body">';
    }

    static function getBodyEnd(){
        return '</div>';
    }

    static function getBody($body = "<p>[No content]</p>"){
        return self::getBodyStart().$body.self::getBodyEnd();
    }

    static function getBodyTitle($title = "Untitled"){
        return '<h5 class="card-title">'.$title.'</h5>';
    }

    static function getCardWithHeader($title, $body, $classes = null, $id = null){
        $content = self::getStart($classes, $id);
        $content .= self::getHeader($title);
        $content .= self::getBody($body);
        $content .= self::getEnd();

        return $content;
    }

    static function getCard($body, $classes = null, $id = null){
        $content = self::getStart($classes, $id);
        $content .= self::getBody($body);
        $content .= self::getEnd();

        return $content;
    }
}