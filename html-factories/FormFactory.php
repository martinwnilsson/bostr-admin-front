<?php

final class FormFactory
{
    static function getTextfield($id, $label, $type = "text", $placeholder="", $class = ""){
        return '
        <div class="form-group $class">
          <label for="'.$id.'">'.$label.'</label>
          <input placeholder="'.$placeholder.'" id="'.$id.'" name="'.$id.'" type="'.$type.'" class="form-control">
        </div>
        ';
    }

    static function getHiddenfield($id, $value = 1){
        return '<input id="'.$id.'" name="'.$id.'" type="hidden" value="'.$value.'"">';
    }

    static function getFileField($id){
        return '<input class="" id="'.$id.'" name="'.$id.'" type="file">';
    }

    static function getSubmitButton($label = "Spara", $name = "submit"){
        return "
        <button class=\"btn btn-primary\" type=\"submit\" name=\"$name\">$label
            <i class=\"fas fa-check\"></i>
        </button>
        ";
    }
    static function getCancelButton($label = "Avbryt"){
        return "
        <a class=\"btn btn-danger\" href=\"#\">$label
            <i class=\"fas fa-window-close\"></i>
        </a>
        ";
    }

    static function loginForm($user = "", $passw = ""){
        // old route "'.CONFIG::BASE_URL.'?'.CONFIG::PARAM_NAV.'='.ROUTES::login.'"
        $form = '
        <form method="post" action="#">'.
            self::getTextfield("username", "Användarnamn", "text", $user).
            self::getTextfield("password", "Lösenord", "password", $passw).
            self::getSubmitButton("Logga in", "login").
            self::getCancelButton().
        '</form>';

        $card = CardFactory::getCardWithHeader("Login", $form, "login");


        print $card;
    }

    static function fileUploadForm($action = "#"){
        $form = '
        <form method="post" action="'.$action.'" enctype="multipart/form-data">'.
            self::getFilefield("scriptfile").
            self::getSubmitButton("Ladda upp", "fileupload").
            //self::getCancelButton().
            '</form>';

        $card = CardFactory::getCardWithHeader("Ladda skript", $form, "load-script");


        print $card;
    }

    static function scriptUploadForm(){
        $action="?".CONFIG::PARAM_NAV."=scripts";
        $form = '
        <form class="form-inline" method="post" action="'.$action.'" enctype="multipart/form-data">'.
            //self::getTextfield("scriptname", "Etikett", "text", "Ett beskrivande namn på skriptet").
            self::getFilefield("scriptfile").
            self::getSubmitButton("Ladda upp", "scriptupload").
            //self::getCancelButton().
            '</form>';

        $card = CardFactory::getCardWithHeader("Ladda skript", $form, "load-script");


        print $card;
    }
}