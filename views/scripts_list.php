<?php
req("api", "ApiScript");

function getScriptItem($fileObject){
    $html = '<li class="list-group-item d-flex">';
    $html .= '<p class="name">'.$fileObject->name.'</p>';
    $html .= '<p class="type">'.$fileObject->type.'</p>';
    $html .= '<p class="id flex-grow-1">'.$fileObject->ID.'</p>';
    $html .= getScriptItemDropdown($fileObject->ID, $fileObject->name);

    return $html;
}

function getScriptItemDropdown($fileId, $filename){
    //$query = "?".CONFIG::PARAM_NAV."=".getRoute()."&d=".$filename;
    $query = "?".CONFIG::PARAM_NAV."=".getRoute()."&d=".$fileId;
    $html = '<div class="dropdown">';
    $html .= '<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id=dp-"'.$fileId.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
    $html .= 'Åtgärder</a>';

    $html .= '<div class="dropdown-menu" aria-labelledby="dp-'.$fileId.'">';
    $html .= '<a class="dropdown-item" href="#">Aktivera</a>';
    $html .= '<a class="dropdown-item" href="'.$query.'" style="color: red">Radera</a>';
    $html .= '</div>';

    $html .= '</div>';

    return $html;
}
?>

<h4>Skript i arkivet</h4>
<ul class="list-group script-list">

<?php

req("api", "ApiScript");

$files = ApiScript::get();

$GLOBALS["DEBUG_R"]["script response"] = $files;

foreach($files as $fileItem){
    echo getScriptItem($fileItem);
}

?>
</ul>
