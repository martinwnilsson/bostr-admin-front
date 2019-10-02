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

    static function getSubmitButton($label = "Spara"){
        return "
        <button class=\"btn btn-primary\" type=\"submit\">$label
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
            self::getHiddenfield("login-form").
            self::getTextfield("username", "Användarnamn", "text", $user).
            self::getTextfield("password", "Lösenord", "password", $passw).
            self::getSubmitButton("Logga in").
            self::getCancelButton().
        '</form>';

        $card = CardFactory::getCardWithHeader("Login", $form, "login");


        print $card;
    }
}