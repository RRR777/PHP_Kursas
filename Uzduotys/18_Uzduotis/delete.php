<?php
function delete($conn){
    $id = $_POST['delete'];

    $sql = "DELETE FROM radars WHERE id = ?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();    
}
?>