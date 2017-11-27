<?php  /* #7 - 3 Uždavinys - Turime daugiamatį masyvą, kuris aprašo kažką panašaus į 
Excel lentelę arba matricą, t.y. pirmas indeksas žymi eilutę, o antras stulpelį. 
Eilutės gali turėti skirtingą elementų (stulpelių) skaičių. Suskaičiuokite 
stulpeliuose esančių skaičių sumas ir išveskite didžiausią 

testuokite su masyvu: $a = [ [1, 3, 4], [2, 5], [2 => 3, 5=> 8], [1, 1, 5 => 1] ];  */

    echo "<h1>Užduotis 7.3</h1> <br>";

    echo "Turime daugiamatį masyvą, kuris aprašo kažką panašaus į 
         Excel lentelę arba matricą, t.y. pirmas indeksas žymi eilutę, o antras stulpelį. 
         Eilutės gali turėti skirtingą elementų (stulpelių) skaičių. Suskaičiuokite 
         stulpeliuose esančių skaičių sumas ir išveskite didžiausią. <br> <br>";
    echo "<b>Pirmas variantas: </b><br>"; 

    $a = [[1, 3, 4], [2, 5], [2=>3, 5=>8], [1, 1, 5=>2]];  
    
    $max = 0;
    $st_suma = 0;   

    foreach ($a as $key => $value){      // ($i=0; $i<$stulp; $i++){
        foreach ($value as $key1 => $value1){  
          $st_suma = sumavimas ($a, $key1);
            if ( $st_suma > $max) {
              $max = $st_suma;
              $index = $key1;  
            }   
        }
    }
    echo "Maksimali stulpelio $index suma yra: $max <br><br><br><br>";  

    function sumavimas ($a, $st){
        $suma = 0;
        foreach ($a as $key => $value) {            
            foreach ($value as $n => $elem) {           
                if ($n == $st) {
                    $suma += $elem;
                }
            } 
        }
        return $suma; 
    }
?>

