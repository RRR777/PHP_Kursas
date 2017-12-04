<!DOCTYPE html>
<html>
    <head>
        <title>14 Uzduotis</title>
        <meta charset="UTF-8">
    </head>
<body>
<?php 


$servername = 'localhost';
$dbname = 'Auto';
$username = 'Auto';
$password = 'LabaiSlaptas123';
$datatable = 'radars';
$results_per_page = 10;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Nepavyko prisjungti: ' . $conn->connect_error);
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start_from = ($page-1) * $results_per_page;

$sql = "SELECT `number`, `distance`/`time`*3.6 as `speed`, `date` FROM radars ORDER BY `speed`, `date` DESC LIMIT $start_from, " .$results_per_page;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
    <table border="1">
        <tr>
            <th bgcolor="#CCCCCC">Numeris</th>
            <th bgcolor="#CCCCCC">Data</th>
            <th bgcolor="#CCCCCC">Greitis, km/h</th>
        </tr>
    
    <?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['number']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo round($row['speed'], 2); ?></td>
        </tr>
        <?php
    }
    echo '</table>';
} else {
    echo 'nėra duomenų';
}
?>
<style>
.curPage {
    font-size: 22px;
    color: blue;
}
</style>

<?php 
$sql = "SELECT COUNT(ID) AS total FROM ".$datatable;
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
echo "Puslapiai: ";  
for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
            echo "<a href='14_Uzduotis.php?page=".$i."'";
            if ($i==$page)  echo " class='curPage'";
            echo ">" .$i ."</a>" . " ... "; 
}; 

$conn->close();

?>
</body>
</html>