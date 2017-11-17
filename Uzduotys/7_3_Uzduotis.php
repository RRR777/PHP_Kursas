<!-- #7 - 3 Uždavinys - Turime daugiamatį masyvą, kuris aprašo kažką panašaus į 
Excel lentelę arba matricą, t.y. pirmas indeksas žymi eilutę, o antras stulpelį. 
Eilutės gali turėti skirtingą elementų (stulpelių) skaičių. Suskaičiuokite 
stulpeliuose esančių skaičių sumas ir išveskite didžiausią 

testuokite su masyvu: $a = [ [1, 3, 4], [2, 5], [2 => 3, 5=> 8], [1, 1, 5 => 1] ];
-->

<?php
    echo "<h1>Užduotis 7.3</h1> <br>";

    echo "Turime daugiamatį masyvą, kuris aprašo kažką panašaus į 
         Excel lentelę arba matricą, t.y. pirmas indeksas žymi eilutę, o antras stulpelį. 
         Eilutės gali turėti skirtingą elementų (stulpelių) skaičių. Suskaičiuokite 
         stulpeliuose esančių skaičių sumas ir išveskite didžiausią. <br> <br>";
    echo "<b>Pirmas variantas: </b><br>"; 

    $a = [[1, 3, 4], [2, 5], [2=>3, 5=>8], [1, 1, 5=>1]];  
    $max = 0;
    $stulp = 6;
    $st_suma = 0;

    function sumavimas ($a, $st){
        $suma = 0;
        foreach ($a as $key => $value) {            
            foreach ($value as $n => $elem) {           
                if ($n == $st) {
                    $suma += $elem;
                }
            } 
        }
        echo $st ." stulpelio Suma yra: " .$suma  ." <br>";
        return $suma; 
    }

    for ($i=0; $i<$stulp; $i++){
        $st_suma = sumavimas ($a, $i);
        if ( $st_suma > $max) {
            $max = $st_suma;           
        }
    }     
    echo "Maksimali stulpelio  suma yra: " .$max ."<br><br><br><br>";  
?>

<?php
    echo "<b>Antras variantas: </b><br><br>";

    $a = [[1, 3, 4], [2, 5], [2=>3, 5=>8], [1, 1, 5=>1]];    
    $max = 0;
    $stulp = 6;  
    
    for ($i=0; $i< 6; $i++){
        $st_suma = 0;
        $column_numbers = array_column($a, $i);
        $stulp = count ($column_numbers);
            for ($j = 0; $j < $stulp; $j++){
                 $st_suma += $column_numbers[$j];
                 if ( $st_suma > $max) {
                    $max = $st_suma;    
            }     
        }
        echo "Stulpelio " .$i ." suma yra: " .$st_suma ."<br>"; 
    }  
        echo "Maksimali stulpelio  suma yra: " .$max ."<br>"; 
?>