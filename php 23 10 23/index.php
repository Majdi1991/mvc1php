<pre><?php
// $globals = $GLOBALS;
// var_dump($globals); 
session_start();
$_SESSION["prenom"] = "majdi";
var_dump($_SESSION); 
?>
<form method="POST" enctype="multipart/form-data">
  <input type="text" name="variable">
  <input type="text" name="variable1">
  <input type="file" name="fichiers []" multiple>
  <input type="submit" value="Envoyer">
</form>