<?php
req("api", "ApiScript");
?>
<h2>Skript</h2>
<div id="script">
<?php
if(isset($_POST["scriptupload"])) {
    $GLOBALS["DEBUG_R"]["FILE-UPLOAD"]=  $_FILES;
    $tempFile = $_FILES["scriptfile"]["tmp_name"];
    $targetFile = CONFIG::UPLOAD_DIR . basename($_FILES["scriptfile"]["name"]);
    $targetFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    move_uploaded_file($tempFile, $targetFile);

    if(file_exists($targetFile)) {
        $r = ApiScript::add($targetFile);

        $content = "<p>Skriptet har laddats upp</p>";
        BoxFactory::info($content);

    } else {
        echo("<p>Kunde inte ladda upp skriptet av oklar anledning</p>");
    }
} elseif (isset($_GET["d"])){
    $fileId = $_GET["d"];
    $r = ApiScript::delete($fileId);

    $content = "<p>Skriptet <strong>".$fileId."</strong> har raderats upp</p>";
    BoxFactory::info($content);
}

FormFactory::scriptUploadForm("?".CONFIG::PARAM_NAV."=scripts");

incV("scripts_list");

?>
</div>