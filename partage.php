<!DOCTYPE html>
<html>
<head>
	<title>Partager</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/21f5918446.js" crossorigin="anonymous"></script>
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
				<h1>Partager</h1>
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
		<div class="liste">
			<div class="liste_ami">
				<h1>Liste d'amis</h1>
				<div class="mes_amis">
					<?php
					$connexion13 = mysqli_connect("localhost","root","","netflix");
					$req13 = "SELECT * FROM utilisateurs INNER JOIN partager ON utilisateurs.numUtilisateur = partager.numAmi WHERE numUser LIKE '".$_SESSION["id"]."'";
					$res13 = mysqli_query($connexion13,$req13);
					while($ligne = mysqli_fetch_assoc($res13))
					{
						?>
						<div class="ami">
							<p><?= $ligne["loginUtilisateur"]; ?></p>
							<a href="partage2.php?id_user=<?=$ligne["numUtilisateur"]?>&login=<?=$ligne["loginUtilisateur"]?>">Voir sa liste de film</a>
						</div>
						<?php
					}
					?>
				</div>
			</div>
			<div class="ajouter_ami">
				<h1>Liste d'utilisateurs</h1>
				<div class="les_utilisateurs">
					<?php
					$connexion = mysqli_connect("localhost","root","","netflix");
					$req = "SELECT * FROM utilisateurs";
					$res = mysqli_query($connexion,$req);
					while($ligne = mysqli_fetch_assoc($res))
					{
						?>
						<div class="ajout_ami">
							<a href="add_friend.php?id_utilisateur=<?=$ligne["numUtilisateur"]?>">
								<p class="ajout_ami_titre"><?=$ligne["loginUtilisateur"]?></p>
								<i class="fas fa-user-plus"></i>
							</a>
						</div>
						<?php
					}
					mysqli_close($connexion);
					?>
				</div>
			</div>
		</div>
		<?php
		if(isset($_GET["id_user"]))
		{
			?>
			<div class="series_en_cours">
				<div class="titre_affiche">
					<h1>Séries en cours de <?=$_GET["login"]?></h1>
				</div>
				<?php
				$connexion12 = mysqli_connect("localhost","root","","netflix");
				$req12 = "SELECT regarder.numSerie, regarder.saisonEnCours, regarder.dernierEpisodeVu, series.titreSerie FROM regarder INNER JOIN series ON regarder.numSerie = series.numSerie INNER JOIN utilisateurs ON regarder.numUtilisateur = utilisateurs.numUtilisateur WHERE utilisateurs.numUtilisateur = '". $_GET["id_user"] ."'";
				$res12 = mysqli_query($connexion12,$req12);
				?>
				<div class="maSelection">
					<?php
					while($ligne8 = mysqli_fetch_array($res12))
					{
						?>
						<div class="regarder">
							<img src="img/<?php echo $ligne8["titreSerie"]?>.png">
							<div class="subtitle">
								<p>Saisons : <?php echo $ligne8["saisonEnCours"]; ?></p>
								<p>Dernier épisode visionné : <?php echo $ligne8["dernierEpisodeVu"]; ?></p>
							</div>
						</div>
						<?php
					}
					mysqli_close($connexion12);
					?>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</body>
</html>