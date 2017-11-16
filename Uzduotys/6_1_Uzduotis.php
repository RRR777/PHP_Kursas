<!-- Turime du masyvus $a = [5, 6, 10, 15] ir $b = [8, 5, 3, 25].
 Raskite kiekvieno masyvo skaičių vidurkį ir atspausdinkite jų 
 skirtumą. Masyvo vidurkio suradimui parašykite funkciją. 
 Rezultatas turi gautis: -1.25 -->

<?php
    $a = [5, 6, 10, 15];                //duotas masyvas $a
    $b = [8, 5, 3, 25];                //duotas masyvas $b

    vidurkis ($a);
    $skirt = vidurkis ($a) - vidurkis ($b);
    echo "Masyvo a elementų vidurkis yra: " .vidurkis ($a); 
    echo "<br>";

    echo "Masyvo b elementų vidurkis yra: " .vidurkis ($b); 
    echo "<br>";
    echo "<br>";
    echo "Masyvų a ir b vidurkių skirtumas yra: " .$skirt;
    
    
    function vidurkis ($m){
        $n = count($m);					//skaičiuoja Masyvo $arrayData elementų skaičių
        $suma = 0;

        for ($i = 0; $i < $n; $i++){
            $suma = $suma + $m[$i];
            }
        $vid = $suma / $n;
        return $vid;
    }
?>