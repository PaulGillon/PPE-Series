<!DOCTYPE html>
<html>
<head>
	<title>Serie | </title>
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
		<div class="navbar2">
			<img src="img/logo.png">
			<div class="title">
				<h1><?=$_GET["nom_serie"]; ?></h1>
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
		<div class="affiche">
			<img src="img/<?=$_GET["nom_serie"]?>.png">
		</div>
		<div class="lesepisodes">
			<?php
				$connexion = mysqli_connect("localhost","root","","netflix");
				$req = "SELECT * FROM episodes WHERE numSerie ='".$_GET["id_serie"]."'";
				$res = mysqli_query($connexion,$req);
				while($ligne = mysqli_fetch_array($res))
				{
					?>
					<div class="episode">
						<div class="contenu">
							<p><span><?= $ligne["titreEpisode"]?></span></p>
							<p><span>Durée : </span><?= $ligne["dureeEpisode"]?></p>
							<p><span>Résumé : </span><?= $ligne["recapEpisode"]?></p>
							<a href="evaluer.php?id_episode=<?=$ligne["numEpisode"]?>&titre_episode=<?=$ligne["titreEpisode"]?>">Noter l'épisode</a>
						</div>
					</div>			
				<?php
				}
				mysqli_close($connexion);
			?>
		</div>
		<div class="regarderSerie">
			<button name="envoyer20" class="envoyer20">Regarder</button>
		</div>
		<?php
		if(isset($_POST["envoyer20"]))
		{
			$connexion = mysqli_connect("localhost","root","","netflix");
			$req = "INSERT INTO regarder (numSerie,numUtilisateur,saisonEnCours,dernierEpisodeVu) VALUES ('".$_GET["id_serie"]."','".$_SESSION["id"]."',1,1)";
			$res = mysqli_query($connexion,$req);
			mysqli_close($connexion);
			header('Location: accueil.php');
		}
		?>
	</div>
</body>
</html>