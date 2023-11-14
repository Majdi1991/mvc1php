<?php date_default_timezone_set('Europe/Paris'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .user{
            display: block;
            justify-content: center;
            text-align: center;
            padding: 15px;
            background-color: rgb(240,240,240);
            width: 40%;
            margin: 0 35%;
        }
    </style>
</head>

<body>

    <h1>
		user
	</h1>
	<a href="my_sql.php">Revenir à l'accueil</a>
	<hr>
	Vous avez choisi l'id <?php echo $_GET['id'];?>
	<hr>
	<?php 
		// connect DB
			try
			{	
				$host='localhost';
				$db_name='DWWM_23_10_19';
				$login='root';
				$pass='';
				$connection = new PDO("mysql:host=$host;dbname=$db_name", $login, $pass);
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(Exception $e)	{die($erreur_sql='Erreur connect bd: '.$e->getMessage());}
	?>
	<?php 
		//  UPDATE name, firstName, mail 
			// if exist POST 
				if (isset($_POST['	'])) {
					print_r($_POST);echo '<hr>';
					//  > UPDATE user 
						
				}
	?> 
	<?php 	
		// requete UPDATE dateUpdate
			try { 
				$sql="UPDATE users SET dateUpdate=? WHERE id=?";
				$stmt = $connection->prepare($sql);
				
				$stmt->execute(array( 
					date('Y-m-d H:i:s'), 
					$_GET['id'] 
				));

			} catch (Exception $e) {$sqlError=$e->getMessage();}
			//  if error
			if (isset($sqlError)) {echo $sqlError;}

		// requete SELECT 
			try { 
				$sql="SELECT * FROM users WHERE id=?";
				$stmt = $connection->prepare($sql);
				$stmt->execute(array( $_GET['id'] ));
			} catch (Exception $e) {$sqlError=$e->getMessage();}
			//  if error
			if (isset($sqlError)) {echo $sqlError;}

			$user=$stmt->fetch(PDO::FETCH_ASSOC); 
			// print_r($user);
			// echo '<hr>';
	?>
	<!-- USER -->
		<h5> 
			<?php echo $user['firstName']. ' '.$user['name'];?>
		</h5>
		<p>
			Date de création :
			<?php 
				// echo $user['dateCreate'];
				// echo '<br>';
				$dateCreate = explode(' ', $user['dateCreate']);
				// print_r($dateCreate);
				$date=$dateCreate[0];
				$heure=$dateCreate[1];
				echo '<br>Le '.$date.' à '.$heure;
				echo '<hr>';
				$date=explode('-', $date);
				// print_r($date);

				$months=array('janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre');
				echo $date[1].'<br>';
				echo 'Le '.$date[2].' '. $months[$date[1]-1].' '.$date[0].'<br>';
				echo '<hr>';
				// Jour 
				$jour_semaine = array(1=>"Lundi", 2=>"Mardi", 3=>"Mercredi", 4=>"Jeudi", 5=>"Vendredi", 6=>"Samedi", 7=>"Dimanche");
					echo 'N° du jour ' . $jour_semaine[date_format(date_create($user['dateCreate']), 'w')];

					echo 'N° du jour ' . 
					$jour_semaine[
						date_format(
							date_create(
								$user['dateCreate']
							)
						, 'w')
					];
					echo '<hr>';
				echo 'MAJ : ' . $user['dateUpdate'];
				// print_r($months);
			?>

			<br> 
			<!-- nous sommes le : <?php echo date('Y-m-d');?> -->
		</p>
	<!-- USER FORM -->
		<form method="POST">
			<input autofocus type="text" name="name" placeholder="Name" value="<?php echo $user['name'];?>">
			<br>
			<input type="text" name="firstname" placeholder="firstName" value="<?php echo $user['firstName'];?>">
			<br>
			<input type="text" name="mail" placeholder="mail" value="<?php echo $user['mail'];?>">
			<br>
			<input type="submit" name="Modifier" value="Modifier">
		</form>
    
    <p>MaJ le : <?= $user['dateUpdate']; ?></p>
</div>
    <a href="index.php">Revenir à l'accueil</a>

</body>

</html>