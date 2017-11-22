<!DOCTYPE html>
<html>
  <head>
    <title>Užduotis 9.1</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php 
        echo "<h1>Užduotis 9.1</h1><br>
            Turime mokinių sąrašą su dalykais ir gautais pažymiais už tuos dalykus. <br>
            Suskaičiuokite kuris geriausiai mokosi pagal visų dalykų pažymių vidurkius. <br>
            Dalyko pažymio nustatymui reikės panaudoti funkciją round()<br>
            
            Išveskite mokinių sąrašą į html lentelę taip (pagal stulpelius): <br>
            1) mokinio vardas <br>
            2) visi lietuvių kalbos pažymiai <br>
            3) lietuvių kalbos vidurkis <br>
            4) visi anglų kalbos pažymiai<br>
            5) anglų kalbos vidurkis <br>
            6) visi matematikos pažymiai<br>
            7) matematikos vidurkis <br>
            8) bendras vidurkis;<br><br>";

        $mokiniai = [ 
                ['vardas' => 'Jonas', 'pazymiai' => ['lietuviu' => [4, 8, 6, 7], 'anglu' => [6, 7, 8], 'matematika' => [3, 5, 4]]], 
                ['vardas' => 'Ona', 'pazymiai' => ['lietuviu' => [10, 9, 10], 'anglu' => [9, 8, 10], 'matematika' => [10, 10, 9, 9]]],             
                ['vardas' => 'Rasa', 'pazymiai' => ['lietuviu' => [10, 9, 8], 'anglu' => [9, 8, 6], 'matematika' => [6, 4, 4, 9]]],             
                ['vardas' => 'Laurynas', 'pazymiai' => ['lietuviu' => [8, 9, 8], 'anglu' => [9, 7, 6], 'matematika' => [6, 5, 8, 9]]],                   
                ['vardas' => 'Milda', 'pazymiai' => ['lietuviu' => [10, 10, 8], 'anglu' => [6, 8, 6], 'matematika' => [6, 9, 10, 8]]],                   
                ['vardas' => 'Gabija', 'pazymiai' => ['lietuviu' => [7, 8, 8], 'anglu' => [9, 10, 6], 'matematika' => [6, 10, 7, 10]]]                  
            ];

    ?>
    <h1>Pažymiai: </h1>
    <?php if ($mokiniai): ?>
      <table border='1'>
        <tr>
            <th rowspan='2'>Vardas</th><th colspan='7'>Pažymiai</th>
        </tr>
        <tr>
            <th>Lietuvių</th><th>Lietuvių vidurkis</th>
            <th>Anglų</th><th>Anglų vidurkis</th>
            <th>Matematika</th><th>Matematikos vidurkis</th>
            <th>Bendras vidurkis</th>
        </tr>
        <?php foreach($mokiniai as $k => $mokinys): ?>           
            <tr><?php $bVid=0;?>
                <td><?php echo $mokinys['vardas'] ?></td>
                    <?php foreach ($mokinys['pazymiai'] as $dal => $pazymys): ?>
                         <td><?php echo implode(", ", $mokinys['pazymiai'][$dal]) ?></td>  
                         <td align='center'><?php echo vidurkis($pazymys) ?></td> 
                         <?php  $bVid += vidurkis($pazymys) ?>                                             
                    <?php endforeach; ?>
                <td align='center'><?php echo round($bVid/count($mokinys['pazymiai'])) ?></td>
            </tr>           
        <?php endforeach; ?>       
      </table>
    <?php else: ?>
      <p>Nėra duomenų</p>
    <?php endif; ?>
    <br><br>
    <?php 
    
    function vidurkis($dalykas){
        $sum = 0;
        foreach ($dalykas as $ivertinimas){
            $sum += $ivertinimas;
        }
        $vid = round($sum/count($dalykas));
        return $vid;
    }
    ?>
  </body>
</html>
