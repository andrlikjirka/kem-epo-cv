<?php
include('Kombinatorika.php');

//FAKTORIAL
$n = 10;
$faktorial = faktorial($n);
echo " Faktoriál $n! = $faktorial <br><br>";

//POCET KOMBINACI
$n = 10;
$k = 2;
$kombinace = kombinacniCislo($n, $k);
echo "n = $n, k = $k:  Počet kombinací = $kombinace <br><br>";

//BINOMICKY ROZVOJ
$n = 4;
$binomRozvoj = binomickyRozvoj($n);
echo "n = $n: Binomický rozvoj = $binomRozvoj <br><br>";

//PASCALUV TROJUHELNIK
$n = 15;
echo "Pascalův trojúhelník pro n = $n:";
echo "<pre>";
pascalTrojuhelnik($n);
echo "</pre>";