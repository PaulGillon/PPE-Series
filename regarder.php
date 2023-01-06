<!DOCTYPE html>
<html>
<head>
	<title>Regarder</title>
	<meta charset="utf-8">
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
		header("Location: connexion.php");
		exit();
	}
	?>
	<div class="container">
		<div class="navbar2">
			<img src="img/logo.png">
			<div class="title">
				<h1>Regarder</h1>
				<p class="sous_titre"><?php echo "<span>".$_SESSION["prenom"]."</span>";?></p>
			</div>
			<div class="other">
				<a href="deconnexion.php">
					<button name="deconnecter">Deconnexion</button>
				</a>
				<a href="profil.php">
					<button name="profil" class="profil">Profil</button>
				</a>
			</div>
		</div>
		<form name="form4" method="POST" class="form2">
			<input type="text" name="nom_serie" placeholder="Serie">
			<input type="text" name="saisons_en_cours" placeholder="Saisons en cours">
			<input type="text" name="dernier_episode_vu" placeholder="Dernier épisode vu">
			<button type="submit" name="envoyer8">Mettre à jour</button>
		</form>
		<?php
		if(isset($_POST["envoyer8"]))
		{
			$connexion12 = mysqli_connect("localhost","root","","netflix");
			$req12 = "UPDATE regarder SET saisonEnCours = '".$_POST["saisons_en_cours"]."', dernierEpisodeVu = '".$_POST["dernier_episode_vu"]."' WHERE numSerie = (SELECT numSerie FROM series WHERE titreSerie = '".$_POST["nom_serie"]."') AND numUtilisateur = '".$_SESSION["id"]."'";
			$res12 = mysqli_query($connexion12,$req12);
			header('Location: accueil.php');
			mysqli_close($connexion12);
		}
		?>
	</div>
</body>
</html>