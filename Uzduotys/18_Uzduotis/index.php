<!DOCTYPE html>
<html>
    <head>
        <title>18 Uzduotis</title>
        <meta charset="UTF-8">
    </head>
<body>
<?php

require_once 'connection.php';
require_once 'form.php';
require_once 'tableName.php';
require_once 'insert.php';
require_once 'update.php';
require_once 'delete.php';

$conn = connect();

$results_per_page = 10;                    
$values = [];

//Puslapiavimas
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$start_from = ($page-1) * $results_per_page;

form2();

# Kai paspaudžiame "Automobiliai"
if (isset($_POST['auto']) ){
    $n = 0;
    $auto = "SELECT DISTINCT 
                `number`, COUNT(*) AS `kiekis`, 
                ROUND(MAX(`distance`/`time`*3.6),2) AS `greitis` 
                FROM `radars` 
                GROUP BY `number` 
                ORDER By `greitis`";
    table2($conn, $auto);
    # Kai paspaudžiame "Metai"
    }else if (isset($_POST['year']) ){
        $year = "SELECT DISTINCT 
                YEAR(date) AS `metai`, 
                COUNT(*) AS `kiekis`, 
                ROUND(MAX(`distance`/`time`*3.6)) AS `maks_greitis`,
                ROUND(AVG(`distance`/`time`*3.6)) AS `vid_greitis`, 
                ROUND(MIN(`distance`/`time`*3.6)) AS `maz_greitis` 
                FROM `radars` 
                GROUP BY `metai` 
                ORDER By `metai`"; 
 
        table3($conn, $year);
        # Kai paspaudžiame "Mėnuo"
        } else if (isset($_POST['month']) ){
            $month = "SELECT 
                        YEAR(date) AS `metai`, 
                        MONTH(date) AS `menuo`, 
                        COUNT(*) AS `kiekis`, 
                        ROUND(MAX(`distance`/`time`*3.6)) AS `maks_greitis`, 
                        ROUND(AVG(`distance`/`time`*3.6)) AS `vid_greitis`,
                        ROUND(MIN(`distance`/`time`*3.6)) AS `maz_greitis` 
                        FROM `radars` 
                        GROUP BY `metai`, `menuo` 
                        ORDER By `metai`";
            table4($conn, $month);
            } else if (isset($_POST['home']) ){
                header("Location: " . $_SERVER['PHP_SELF']);        /* Redirect browser */
                exit();  
                }else  {
// Ar gauname id per GET komandą
                    if (array_key_exists('id', $_GET) && $_GET['id'] > 0) {
                        $sql = "SELECT * FROM radars WHERE id = " . $_GET['id'];  
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $values = $result->fetch_assoc();
                        } 
                    }

// Į formą įvestų naujų duomenų išsaugojimas Duomenų bazėje
                    if ((isset($_POST['id'])) && ($_POST['id']) === ""){
                        $insert = insert($conn); 
                    
                        }else if ((isset($_POST['id'])) && $_POST['id'] > 0 ){
                            $update = update($conn, $values); 
                    }
 
                    if ((isset($_POST['delete'])) && $_POST['delete'] > 0 ){
                        $delete = delete($conn);
                    } 

                    form1($conn, $values);
                    table1($conn, $start_from, $results_per_page );

                    $sql = "SELECT COUNT(`id`) AS `total` FROM radars";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
                    echo "Puslapiai: ";  
                    for ($i=1; $i<=$total_pages; $i++) {                    // print links for all pages
                                echo "<a href='?page=".$i."'";
                                if ($i==$page)  echo " class='curPage'";
                                    echo ">" .$i ."</a> ... "; 
                    }; 
                }
$conn->close(); 
?>
</body>
</html>

