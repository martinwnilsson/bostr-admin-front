<?php

final class BoxFactory
{
    static function info($content){
        print CardFactory::getCard($content, "info bg-info");
    }
}