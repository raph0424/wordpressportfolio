<html>
	<head>
		<title> Exo3 </title>
		<meta charset= "utf-8"/>

	</head>
	<body>
		<h1> Exo secondegre </h1>
		<h2> </h2> 
		<br/>
		<form method="post" action= "">
			A : <input type="text" name="a"> </br>
			B : <input type="text" name="b"> </br>
			C : <input type ="text" name="c"> </br>
			<input type="reset" name="Annuler" value="Annuler">
			<input type="submit" name="Valider" value="Valider">
		</form>
		
		<?php
			//calcule du second degré
			if (isset($_POST["Valider"]))
			{
				$a = $_POST["a"];
				$b = $_POST["b"];
				$c = $_POST["c"];
				
				//test a
				if ($a != 0)
				{
					$d = ($b*$b)-(4*$a*$c);
					if ($d < 0)
						printf("pas de racine");
					else if ($d == 0){
						$x = - $b / 2*$a;
					printf ("%f", $x);
					}
					else if ($d > 0){
						$x1 = (-$b - sqrt($d)) / (2*$a);
						$x2 = (-$b + sqrt($d)) / (2*$a);
						printf("%f %f", $x1, $x2);
					}
				}
				else if ($b != 0){
					$x = -$c / $b;
					printf ("%f", $x);
				}
				else if ($c != 0){
					printf("l'ensemble des solutions est vide");
				}
				else 
				{
					printf("tout nombre x est solution du resultat");
				}
			}
			?>
		</body>
	</html>