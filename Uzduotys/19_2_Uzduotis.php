<?php 
// Parašykite užklausą, kuri išvestų vairuotojus, kurie vairavo automobilį 
// bent dvi skirtingas dienas


$sql = "SELECT COUNT(DISTINCT Date (date)) as `kiekis`, radars.driverId, name
        FROM radars
        LEFT OUTER JOIN drivers on radars.driverId = drivers.driverId
        WHERE drivers.driverId is not null AND radars.driverId != 0 
      	GROUP BY radars.driverId
        HAVING kiekis >= 2
        ORDER BY radars.driverId, name";
?>