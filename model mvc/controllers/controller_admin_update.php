<?php
// Si $_SESSION['user'] n'est pas défini on redirige sur le login
if (!isset($_SESSION['user'])) header("Location:?page=login");
$db = connectDB();
// on récupère l'id depuis l'url
// on la convertit en entier pour être plus prudent...
$id = intval( $_GET['id'] );
$sql = $db->prepare("SELECT * FROM picture WHERE id='".$id."'");
$sql->execute();
// LE FETCH TOUT COURT NE RETOURNE QU'UN SEUL ARRAY PLAT
$pic = $sql->fetch(PDO::FETCH_ASSOC);
// Si le formulaire est validé on update dans la table
// Sans oublier de préciser l'id
if (isset($_POST['submit'])){
    $sql = $db->prepare("UPDATE picture SET title=?, description=?, src=?, author=?, updated_at=? WHERE id=?");
    $sql->execute([
        $_POST['title'],
        $_POST['description'],
        $_POST['src'],
        $_POST['author'],
        date('Y-m-d H:i:s'), // on peut directement utiliser l'objet DateTime de PHP natif
        $id
    ]);
    // Et on redirige sur l'adminlist
    header("Location:?page=admin_list");
}

// --- la vue
include "./views/layout.phtml";