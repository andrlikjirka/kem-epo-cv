<?php
$conn = null;
require_once ('db-pripojeni.php');
require_once ('header.php');

echo "<h2>Seznam zboží</h2>";
$stmt = $conn->prepare("SELECT * FROM zbozi");
$stmt->execute();
echo "<ul>";
while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<li><a href='/kem-epo-cv/ukol-4/detail.php/?id=".$result['id']."'>".$result['nazev']."</a></li>";
}
echo "</ul>";
?>