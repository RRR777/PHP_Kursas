<!-- Duoti trys skaičiai: a,b,c. Nustatykite ar šie skaičiai gali būti 
trikampio kraštinių ilgiai ir jei gali tai kokio trikampio: lygiakraščio, 
lygiašonio ar įvairiakraščio. Atspausdinkite atsakymą. Kaip pradinius 
duomenis panaudokite tokius skaičius: 
1, 2, 4 
2, 10, 8 
5, 6, 5 
5, 5, 5 
-->

<?php
	echo "<h1>Užduotis 5.1</h1>";
    echo "<br>";
    echo "Duoti trys skaičiai: a,b,c. Nustatykite ar šie skaičiai gali būti 
	trikampio kraštinių ilgiai ir jei gali tai kokio trikampio: lygiakraščio, 
	lygiašonio ar įvairiakraščio. Atspausdinkite atsakymą. Kaip pradinius 
	duomenis panaudokite tokius skaičius:" ;
	echo "<br>";
	echo "1, 2, 4";
	echo "<br>";
	echo "2, 10, 8 ";
	echo "<br>";
	echo "5, 6, 5 ";
	echo "<br>";
	echo "5, 5, 5 ";
    echo "<br>";
    echo "<br>";

	$arrayData = array(array(1, 2, 4),array(2, 10, 8),array(5, 6, 5),array(5, 5, 5));
	$n = count($arrayData);					//skaičiuoja Masyvo $arrayData elementų skaičių

	for ($i=0; $i<$n; $i++){
		$j = 0;
		$a = $arrayData[$i][$j];
		$b = $arrayData[$i][++$j];
		$c = $arrayData[$i][++$j];

		if ($a + $b > $c && $a + $c > $b && $b + $c > $a){
			if ($a == $b && $b == $c){
				echo "Šis trikampis yra lygiakraštis: " .$a ." " .$b ." ".$c;
				echo '<br />';
				echo '<br />';
				} else if ($a == $b || $a == $c || $b == $c){
					echo "Šis trikampis yra lygiašonis: " .$a ." " .$b ." ".$c;
					echo '<br />';
					echo '<br />';
					}else {
						echo "Šis trikampis yra įvairiakraštis: " .$a ." " .$b ." ".$c;
						echo '<br />';
						echo '<br />';
					}
		}else {
			echo "Tikampio negalima sudaryti: " .$a ." " .$b ." ".$c;
			echo '<br />';
			echo '<br />';
		}
	}
?>
