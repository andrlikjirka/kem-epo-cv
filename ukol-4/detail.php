<?php
$conn = null;
require_once ('db-pripojeni.php');
require_once ('header.php');

if (isset($_GET['id'])) {
    $id_zbozi = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM `epo-zbozi`.zbozi WHERE id=$id_zbozi");
    $stmt->execute();

    echo "<h2>Detail zboží {ID = $id_zbozi}</h2>";

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = $result['id'];
        $nazev = $result['nazev'];
        $cena = $result['cena'];
        $pocet = $result['pocet_ks'];

        echo "Název zboží = $nazev<br>";
        echo "Cena = $cena Kč<br>";
        echo "Počet = $pocet ks<br>";
    }

    echo "<br><a href='/kem-epo-cv/ukol-4/upravit.php/?id=".$id_zbozi."' style='text-decoration: none'><button>Upravit</button></a>";
}
?>