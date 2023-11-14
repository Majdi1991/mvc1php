<?php
require_once("./models/Picture.php");
$pic = new Picture();
$pictures = $pic->getAll();
// --- on charge la vue
include "./views/layout.phtml";