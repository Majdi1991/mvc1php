<?php

require_once("./models/Picture.php");
// on récupère l'id depuis l'url
// on la convertit en entier pour être plus prudent...
$id = intval( $_GET['id'] );
$picModel = new Picture();
$pic = $picModel->getOne($id);
// --- on charge la vue
include "./views/layout.phtml";