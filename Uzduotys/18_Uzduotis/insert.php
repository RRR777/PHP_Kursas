<?php
function insert($conn){
    $stmt = $conn->prepare("INSERT INTO radars (date, number, distance, time, driverId) VALUES(?, ?, ?, ?, ?)");
    
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $number = mysqli_real_escape_string($conn,  $_POST['number']);
    $distance = mysqli_real_escape_string($conn, $_POST['distance']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $driverId = mysqli_real_escape_string($conn, $_POST['select1']);

    $stmt->bind_param("ssddi", $date, $number, $distance, $time, $driverId);
    $stmt->execute();
}
?>