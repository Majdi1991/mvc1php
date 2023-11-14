<?php
require_once("./models/Picture.php");

$pictures = Picture::getAll();
header('content-type:application/json');
echo json_encode($pictures);