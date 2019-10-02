<?php
if(!isset($_SESSION["authToken"])){
    BoxFactory::info("<p>Du måste logga in</p>");
    FormFactory::loginForm();
}