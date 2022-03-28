<?php

$conn = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once ("db-connection.php");

    echo "<a href='/kem-epo-cv/cviceni-4/knihy.php'>Zpět na knihy</a><br><br>";

    $stmt = $conn->prepare("SELECT * FROM knihy WHERE id_kniha=$id");
    $stmt->execute();

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //echo $result['nazev'] . "<br>";
        $id = $result['id_kniha'];
        $nazev = $result['nazev'];
        $autor = $result['autor'];
        $rok = $result['rok_vydani'];

        echo "id = $id <br>Název knihy = $nazev <br>Autor knihy = $autor <br>Rok vydání=$rok";
    }
}
