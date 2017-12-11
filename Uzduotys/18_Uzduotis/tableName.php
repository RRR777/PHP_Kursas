<!DOCTYPE html>
<html>
    <head>
        <title>18 Uzduotis</title>
        <meta charset="UTF-8">
        <style>
            .curPage {
                font-size: 22px;
                color: blue;
            }
        </style>        
    </head>
<body>
<?php function table1($conn, $start_from, $results_per_page ){
    $sql = "SELECT id, date, number, distance, time, v.name, v.city, v.driverId, ROUND(distance/time*3.6, 2) AS speed 
                FROM radars a 
                LEFT OUTER JOIN drivers v ON a.driverId = v.driverId 
                ORDER BY id ASC 
                LIMIT $start_from , $results_per_page";
    $result = $conn->query($sql);
    if ($result->num_rows > 0): ?>
        <table border="1">
            <tr>
                <th bgcolor="#CCCCCC">Nr.</th>
                <th bgcolor="#CCCCCC">Date</th>
                <th bgcolor="#CCCCCC">Number</th>
                <th bgcolor="#CCCCCC">Distance,m</th>
                <th bgcolor="#CCCCCC">Time,s</th>
                <th bgcolor="#CCCCCC">Speed, km/h</th>
                <th bgcolor="#CCCCCC">Driver name</th>
                <th bgcolor="#CCCCCC">City</th>
                <th bgcolor="#CCCCCC"></th>
                <th bgcolor="#CCCCCC"></th>
            </tr>
            <?php while($row = $result->fetch_assoc()) :    // output data of each row ?>
                <tr>
                    <td><?php echo ++$start_from; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['number']; ?></td>
                    <td><?php echo $row['distance']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                    <td align = "right"><?php echo round($row['speed'], 2); ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><a href = "?id=<?php echo $row['id']; ?>">Update</a></td>
                    <td><form action="" method="post"><button name="delete" value="<?= $row['id'] ?>" type="submit">Delete</button></form></td>
                </tr>  
            <?php endwhile; ?>     
        </table>
    <?php else: 
      echo "Nėra duomenų.";
    endif;
}

function table2($conn, $auto){
    $sql = $auto;
    $n = 1;
    $result = $conn->query($sql);
    if ($result->num_rows > 0): ?>
        <h3>“Automobiliai”: </h3>
        <table border="1">
            <tr>
                <th bgcolor="#CCCCCC">Nr.</th>
                <th bgcolor="#CCCCCC">Numeris</th>
                <th bgcolor="#CCCCCC">Įrašų Kiekis</th>
                <th bgcolor="#CCCCCC">Maksimalus Greitis</th>
            </tr>
            <?php while($row = $result->fetch_assoc()) :    // output data of each row?>
                <tr>
                    <td align="center"><?php echo $n++; ?></td>
                    <td align="center"><?php echo $row['number']; ?></td>
                    <td align="center"><?php echo $row['kiekis']; ?></td>
                    <td align="center"><?php echo $row['greitis']; ?></td>                    
                </tr>  
            <?php endwhile; ?>     
        </table>
    <?php else: 
      echo "Nėra duomenų.";
    endif;
}
function table3($conn, $year){
    $sql = $year;
    $n=1;
    $result = $conn->query($sql);
    if ($result->num_rows > 0): ?>
        <h3>Metai: </h3>
        <table border="1">
            <tr>
                <th bgcolor="#CCCCCC">Nr.</th>
                <th bgcolor="#CCCCCC">Metai</th>
                <th bgcolor="#CCCCCC">Įrašų Kiekis</th>
                <th bgcolor="#CCCCCC">Maksimalus Greitis</th>
                <th bgcolor="#CCCCCC">Vidutinis Greitis</th>
                <th bgcolor="#CCCCCC">Mažiausias Greitis</th>
            </tr>
            <?php while($row = $result->fetch_assoc()) :    // output data of each row?>
                <tr>
                    <td align="center"><?php echo $n++; ?></td>
                    <td align="center"><?php echo $row['metai']; ?></td>
                    <td align="center"><?php echo $row['kiekis']; ?></td>
                    <td align="center"><?php echo $row['maks_greitis']; ?></td>  
                    <td align="center"><?php echo $row['vid_greitis']; ?></td> 
                    <td align="center"><?php echo $row['maz_greitis']; ?></td>                   
                </tr>  
            <?php endwhile; ?>     
        </table>
    <?php else: 
      echo "Nėra duomenų.";
    endif;
}
function table4($conn, $month){
    $sql = $month;
    $n=1;
    $result = $conn->query($sql);
    if ($result->num_rows > 0): ?>
        <h3>Metai: </h3>
        <table border="1">
            <tr>
                <th bgcolor="#CCCCCC">Nr.</th>
                <th bgcolor="#CCCCCC">Metai</th>
                <th bgcolor="#CCCCCC">Mėnuo</th>
                <th bgcolor="#CCCCCC">Įrašų Kiekis</th>
                <th bgcolor="#CCCCCC">Maksimalus Greitis</th>
                <th bgcolor="#CCCCCC">Vidutinis Greitis</th>
                <th bgcolor="#CCCCCC">Mažiausias Greitis</th>
            </tr>
            <?php while($row = $result->fetch_assoc()) :    // output data of each row?>
                <tr>
                    <td align="center"><?php echo $n++; ?></td>
                    <td align="center"><?php echo $row['metai']; ?></td>
                    <td align="center"><?php echo $row['menuo']; ?></td>
                    <td align="center"><?php echo $row['kiekis']; ?></td>
                    <td align="center"><?php echo $row['maks_greitis']; ?></td>  
                    <td align="center"><?php echo $row['vid_greitis']; ?></td> 
                    <td align="center"><?php echo $row['maz_greitis']; ?></td>                   
                </tr>  
            <?php endwhile; ?>     
        </table>
    <?php else: 
      echo "Nėra duomenų.";
    endif;
}
?>
</body>
</html>