<?php
require_once("./models/Picture.php");
$pic = new Picture();
$pictures = $pic->getAll(3);
// --- la vue
include "./views/layout.phtml";