<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="navbar">
			<h1>Inscription</h1>
		</div>
		<form name="form1" method="POST" class="form1">
				<input type="text" name="login1" placeholder="Login">
				<input type="password" name="password1" placeholder="Mot de passe">
				<input type="text" name="nom" placeholder="Nom">
				<input type="text" name="prenom" placeholder="Prenom">
				<button name="inscrire">S'inscrire</button>
			<?php

			if(isset($_POST["inscrire"]))
			{
				$connexion1 = mysqli_connect("localhost","root","","netflix") OR die ("Erreur de connexion !");

				$req1 = "SELECT numUtilisateur FROM utilisateurs WHERE loginUtilisateur = '".$_POST["login1"]."' AND mdpUtilisateur = '".md5($_POST["password1"])."'";
				$res1 = mysqli_query($connexion1,$req1);
				$deja_inscrit = mysqli_num_rows($res1);

				if($deja_inscrit == 0)
				{
					$req2 = "INSERT INTO utilisateurs (nomUtilisateur,prenomUtilisateur,loginUtilisateur,mdpUtilisateur) VALUES ('".$_POST["nom"]."','".$_POST["prenom"]."','".$_POST["login1"]."','".md5($_POST["password1"])."')";
					$res2 = mysqli_query($connexion1,$req2);
					echo "Votre inscription à bien été prise en compte !";
					header('Location: connexion.php');
				}
				else
				{
					echo "Cet utilisateur existe déjà !";
				}
				mysqli_close($connexion1);
			}
			?>
		</form>
	</div>
</body>
</html>