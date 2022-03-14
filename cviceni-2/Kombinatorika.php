<?php

/**
 * Funkce pocita faktorial cisla n
 * @param int $n Predane cislo, ze ktereho bude pocitan faktorial
 * @return float|int Vraci vypocteny faktorial
 */
function faktorial($n = 1) {
    if (spatneCislo($n)) {
        //echo "Zadejte spravne cislo.";
        return -1;
    } else {
        if ($n == 0) {
            return 1;
        }
        else {
            return ($n * faktorial($n-1));
        }
    }
}

/**
 * Funkce testuje zda cislo nesplnuje pozadavky pro vypocet faktorialu
 * @param int $n Predane cislo pro test
 * @return bool True pokud nesplnuje, False pokud splnuje
 */
function spatneCislo($n = 0) {
    if ($n < 0) {
        echo "Pro záporné číslo $n není faktoriál definován. ";
        return true;
    } else if (!is_int($n)) {
        echo "Pro reálné číslé $n není faktoriál definován. ";
        return true;
    } else {
        return false;
    }
}

/**
 * Funkce pocita kombinacni cislo
 * @param int $n Pocet prvku ze kterych vytvarime kombinace
 * @param int $k Pocet prvku kombinace
 * @return int Vraci kombinacni cislo
 */
function kombinacniCislo($n = 0, $k = 0) {
    $citatel = faktorial($n);
    $jmenovatel = faktorial($k)*faktorial($n-$k);
    if ($citatel > 0 AND $jmenovatel > 0) {
        return (int)($citatel/$jmenovatel);
    } else {
        return -1;
    }
}

/**
 * Funkce vykresluje Pascaluv trojuhelnik
 * @param int $n Predany parametr (exponent pro binomicky rozvoj)
 */
function pascalTrojuhelnik($n = 1) {
    for ($i = 0; $i <= $n; $i++) {
        for ($j = 0; $j <= ($n - $i); $j++) {
            echo "   ";
        }
        for ($j = 0; $j <= $i; $j++) {
            $cislo = kombinacniCislo($i, $j);
            printf('%6d', $cislo);
        }
        echo "<br>";
    }
}

/**
 * Funkce sestavuje binomicky rozvoj (a+b)^n
 * @param int $n Predany koeficient binomickeho rozvoje
 * @return int|string Vraci sestaveny binomicky rozvoj
 */
function binomickyRozvoj ($n = 1) { //vypise rozvoj (a+b)^n pomoci binomické věty
    if ($n <= 0) {
        return -1;
    }

    $rozvoj = "";
    //echo kombinacniCislo(2, 0) ;
    for ($k = 0; $k <= $n; $k++) {
        $exponentA = $n-$k;
        $clenRozvoje = kombinacniCislo($n, $k) . "a<sup>$exponentA</sup>" . "b<sup>$k</sup>";
        if ($k < $n) {
            $clenRozvoje .= " + ";
        }
        //echo $clenRozvoje . "<br>";
        $rozvoj .= $clenRozvoje;
    }
    return $rozvoj;
}