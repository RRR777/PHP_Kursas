<!-- Tobuluoju skaičiumi vadinamas natūralusis skaičius, lygus
visų savo daliklių, mažesnių už save patį, sumai.
pvz 28 = 1 + 2 + 4 + 7 + 14
Suraskite visus tokius skaičius iš intervalo 1...1000.
Skaičiaus daliklių radimui ir tikrinimui ar skaičius tobulas
pasirašykite atskiras funkcijas. -->

<?php
    echo "<h1>Užduotis 6.2</h1>";
    echo "<br>";
    echo "Tobuluoju skaičiumi vadinamas natūralusis skaičius, lygus
        visų savo daliklių, mažesnių už save patį, sumai.
        pvz 28 = 1 + 2 + 4 + 7 + 14
        Suraskite visus tokius skaičius iš intervalo 1...1000.
        Skaičiaus daliklių radimui ir tikrinimui ar skaičius tobulas
        pasirašykite atskiras funkcijas.";
    echo "<br>";
    echo "<br>";
    
    $a = 1;                     //duotas intervalas nuo 1 
    $b = 1000;                  //duotas intervalas       iki 1000<
    echo "Tobulieji skaičiai: ";
    for ($i=$a; $i<=$b; $i++){
        $s = $i;
        $var = numbers ($s);
        $suma = suma ($var);

        if ($s == $suma){
          echo $s .", ";
        }
    }
 
    function numbers ($a){
        $answ = array ();
        for ($i=1; $i < $a; $i++) {
            if ($a % $i == 0){
                array_unshift ($answ, $i);
            }
        }
        return $answ;
    }

    function suma ($answ){
        $n = count($answ);
        $suma = 0;
        for ($i=0; $i < $n; $i++){
            $suma = $suma + $answ[$i];
        }
    return $suma;  
    }
?>
