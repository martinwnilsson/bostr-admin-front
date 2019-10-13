<?php
$hello = new StdClass();

$hello->status = "Lagom";
$hello->data = "42";

echo json_encode($hello);
