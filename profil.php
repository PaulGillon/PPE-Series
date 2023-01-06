<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
	<?php
	session_start();
	if(!isset($_SESSION["log"]))
	{
		header("Location: connexion.php");
		exit();
	}

	?>

	<div class="container">
		<div class="navbar">
			<h1>Mon Profil</h1>
			<a href="accueil.php">
				<button name="retour2" class="retour2">Retour</button>
			</a>
		</div>
		<div class="settings">
			<form name="form5" method="POST">
				<div class="log">
					<h1>Login</h1>
					<input type="text" name="log" placeholder="Nouveau login">
					<input type="text" name="log2" placeholder="Confirmez votre nouveau login">
					<button name="changer">Modifier</button>
				</div>
			</form>
			<?php
			if(isset($_POST["changer"]))
			{
				if($_POST["log"] == $_POST["log2"])
				{
					$connexion5 = mysqli_connect("localhost","root","","netflix");
					$req7 = "UPDATE utilisateurs SET loginUtilisateur = '".$_POST["log"]."' WHERE numUtilisateur = '".$_SESSION["id"]."'";
				}
			}
			?>

			<form name="form6" method="POST">
				<div class="motdepasse">
					<h1>Mot de passe</h1>
					<input type="password" name="pwd" placeholder="Nouveau mot de passe">
					<input type="password" name="pwd2" placeholder="Confirmez votre nouveau mot de passe">
					<button name="changer2">Modifier</button>
				</div>
			</form>
			<?php
			if(isset($_POST["changer2"]))
			{
				if($_POST["pwd"] == $_POST["pwd2"])
				{
					$connexion5 = mysqli_connect("localhost","root","","netflix");
					$req7 = "UPDATE utilisateurs SET loginUtilisateur = '".md5($_POST["pwd"])."' WHERE numUtilisateur = '".$_SESSION["id"]."'";
				}
			}
			?>
		</div>
	</div>
</body>
</html>