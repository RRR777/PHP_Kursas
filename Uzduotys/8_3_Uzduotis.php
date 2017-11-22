<!DOCTYPE html>
<html>
  <head>
    <title>Užduotis 8.3</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php 
        echo "<h1>Užduotis 8.3</h1><br>
            Turime mokinių sąrašą su dalykais ir gautais pažymiais už tuos dalykus. <br>
            Suskaičiuokite kuris geriausiai mokosi pagal visų dalykų pažymių vidurkius. <br>
            Dalyko pažymio nustatymui reikės panaudoti funkciją round()<br><br>";

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
      <table>
        <tr>
            <th>Vardas</th><th>Pažymiai</th>
        </tr>
        <?php foreach($mokiniai as $k => $mokinys): ?>           
            <tr>
                <td><?php echo $mokinys['vardas'] ?></td>
                    <?php foreach ($mokinys['pazymiai'] as $dal => $pazymys): ?>
                    <td><?php echo $dal ?></td>                        
                        <?php for ($i=0; $i<count($pazymys); $i++): ?>                          
                            <td><?php echo $mokinys['pazymiai'][$dal][$i] .", " ?></td>
                        <?php endfor; ?>
                    <?php endforeach; ?>
            </tr>           
        <?php endforeach; ?>
      </table>
    <?php else: ?>
      <p>Nėra duomenų</p>
    <?php endif; ?>
    <br><br>
    <?php 

    echo "<b>Geriausiai mokosi: </b><br>";

        $ger = 0;
        $vidSuma = vidurkiuSuma($mokiniai);
        $n = count($vidSuma);
        for ($i=0; $i<$n; $i++){
            if ($ger < $vidSuma[$i]['vidurkis']){
                $ger = $vidSuma[$i]['vidurkis']; 
                $vardas = $vidSuma[$i]['vardas'];
        }
    }
        echo "<br><b>Geriausia vidurkių suma: </b>" .$vardas ." - ".$ger;
          
   
   

    function vidurkiuSuma($mokiniai){
        foreach ($mokiniai as $key => $d){
            $vidSuma = 0;
            foreach ($d['pazymiai'] as $k=> $value){
                $vidSuma += vidurkis ($value);
            }
            $maxVidurkis[] = ['vardas'=>$d['vardas'], 'vidurkis'=>$vidSuma];
            echo $d['vardas'] ." - Vidurkių suma yra: " .$vidSuma ."<br>";
        }
        return $maxVidurkis;
    }

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
