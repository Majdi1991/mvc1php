<?php
// Si la variable page est définie dans l'url
// On la récupère et on la met en minuscule
// On utilise page pour trouver le controlleur 
// Sinon la page c'est home et le controlleur c'est 
// controller_home.php (logique)
// array_key_first() 
// retourne en fait la première clé du tableau CONFIG_ROUTES
$getPage = isset($_GET['page']) ? strtolower($_GET['page']) : "";
$page = file_exists("./controllers/controller_" . $getPage . ".php") ? $getPage : array_key_first(CONFIG_ROUTES);