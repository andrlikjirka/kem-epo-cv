<?php
$conn = null;
require_once ('db-pripojeni.php');
require_once ('header.php');

if (isset($_POST['nazev']) and isset($_POST['cena']) AND isset($_POST['pocet'])) {
    $nazev = test_vstup_text($_POST['nazev']);
    $cena = test_vstup_cislo($_POST['cena']);
    $pocet = test_vstup_cislo($_POST['pocet']);

    $stmt = $conn->prepare("INSERT INTO `epo-zbozi`.zbozi (nazev, cena, pocet_ks) VALUES (:nazev, :cena, :pocet_ks)");
    $stmt->bindValue(":nazev", $nazev);
    $stmt->bindValue(":cena", $cena);
    $stmt->bindValue(":pocet_ks", $pocet);
    $result = $stmt->execute();
    if ($result == true) {
        echo "<p>Přidáno nové zboží</p>";
    } else {
        echo "Chyba při vkládání";
    }

}

echo "
<h2>Přidat nové zboží</h2>
<form method='post' action=''>
    <label for='nazev'>Název zboží:</label><br>
    <input type='text' id='nazev' name='nazev' required><br>
    
    <label for='cena'>Cena zboží:</label><br>
    <input type='number' id='cena' name='cena' min='0' step='1' required><br>
    
    <label for='pocet'>Počet kusů:</label><br>
    <input type='number' id='pocet' name='pocet' step='1' min='0' required><br><br>
    
    <input type='submit' value='Přidat nové zboží'>
    
</form>
";

?>

