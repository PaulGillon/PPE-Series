<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	session_start();
	$connexion = mysqli_connect("localhost","root","","netflix");
	$req = "INSERT INTO partager (numUser,numAmi) VALUES ('".$_SESSION["id"]."','".$_GET["id_utilisateur"]."')";
	$res = mysqli_query($connexion,$req);
	header('Location: partage.php');
	?>
</body>
</html>