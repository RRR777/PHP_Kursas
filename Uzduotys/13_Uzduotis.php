<?php
echo "<h1>13 Užduotis</h1>";
$str = '/demo/19/automobilis?id=140';
echo "<h3> Pradiniai duomenys: " .$str ."</h3>";
#########################################################################
echo "<h3> 1.rasti tekstą nuo pradžios iki ? (/demo/19/automobilis)</h3>";
$re = '/^[^\?]+/';
preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
//var_dump($matches);
printing($matches, $re);
#########################################################################
echo "<h3> 2. raskite tekstą nuo ? iki galo (id=140)</h3>";
$re = '/[^\?]+$/';
preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
//var_dump($matches);
printing($matches, $re);
#########################################################################
echo "<h3> 3. raskite tekstą iki antro / (/demo)</h3>";
$re = '/^\/.\w*/';
preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
//var_dump($matches);
printing($matches, $re);
#########################################################################
echo "<h3>4. raskite tekstą tarp paskutinio / ir ? (automobilis)</h3>";
$re = '/(?<=\/)\w*(?=\?)/';
preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
//var_dump($matches);
printing($matches, $re);

function printing($array, $re){
    foreach ($array as $key => $value) {
    foreach ($value as $key2 => $value2) {
        echo "<b>Atsakymas: </b>".$re ." - " .$value2 ."<br>";
    }
}
}
?> 