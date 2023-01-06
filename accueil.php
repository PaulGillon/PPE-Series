<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<script type="text/javascript"></script>
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

		if(isset($_POST["creer"]))
		{
			if($_SESSION["log"] == "arnaud54")
			{
				mysqli_close($connexion3);
				header('Location: addSerie.php');
				exit;
			}
			else
			{
				echo '<p>Vous n\'avez pas les droits requis !</p>';
			}
		}

	?>

	<div class="container">
		<div class="navbar2">
			<img src="img/logo.png">
			<div class="title">
				<h1>Accueil</h1>
				<p>Bienvenue <?php echo "<span>".$_SESSION["prenom"]."</span>";?></p>
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
		<form name="form3" method="POST" class="form3">
		<div class="lesaffiches">
			<div class="titre_affiche">
				<h1>Catalogue de série</h1>
			</div>
			<div class="affiches">
				<?php
					$connexion11 = mysqli_connect("localhost","root","","netflix");
					$req11 = "SELECT * FROM series";
					$res11 = mysqli_query($connexion11,$req11);
					while($ligne = mysqli_fetch_array($res11))
					{
						?>
						<a href="addRegarder.php?id_serie=<?=$ligne["numSerie"]?>&nom_serie=<?=$ligne["titreSerie"]?>">
							<img src="img/<?php echo $ligne["titreSerie"]?>.png">
						</a>				
					<?php
					}
					mysqli_close($connexion11);
				?>
			</div>
		</div>
			<div class="ajouter">
				<button name="creer">Ajouter des séries</button>
			</div>
			<div class="series_en_cours">
				<div class="titre_affiche">
					<h1>Mes séries en cours</h1>
				</div>
				<?php
				$connexion12 = mysqli_connect("localhost","root","","netflix");
				$req12 = "SELECT regarder.numSerie, regarder.saisonEnCours, regarder.dernierEpisodeVu, series.titreSerie FROM regarder INNER JOIN series ON regarder.numSerie = series.numSerie INNER JOIN utilisateurs ON regarder.numUtilisateur = utilisateurs.numUtilisateur WHERE utilisateurs.numUtilisateur = '". $_SESSION["id"] ."'";
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
			<div class="maj">
				<a href="regarder.php">
					<button name="update" class="update">Mettre à jour une série</button>
				</a>
			</div>
		</form>
		<div class="partager">
			<a href="partage.php">
				<button name="partage">Partager</button>
			</a>
		</div>
	</div>
</body>
</html>