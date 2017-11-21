
<!DOCTYPE html>
<html>
  <head>
    <title>Užduotis 8.2</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php 
        echo "<h1>Užduotis 8.2</h1><br>
            Tie patys duomenys tik sudarome 3 asmenų grupes taip kad nebūtų tų pačių lyčių,<br> 
            t.y. kad nebūtų tik vyrai arba tik moterys<br><br>";

    $zmones = [
        ['vardas' => 'Jonas', 'lytis' => 'V'],
        ['vardas' => 'Ona', 'lytis' => 'M'],
        ['vardas' => 'Petras', 'lytis' => 'V'],
        ['vardas' => 'Marytė', 'lytis' => 'M'],
        ['vardas' => 'Eglė', 'lytis' => 'M']
    ];

    ?>
    <h1>Žmonių skaičius: <?php echo count($zmones);?></h1>
    <?php if ($zmones): ?>
      <table>
        <tr>
          <th>Nr.</th><th>Vardas</th><th>Lytis</th>
        </tr>
        <?php foreach($zmones as $k => $v): ?>
          <tr>
            <td><?php echo $k ?></td>
            <td><?php echo $v['vardas'] ?></td>
            <td><?php echo $v['lytis'] ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php else: ?>
      <p>Nėra duomenų</p>
    <?php endif; ?>
    <br><br>
    <?php 
    echo "<b>Galimi porų variantai: </b><br>";
    if ($zmones){
        foreach ($zmones as $vyrai) {
            if ($vyrai['lytis'] == "V"){
                foreach ($zmones as $moterys) {
                    if ($moterys['lytis'] == "M"){
                        for ($i=0; $i<count($zmones); $i++){
                            if ($vyrai['vardas'] != $zmones[$i]['vardas'] && $moterys['vardas'] != $zmones[$i]['vardas']){
                                echo $vyrai['vardas'] ."-" .$moterys['vardas'] ."-" .$zmones[$i]['vardas'] ."<br>";
                            }
                        }
                    }
                }
            }
        }
    } else {
        echo "Nėra duomenų";
    }
    ?>

  </body>
</html>
