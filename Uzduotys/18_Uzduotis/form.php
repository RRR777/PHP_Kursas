<!DOCTYPE html>
<html>
    <head>
        <title>18 Uzduotis</title>
        <meta charset="UTF-8">
    </head>
<body>
<!-- Duomenų įvedimo Forma -->
<?php function form1($conn, $values){ ?>
<h1>Įveskite duomenis:</h1>
<form action="" method="post">               
    Data: <br>
    <input type="text" name="date" value = "<?php if (isset($_GET['id'])): echo $values['date']; endif; ?>"><br> 
    Automobilio numeris: <br>
    <input type="text" name="number" value = "<?php if (isset($_GET['id'])): echo $values['number']; endif;  ?>"><br>
    Nuvažiuotas atstumas: <br>
    <input type="text" name="distance" value = "<?php if (isset($_GET['id'])): echo $values['distance']; endif;  ?>"><br>
    Kelionės trukmė: <br>
    <input type="text" name="time" value = "<?php if (isset($_GET['id'])): echo $values['time']; endif;  ?>"><br><br>
    Vairuotojas: 
    <?php
        $sql="SELECT driverId, name FROM drivers";
        $result = $conn->query($sql);
        if($result->num_rows > 0): ?>
            <select name="select1"> 
            <option value ="0">Pasirinkite vairuotoją</option>        
            <?php while($rs = $result->fetch_assoc()): ?>
                <option value="<?php if (isset($_GET['id'])): echo $rs['driverId'];  endif;?>" 
                <?php if (isset($_GET['id']) && $rs['driverId'] == $values['driverId']) { echo "selected";}?>
                ><?php echo $rs['name'] ?></option>
            <?php endwhile ?>
            </select>
        <?php endif ?><br>
    <input type="hidden" name="id" value="<?php if (isset($_GET['id'])): echo $values['id']; endif;  ?>"><br>
    <input type="submit" name ="send" value="Patvirtinti"><br><br>
</form>
<?php } ?>

<!-- Meniu  -->

<?php function form2(){ ?>

<form action="" method="post">               
    <button type="submit"name="home" >Pradžia</button>
    <button type="submit"name="auto" >Automobiliai</button>
    <button type="submit"name="year" >Metai</button>
    <button type="submit"name="month" >Mėnuo</button>
</form>

<?php } ?>
</body>
</html>