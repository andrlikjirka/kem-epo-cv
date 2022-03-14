<?php
require_once ('./Kombinatorika.php');
/*
 * Napište a odlaďte php skript, který vypíše všechny možné permutace z n čísel bez opakování.
 * Číslo n je zadáno jako konstanta v programu.
 */

define('CISLO_N', 5);
$pole = vytvorPoleHodnot(CISLO_N);
//echo implode($pole)."<br>";
//echo "Počet permutací pro n = ".CISLO_N.": ". pocetPermutaci($pole)."<br>";
//permutace($pole);

echo "<pre>";
pascalTrojuhelnik(15);
echo "</pre>";

//echo binomickyRozvoj(10);
