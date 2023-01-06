<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
	<?php
	session_start();
	?>
	<div class="container">
		<div class="navbar">
			<h1>Connexion</h1>
		</div>		
		<form name="form2" method="POST" class="form2">
			<input type="text" name="login2" placeholder="Login">
			<input type="password" name="password2" placeholder="Mot de passe">
			<button name="envoyer2" class="connexion">Se connecter</button>
			<div class="lien">
				<a href="inscription.php">Pas encore inscrit ?</a>
			</div>

		<?php
		if(isset($_POST["envoyer2"]))
		{
			$connexion2 = mysqli_connect("localhost","root","","netflix") OR die ("Erreur de connexion !");
			$req3 = "SELECT * FROM utilisateurs WHERE loginUtilisateur = '".$_POST["login2"]."' AND mdpUtilisateur = '".md5($_POST["password2"])."'";
			$res3 = mysqli_query($connexion2,$req3);
			$ligne = mysqli_fetch_assoc($res3);
			$dans_bdd = mysqli_num_rows($res3);

			if($dans_bdd == 0)
			{
				echo "<p>Cet utilisateur n'existe pas</p>";
			}
			else
			{
				$_SESSION["prenom"] = $ligne["prenomUtilisateur"];
				$_SESSION["log"] = $ligne["loginUtilisateur"];
				$_SESSION["mdp"] = $ligne["mdpUtilisateur"];
				$_SESSION["id"] = $ligne["numUtilisateur"];
				header('Location: accueil.php');
			}
			mysqli_close($connexion2);
		}
		?>
		</form>
	</div>
</body>
</html>