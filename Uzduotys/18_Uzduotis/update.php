<?php
function update($conn, $values){
    $stmt = $conn->prepare("UPDATE radars SET date = ?, number = ?, distance = ?, time = ?, driverId = ? WHERE id = ?");
    
    $id = mysqli_real_escape_string($conn,$_REQUEST['id']);
    $date = mysqli_real_escape_string($conn, $_REQUEST['date']);
    $number = mysqli_real_escape_string($conn,  $_REQUEST['number']);
    $distance = mysqli_real_escape_string($conn, $_REQUEST['distance']);
    $time = mysqli_real_escape_string($conn, $_REQUEST['time']);
    $driverId = mysqli_real_escape_string($conn, $_REQUEST['select1']);

    $stmt->bind_param("ssddii", $date, $number, $distance, $time, $driverId, $id);
    $stmt->execute(); 
}
?>