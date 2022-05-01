<?php
require_once ("Ucet.php");

$mujUcet = new Ucet();
echo "Vytvořen nový bankovní účet."."<br>";
echo "Zůstatek: ".$mujUcet->getZustatek()."<br>";
echo "-------"."<br>";
$vklad1 = 1000;
echo "Vklad: $vklad1 Kč"."<br>";
$mujUcet->vklad($vklad1);
echo "Zůstatek: ".$mujUcet->getZustatek()."<br>";
echo "-------"."<br>";
$vklad2 = 3000;
echo "Vklad: $vklad2 Kč"."<br>";
$mujUcet->vklad($vklad2);
echo "Zůstatek: ".$mujUcet->getZustatek()."<br>";
echo "-------"."<br>";
$vyber1 = 2000;
echo "Výběr: $vyber1 Kč"."<br>";
$mujUcet->vyber($vyber1);
echo "Zůstatek: ".$mujUcet->getZustatek()."<br>";



