<?php
$conn = null;
require_once('db-pripojeni.php');
require_once('header.php');

if (isset($_GET['id'])) {
    $id_zbozi = $_GET['id'];

    // uprava informaci o zbozi
    if (isset($_POST['upravit-nazev']) AND isset($_POST['upravit-cena']) AND isset($_POST['upravit-pocet'])) {
        $nazev = test_vstup_text($_POST['upravit-nazev']);
        $cena = test_vstup_cislo($_POST['upravit-cena']);
        $pocet = test_vstup_cislo($_POST['upravit-pocet']);

        $stmt = $conn->prepare("UPDATE `epo-zbozi`.zbozi SET nazev=:nazev, cena=:cena, pocet_ks=:pocet WHERE id=$id_zbozi");
        $stmt->bindValue(':nazev', $nazev);
        $stmt->bindValue(':cena', $cena);
        $stmt->bindValue(':pocet', $pocet);
        if ($stmt->execute()) {
            echo "Úprava proběhla úspěšně";
        } else {
            echo "Úprava se nezdařila";
        }
    }


    //ziskání akutálních informací o zboží + vypis
    $stmt = $conn->prepare("SELECT * FROM `epo-zbozi`.zbozi WHERE id=$id_zbozi");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<h2>Upravit zboží {ID = $id_zbozi}</h2>

    <form method='post' action=''>
        <label for='nazev'>Název zboží:</label><br>
        <input type='text' id='nazev' name='upravit-nazev' value='".$result['nazev']."' required><br>
        
        <label for='cena'>Cena zboží:</label><br>
        <input type='number' id='cena' name='upravit-cena' value='".$result['cena']."' min='0' step='1' required><br>
        
        <label for='pocet'>Počet kusů:</label><br>
        <input type='number' id='pocet' name='upravit-pocet' value='".$result['pocet_ks']."' step='1' min='0' required><br><br>
        
        <input type='submit' value='Upravit zboží'>
        
    </form>
    ";

}

?>
