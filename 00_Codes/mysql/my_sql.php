<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> My_sql</title>
</head>
<body>
    <h1>
        my_sql
    </h1>
    <h2>
        usernew
    </h2>
    <?php
$mail = 'ddfree.fr';
if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $msgMail = '<span class="text-success">L\'adresse e-mail est valide</span>';
} else {
    $msgMail = '<span class="text-warning">Désolé, l\'adresse e-mail n\'est pas valide</span>';
}

if (isset($msgMail)) {
    echo $msgMail;

    // Votre code pour insérer les données dans la base de données ici
    try {
        $sql = "INSERT INTO users (name, firstName, mail) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->execute(array(
            strip_tags($_POST['name']),
            strip_tags($_POST['firstName']),
            strip_tags($_POST['mail'])
        ));
    } catch (Exception $e) {
        $sqlError = $e->getMessage();
        if (isset($sqlError)) {
            echo $sqlError;
        }
    }
}
?>

</body>
</html>