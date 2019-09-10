<html>
	<head>
	<Title> Exo2 </Title>
	<meta charset= "utf_8" />
	</head>
	<body>
	<h1> Exo2 </h1>
	<br/>
	<form method = "post" action = "ttc.php">
	prix hors taxe : <input type = "text", name = "prix">
	Tva : <input type = "text", name = "tva">
    quantité : <input type = "text", name = "qte">
	<input type  = "submit", name = "Valider">
	<input type  = "reset", name = "Annuler", value = "Annuler" >
	</form>
	<?php
	if (isset($_POST["Valider"]))
	{
		$prix = $_POST["prix"];
	    $tva = $_POST["tva"];
		$qte = $_POST["qte"];
		
		$ttc = $prix + ($prix * $tva) /100 ;
		$ttc = $ttc * $qte;
		

		echo ("le prix ttc du total est de : " . $ttc);
	}
	?>
	</body>
</html>
		