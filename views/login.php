<h1>Inloggning</h1>
<p>Du måste vara inloggad för att använda det här verktyget</p>
<?php
if(!isset($_SESSION["user"])){
    FormFactory::loginForm();
}