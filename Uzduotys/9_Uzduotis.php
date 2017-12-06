<!DOCTYPE html>
<html>
    <head>
        <title>9 Uzduotis</title>
        <meta charset="UTF-8">
    </head>
<body> 
<?php 
 /* Tarkime turime masyvą objektų Mokinys. Reikia atspausdinti mokinių vardus 
 ir pavardes su jų trimestro vidurkiu į html lentelę vidurkio mažėjimo tvarka.
 // masyvas mokinio trimestro pažymių
 */
class Zmogus{
    public $vardas;
    public $pavarde;

    function __construct($vardas, $pavarde) {
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
}
    function pilnasVardas(){
        return $this->vardas ." " .$this->pavarde;
    }
}
class Mokinys extends Zmogus{
    public $trimestras;    // masyvas mokinio trimestro pažymių
    
    function __construct($vardas, $pavarde, $trimestras) {
        parent::__construct($vardas, $pavarde);
        $this->trimestras = $trimestras;
    }

    function vidurkis(){
      $suma = 0;
      foreach ($this->trimestras as $pazymiai){
        $suma += $pazymiai;
      }
      $vidurkis = round($suma / count($this->trimestras));
      return $vidurkis;
    }
  }

$mokiniai = [
    new Mokinys('Rasa', 'Jurkute', [8,6,10]),
    new Mokinys('Greta', 'Tarasovaite', [7,9,5]),
    new Mokinys('Vytas', 'Jovaisa',[10,10,10])
];

?>
<h1>Mokinių sąraše yra: <?php echo count($mokiniai);?></h1>
    <?php if ($mokiniai): ?>
      <table border="1">
        <tr>
          <th>Nr.</th><th>Vardas</th><th>Pavardė</th><th>Pazymiai</th><th>Vidurkis</th>
        </tr>
        <?php foreach($mokiniai as $k => $mokinys): ?>
          <tr>              
            <td><?php echo $k+1 ?></td>                  
            <td><?php echo $mokinys->vardas ?></td>
            <td><?php echo $mokinys->pavarde ?></td>
            <td><?php echo implode(", ", $mokinys->trimestras) ?></td> 
            <td><?php echo $mokinys->vidurkis() ?></td>   
          </tr>        
        <?php endforeach; ?> 
      </table>
    <?php else: ?>
      <p>Nėra duomenų</p>
    <?php endif; ?>
    <br><br>
 </body>
</html>
