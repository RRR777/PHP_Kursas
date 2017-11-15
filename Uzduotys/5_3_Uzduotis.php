<!-- Duotas masyvas array(-10, 0, 2, 9, -5). 
Atspausdinkite masyvo elementus mažėjimo tvarka. 

-->


<?php
	$arrayData = array(-4, 15, 7, 12, -2);
	$n = count($arrayData);					//skaičiuoja Masyvo $arrayData elementų skaičių
    
    echo "Masyvas surikiuotas mažėjimo tvarka: ";
    for ($i=0; $i<$n; $i++){
        $Max = $arrayData[$i];
        $k=$i;
            for ($j=$i+1; $j<$n; $j++){
                if ($Max<$arrayData[$j]){
                    $Max = $arrayData[$j];
                    $k=$j;
                }        
            }
    $arrayData[$k]=$arrayData[$i];
    $arrayData[$i]=$Max;
    echo $Max .", ";
    }   
?>