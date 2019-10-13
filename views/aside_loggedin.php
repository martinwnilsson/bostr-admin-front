<?php
$classes = "bg-danger";
$loggedin = false;
if(isset($_SESSION["user"])){
    $loggedin = true;
    $classes = "bg-secondary";
}

$classes = "loggedin " . $classes;

?>

<section class="<?php print $classes ?>">
    <?php if($loggedin){ ?>
    <p>Du är inloggad som <strong><?php print $_SESSION["user"] ?></strong></p>
    <?php } else { ?>
    <p>Du är inte inloggad</p>
    <?php } ?>
</section>