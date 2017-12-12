<?php
# 19 - 3 Pratimas
# Parašykite užklausą, kuri išvestų vairuotojus ir jų pasiektą didžiausią greitį 
# to greičio mažėjimo tvarka

$sql = "SELECT DISTINCT radars.driverId, name, Round(MAX(distance/time),2) AS maxSpeed
    FROM radars
    LEFT OUTER JOIN drivers ON radars.driverId = drivers.driverId
    WHERE drivers.driverId is not null AND radars.driverId != 0 
    GROUP BY radars.driverId
    ORDER BY maxSpeed DESC";
?>