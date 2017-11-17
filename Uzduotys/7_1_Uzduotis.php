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

    $n = count($a);
    for ($i=0; $i<$n; $i++) {
        $first = $a[$i];
        for ($j=$i; $j<$n; $j++) {
            $second = $a[$j];
            if ($first != $second){
                echo $first ." - " .$second ." <br> ";
            }
        }
    }        
    
    echo "<h1>Užduotis 7.2</h1> <br>
         Turime masyvą \$a = [‘Jonas’, ‘Petras’, ‘Antanas’, ‘Povilas’]. <br>
         2. Ta pati sąlyga tik pvz poros ‘Jonas’ - ‘Petras’ ir ‘Petras’ - ‘Jonas’ 
         yra laikomos skirtingomis. <br> <br>";


    $a = ["Jonas", "Petras", "Antanas", "Povilas"];

    foreach ($a as $key => $value) {
        $first = $value;
        foreach ($a as $key => $value) {
            $second = $value;
            if ($first != $second){
                echo $first ." - " .$second ." <br> ";
            }
        }
    }
?>
