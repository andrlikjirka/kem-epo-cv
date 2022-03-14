<?php
//require ("db-connection.php");
$conn = null;
require_once ("db-connection.php");

$stmt = $conn->prepare("SELECT * FROM kniha");
$stmt->execute();
echo "<br>Knihy:<br>";
while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //echo $result['nazev'] . "<br>";
    echo "- <a href='zobraz.php/?id=". $result['id_kniha'] ."'>". $result['nazev']."</a><br>";
}

