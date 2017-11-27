<!-- #7 - 1/2 Uždaviniai - Turime masyvą $a = [‘Jonas’, ‘Petras’, ‘Antanas’, ‘Povilas’]. 
1. Atspausdinkite visas galimas skirtingas poras laikant, kad pvz poros ‘Jonas’ - ‘Petras’ ir 
‘Petras’ - ‘Jonas’ yra tokios pat. 
2. Ta pati sąlyga tik pvz poros ‘Jonas’ - ‘Petras’ ir ‘Petras’ - ‘Jonas’ 
yra laikomos skirtingomis. -->

<?php
    echo "<h1>Užduotis 7.1</h1><br>
         Turime masyvą \$a = [‘Jonas’, ‘Petras’, ‘Antanas’, ‘Povilas’]. <br>
         1. Atspausdinkite visas galimas skirtingas poras laikant, kad pvz poros ‘Jonas’ - ‘Petras’ ir 
         ‘Petras’ - ‘Jonas’ yra tokios pat. <br><br>";

    $a = ["Jonas", "Petras", "Antanas", "Povilas"];

    for ($i=0; $i<count($a); $i++) {
        for ($j=$i; $j<count($a); $j++) {
            if ([$i] !== [$j]){
                echo $a[$i] ." - " .$a[$j] ." <br> ";
            }
        }
    }        
    
    echo "<h1>Užduotis 7.2</h1> <br>
         Turime masyvą \$a = [‘Jonas’, ‘Petras’, ‘Antanas’, ‘Povilas’]. <br>
         2. Ta pati sąlyga tik pvz poros ‘Jonas’ - ‘Petras’ ir ‘Petras’ - ‘Jonas’ 
         yra laikomos skirtingomis. <br> <br>";


    $a = ["Jonas", "Petras", "Antanas", "Povilas"];

    foreach ($a as $key1 => $value1) {
        foreach ($a as $key2 => $value2) {
            if ($key1 != $key2){
                echo $value1 ." - " .$value2 ." <br> ";
            }
        }
    }
?>
