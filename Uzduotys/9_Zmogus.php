<!DOCTYPE html>
<html>
    <head>
        <title>9 Uzduotis Zmogus</title>
        <meta charset="UTF-8">
    </head>
<body>
<?php 
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

$zmones = [
    new Zmogus('Rasa', 'Jurkute'),
    new Zmogus('Greta', 'Tarasovaite'),
    new Zmogus('Vytas', 'Subacius')
]
?>
<h1>Žmonių sąraše yra: <?php echo count($zmones);?></h1>
    <?php if ($zmones): ?>
      <table>
        <tr>
          <th>Nr.</th><th>Vardas</th><th>Pavardė</th>
        </tr>
        <?php foreach($zmones as $k => $zmogus): ?>
          <tr>
            <td><?php echo $k ?></td>
            <td><?php echo $zmogus->vardas ?></td>
            <td><?php echo $zmogus->pavarde ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php else: ?>
      <p>Nėra duomenų</p>
    <?php endif; ?>
</body>
</html>
