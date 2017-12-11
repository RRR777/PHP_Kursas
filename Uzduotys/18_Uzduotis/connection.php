<?php 
function connect(){

    $servername = 'localhost';
    $dbname = 'Auto';
    $username = 'Auto';
    $password = 'LabaiSlaptas123';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->query("SET NAMES 'utf8'");

    // Check connection
    if ($conn->connect_error) {
        die('Nepavyko prisjungti: ' . $conn->connect_error);
    }
    return $conn;
}
?>
