<html>
<body>
	<title> exo php </title>
	<form method='POST' action = rectangle.php >
	Longueur : <input type='text' name='lg'>
	Largeur : <input type='text' name='lr'>
	Reset : <input type='reset' name='annuler' value = 'annuler'>
    Valider : <input type='submit' name='calculer' value = 'calculer'>
	</form>
	
	
<?php 
if (isset($_POST['calculer']))
{
	$lg = $_POST['lg'];
	$lr = $_POST['lr'];
	$p = ($lg + $lr) * 2;
	$s = ($lg * $lr);
	echo("La surface est de :" . $s ."le perimetre est de" . $p);
}
?>
</body>
</html>
