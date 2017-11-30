<?php
# 12 - Uždavinys - Padarykite formą įvesti automobilius
# 1) Greičio fiksavimo data ir laikas, pvz: 2016-12-31 23:15:25
# 2) Automobilio numeris, pvz: ABC 001 
# 3) Nuvažiuotas atstumas metrais
# 4) Sugaištas laikas sekundėmis
# Tegul programa atsimena (session arba cookie) visus suvestus automobilius ir,
# žemiau įvedimo formos, išveda juos greičių mažėjimo tvarka į html lentelę.
?>
<?php 
session_start();  
class Radar
{
    public $date;           //Data ir laikas
    public $number;         //automobilio numeris
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
        $speed = (($this->distance)/($this->time)*3.6);
        $speed = round($speed, 1);        
        return $speed;
    }
}
$radar = [
    new Radar ('2017-05-24 16:15:12', 'AAA 111', '175000', '8600'),
    new Radar ('2017-10-01 10:40:30', 'BBB 222', '70000', '5000'),
    new Radar ('2017-10-15 08:05:55', 'CCC 333', '140000', '6500'),
    new Radar ('2017-02-07 19:20:27', 'DDD 444', '120000', '7560'),
];
?>
<h1>Automobilių sąrašas</h1>
<form action="" method="get">
    Date: <br><input type="text" name="date"><br><br>
    Auto number: <br><input type="text" name="number"><br><br>
    Distance: <br><input type="text" name="distance"><br><br>
    Time: <br><input type="text" name="time"><br><br>
    <input type="submit" name ="send" value="Send">
</form>
<?php
if (isset($_GET['date']) ){
        $_SESSION['radar'] = [$_GET['date'],$_GET['number'], $_GET['distance'],$_GET['time']];
        $radar []= new Radar ($_GET['date'],$_GET['number'], $_GET['distance'],$_GET['time']);
        $_SESSION['radar'] = $radar;
    }
?> 
<h1>Automobilių sąraše yra: <?php echo count($radar)?></h1>
    <?php if ($radar): ?>
        <h3>Rūšiuojama pagal greitį, mažėjimo tvarka: </h3>
        <table border="1">
        <tr>
          <th>Nr.</th><th>Date</th><th>Number</th><th>Distance,m</th><th>Time,s</th><th>Speed, km/h</th>
        </tr>
        <?php   foreach ($radar as $car){
                    $speed = $car->speed();
                    $car->speed = $speed;
                }       
                usort($radar, function($p1, $p2) {
                    if ($p1->speed == $p2->speed) return 0;
                    elseif ($p1->speed > $p2->speed) return -1;
                        else return 1;
                }); ?>
                <tr> <?php foreach ($radar as $key => $car):?>
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
    <?php endif; 
    
    ?>
    <br><br>
    



