<!DOCTYPE html>
<html>
<head>
	<title>Deconnexion</title>
</head>
<body>
	<?php
	session_destroy();
	header("Location: connexion.php");
	exit;
	?>
</body>
</html>