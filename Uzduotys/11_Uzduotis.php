<?php
#   11 - Uždavinys
#   Panaudokime klasę Radar. Reikia susikurti metodą, kuris 
#   paskaičiuotų greitį kilometrais per valandą.
#   Sukurkite masyvą iš 3-4 elementų ir išveskite $mobilius
#   pagal greitį mažėjimo tvarka. Taip pat išveskite ir greičio 
#   reikšmes vieno ženklo po kablelio tikslumu.
/* Susikurkite klasę Radar, kurioje būtų tokie atributai:
1. $date - Data ir laikas
2. $number - $mobilio numeris
3. $distance - Nuvažiuotas atstumas metrais
4. $time - Sugaištas laikas sekundėmis
Sukurkite masyvą iš 3-4 elementų ir išveskite juos pagal datos
lauką nuo vėliausio iki anksčiausio, t.y. mažėjimo tvarka. */

class Radar
{
    public $date;           //Data ir laikas
    public $number;         //$mobilio numeris
    public $distance;       //Nuvažiuotas atstumas metrais
    public $time;           //Sugaištas laikas sekundėmis
    public $speed;

     function __construct($date, $number, $distance, $time) {
        $this->date = $date;
        $this->number = $number;
        $this->distance = $distance;
        $this->time = $time;
    }
    function speed(){     //greitis kilometrais per valandą
        $speed = ((($this->distance)/1000)/(($this->time)/3600));
        $speed = round($speed, 1);        
        return $speed;
    }
}

$auto = [
    new Radar ('2017-05-24 16:15:12', 'AAA 111', '175000', '8600'),
    new Radar ('2017-10-01 10:40:30', 'BBB 222', '70000', '5000'),
    new Radar ('2017-10-15 08:05:55', 'CCC 333', '140000', '6500'),
    new Radar ('2017-02-07 19:20:27', 'DDD 444', '120000', '7560'),
];


?>
<h1>Automobilių sąraše yra: <?php echo count($auto)?></h1>
<h3>Rūšiuojama pagal datą, mažėjimo tvarka: </h3>
    <?php if ($auto): ?>
      <table border="1">
        <tr>
          <th>Nr.</th><th>Date</th><th>Number</th><th>Distance,m</th><th>Time,s</th><th>Speed, km/h</th>
        </tr>
        <?php   foreach ($auto as $car){
                    $car->speed = $car->speed();
                }        
                usort($auto, function($p1, $p2) {
                    if ($p1->date == $p2->date) return 0;
                    elseif ($p1->date > $p2->date) return -1;
                        else return 1;
                }); ?>
                <tr> <?php foreach ($auto as $key => $car):?>
                    <td><?php echo ++$key ?></td>             
                    <td><?php echo $car->date ?></td>                  
                    <td><?php echo $car->number ?></td>
                    <td><?php echo $car->distance ?></td>
                    <td align = "center"><?php echo $car->time ?></td>
                    <td align = "center"><?php echo $car->speed ?></td>
                </tr>  
        <?php endforeach ?>
        </table> 
        <h3>Rūšiuojama pagal greitį, mažėjimo tvarka: </h3>
        <table border="1">
        <tr>
          <th>Nr.</th><th>Date</th><th>Number</th><th>Distance,m</th><th>Time,s</th><th>Speed, km/h</th>
        </tr>
        <?php   usort($auto, function($p1, $p2) {
                    if ($p1->speed == $p2->speed) return 0;
                    elseif ($p1->speed > $p2->speed) return -1;
                        else return 1;
                }); ?>
                <tr> <?php foreach ($auto as $key => $car):?>
                    <td><?php echo ++$key ?></td>             
                    <td><?php echo $car->date ?></td>                  
                    <td><?php echo $car->number ?></td>
                    <td><?php echo $car->distance ?></td>
                    <td align = "center"><?php echo $car->time ?></td>
                    <td align = "center"><?php echo $car->speed ?></td>
                </tr>  
        <?php endforeach ?> 
      </table>
    <?php else: ?>
      <p>Nėra duomenų.</p>
    <?php endif; ?>
    <br><br>

