<!DOCTYPE html>
<html>
    <head>
        <title>10 Uzduotis</title>
        <meta charset="UTF-8">
    </head>
<body>
<?php 
 /* #10 - Uždavinys - Papildykite Mokinys klasę tekstiniu atributu gimimoData,
  t.y. jo reikšmė bus pvz ‘2001-10-31’. Sukurkite Mokinys klasei metodą, 
  kuris grąžintų sveiką skaičių kiek mokiniui yra metų, pvz. 17 (16,5 → 16). 
  Sukurkite kelių (3-4) mokinių masyvą ir atspausdinkite html lentelėje tik 
  tuos mokinius kurie turi 18 metų ir daugiau.
 */
class Mokinys{
    public $vardas;
    public $pavarde;
    public $gimimoData;

    function __construct($vardas, $pavarde, $gimimoData) {
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
        $this->gimimoData = $gimimoData;
    }

    function dateDifference($date_1 , $date_2 , $differenceFormat = '%a'){
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);
    
        $interval = date_diff($datetime1, $datetime2);
    
        return $interval->format($differenceFormat);    
    }
}
?>
<?php
$mokiniai = [
    new Mokinys('Rasa', 'Jurkute', '2001-11-31'),
    new Mokinys('Greta', 'Tarasovaite', '1998-02-10'),
    new Mokinys('Vytas', 'Jovaisa','1995-05-24'),
    new Mokinys('Laima', 'Jovaisiene','2005-07-08'),
    new Mokinys('Rytis', 'Jursys','2002-12-12'),
    new Mokinys('Giedre', 'Giedraityte','1996-04-17')
];
?>
<h1>Mokinių sąraše yra: <?php echo count($mokiniai)?></h1>
    <?php if ($mokiniai): ?>
      <table border="1">
        <tr>
          <th>Nr.</th><th>Vardas</th><th>Pavardė</th><th>Gimimo data</th><th>Amžius</th>
        </tr>
        <?php foreach($mokiniai as $k => $mokinys): 
                $today = date("Y-m-d");
                $amzius = $mokinys->dateDifference($mokinys->gimimoData, $today, $differenceFormat = '%y');
                if ($amzius > 18):?>
                    <tr>              
                        <td><?php echo $k+1 ?></td>                  
                        <td><?php echo $mokinys->vardas ?></td>
                        <td><?php echo $mokinys->pavarde ?></td>
                        <td><?php echo $mokinys->gimimoData ?></td>
                        <td align="center"><?php echo $amzius ?></td>
                    </tr>   
                <?php endif ?>      
        <?php endforeach ?> 
      </table>
    <?php else: ?>
      <p>Nėra duomenų.</p>
    <?php endif; ?>
    <br><br>
 </body>
</html>
