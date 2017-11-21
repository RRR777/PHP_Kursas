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

/* $zmogus1 = new Zmogus('Rasa', 'Jurkute');
$zmogus2 = new Zmogus('Greta', 'Tarasovaite');
$zmogus3 = new Zmogus('Vytas', 'Subacius');

$zmones = [$zmogus1, $zmogus2, $zmogus3];

arba
 */
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
    <br><br>
    <?php 
?>