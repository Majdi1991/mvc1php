<?php
// On va gérer l'authentification
session_start();
// Import de la config
require "./config.php";
// Import du routeur
require "./services/router.php";
// Import du controlleur
require "./controllers/controller_{$page}.php";
