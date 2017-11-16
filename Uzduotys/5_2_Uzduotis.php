<!-- Duoti trys skaičiai: a,b,c. Nustatykite ar šie skaičiai gali būti 
trikampio kraštinių ilgiai ir jei gali tai kokio trikampio: lygiakraščio, 
lygiašonio ar įvairiakraščio. Atspausdinkite atsakymą. Kaip pradinius 
duomenis panaudokite tokius skaičius: 
3, 4, 5 
2, 10, 8 
5, 6, 5 
5, 5, 5 
Apskaičiuokite ir atspausdinkite šių trikampių plotus-->

<?php
	$arrayData = array(array(3, 4, 5),array(2, 10, 8),array(5, 6, 5),array(5, 5, 5));
	$n = count($arrayData);					//skaičiuoja Masyvo $arrayData elementų skaičių
	$s = 0;
	
	for ($i=0; $i<$n; $i++){
		$j = 0;
		$a = $arrayData[$i][$j];
		$b = $arrayData[$i][++$j];
		$c = $arrayData[$i][++$j];

		if ($a + $b != $c && $a + $c != $b && $b + $c != $a){
			if ($a == $b && $b == $c){
				echo "Šis trikampis yra lygiakraštis: " .$a ." " .$b ." ".$c;
				echo '<br />';
				$s = plotas ($a, $b, $c);
				echo "Šio trikampio plotas yra: " .round($s, 2); 
				echo '<br />';
				echo '<br />';
				} else if ($a == $b || $a == $c || $b == $c){
					echo "Šis trikampis yra lygiašonis: " .$a ." " .$b ." ".$c;
					echo '<br />';
					$s = plotas ($a, $b, $c);
					echo "Šio trikampio plotas yra: " .round($s, 2);
					echo '<br />';
					echo '<br />';
					}else {
						echo "Šis trikampis yra įvairiakraštis: " .$a ." " .$b ." ".$c;
						echo '<br />';
						$s = plotas ($a, $b, $c);
						echo "Šio trikampio plotas yra: " .round($s, 2);
						echo '<br />';
						echo '<br />';
					}
		}else {
			echo "Tikampio negalima sudaryti." .$a ." " .$b ." ".$c;
			echo '<br />';
			echo '<br />';
		}
	}
	function plotas($a, $b, $c) {
 
		  $p = (($a+$b+$c)/2);
		  $s = sqrt ($p*($p-$a)*($p-$b)*($p-$c));
		  return $s;
	}
?>
