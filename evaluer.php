<!DOCTYPE html>
<html>
<head>
	<title>Evaluer</title>
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
				<h1>Evaluer</h1>
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
			<h1><?=$_GET["titre_episode"]?></h1>
		</div>
		<form name="form4" method="POST" class="form2">
			<textarea placeholder="Votre commentaire" name="commentaire"></textarea>
			<input type="number" name="note" placeholder="Votre note">
			<button name="ajouter_com">Ajouter</button>
		</form>
		<div class="resultat">
			<?php
			if(isset($_POST["ajouter_com"]))
			{
				$connexion = mysqli_connect("localhost","root","","netflix");
				$req = "SELECT * FROM evaluer WHERE numEpisode = '".$_GET["id_episode"]."' AND numUtilisateur = '".$_SESSION["id"]."'";
				$res = mysqli_query($connexion,$req);
				$ligne = mysqli_fetch_assoc($res);
				$dans_bdd = mysqli_num_rows($res);
				if($dans_bdd == 0)
				{
					$req2 = "INSERT INTO evaluer (numEpisode,numUtilisateur,commentaire,note) VALUES ('".$_GET["id_episode"]."','".$_SESSION["id"]."','".$_POST["commentaire"]."','".$_POST["note"]."')";
					$res2 = mysqli_query($connexion,$req2);
					echo "<p>Votre commentaire et votre note ont bien été pris en compte !</p>";
				}
				else
				{
					$req3 = "UPDATE evaluer SET commentaire = '".$_POST["commentaire"]."', note = '".$_POST["note"]."'";
					$res3 = mysqli_query($connexion,$req3);
					echo "<p>Votre commentaire et votre note ont bien été modifié pour cet épisode !</p>";
				}
				mysqli_close($connexion);
			}
			?>
		</div>
		<div class="lescommentaires">
			<?php
			$connexion2 = mysqli_connect("localhost","root","","netflix") OR die ("Erreur de connexion !");
			$req4 = "SELECT commentaire,note,loginUtilisateur FROM evaluer INNER JOIN utilisateurs ON evaluer.numUtilisateur = utilisateurs.numUtilisateur WHERE numEpisode = '".$_GET["id_episode"]."'";
			$res4 = mysqli_query($connexion2,$req4);
			while($ligne4 = mysqli_fetch_assoc($res4))
			{
				?>
				<div class="notation">
					<p>Par <?= $ligne4["loginUtilisateur"] ?></p>
					<p><?= $ligne4["commentaire"] ?></p>
					<p><?= $ligne4["note"] ?></p>
				</div>
				<?php	
			}
			mysqli_close($connexion2);
			?>
		</div>
	</div>
</body>
</html>