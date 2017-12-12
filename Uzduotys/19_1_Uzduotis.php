<?php
# 19 - 1 Pratimas
# Parašykite užklausą, kuri išvestų vairuotojus, kurie vairavo daugiau nei 
# vieną automobilį

$sql = "SELECT COUNT(DISTINCT number) as kiekis, radars.driverId, name
        FROM radars
        LEFT OUTER JOIN drivers on radars.driverId = drivers.driverId
        WHERE drivers.driverId is not null AND radars.driverId != 0  
      	GROUP BY radars.driverId
        HAVING kiekis > 1
        ORDER BY radars.driverId, name";
?>
