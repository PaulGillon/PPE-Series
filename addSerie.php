<!DOCTYPE html>
<html>
<head>
	<title>Ajouter des séries</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
	<?php
	session_start();

	if(!isset($_SESSION["log"]))
	{
		header('Location: connexion.php');
		exit;
	}
	?>
	<div class="container">
		<div class="navbar2">
			<img src="img/logo.png">
			<div class="title">
				<h1>Ajout</h1>
				<p class="sous_titre"><?php echo "<span>".$_SESSION["prenom"]."</span>";?></p>
			</div>
			<div class="other">
				<a href="deconnexion.php">
					<button name="deconnecter">Deconnexion</button>
				</a>
				<a href="profil.php">
					<button name="profil" class="profil">Profil</button>
				</a>
				<a href="accueil.php">
					<button name="retour2" class="retour3">Retour</button>
				</a>
			</div>
		</div>
		<form name="form4" method="POST" class="form2">
			<input type="text" name="titre" placeholder="Titre">
			<input type="text" name="episodes" placeholder="Nombre d'épisodes">
			<input type="text" name="saisons" placeholder="Nombre de saisons">
			<button name="ajouter">Ajouter</button>
		</form>
		<?php
		if(isset($_POST["ajouter"]))
		{
			$connexion4 = mysqli_connect("localhost","root","","netflix");
			$req6 = "INSERT INTO series (titreSerie,nbEpisodesSerie,nbSaisonsSerie) VALUES ('".$_POST["titre"]."','".$_POST["episodes"]."','".$_POST["saisons"]."')";
			$res6 = mysqli_query($connexion4,$req6);
			echo "<p>Votre ajout de série à bien été pris en compte !</p>";
			mysqli_close($connexion4);
		}
		?>
	</div>


</body>
</html>