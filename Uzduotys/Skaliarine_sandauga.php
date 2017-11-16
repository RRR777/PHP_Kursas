<!-- Parašykite funkciją skaliariškai sudauginančią du vektorius
(vienmačius masyvus). Patikrinkite funkcijos rezultatą su šiais
dviem vektoriais (5, 6, 10, 15) ir (8, 5, 3, 25). Rezultatas: 475.
Info: https://lt.wikipedia.org/wiki/Skaliarinė_sandauga

Skaliarinė sandauga: tai masyvo elementų (su tais pačiais indeksais) sandaugų suma:
5*8 + 6*5 + 10*3 + 15*25
 -->
<?php
    $a = array(5, 6, 10, 15);
    $b = array(8, 5, 3, 25);
    $n = count($a);			
       
    $San = 1;
    $suma = 0;

    for ($i=0; $i<$n; $i++){
        $San = $a[$i] * $b[$i];
        $suma = $suma + $San;
    }   
    echo "Skaliarinio masyvo suma yra: " .$suma;
?>