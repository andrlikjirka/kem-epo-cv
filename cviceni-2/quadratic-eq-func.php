<?php

function quadraticEquation($a = 0, $b = 0, $c = 0)
{
    $diskriminant = pow($b, 2) - 4*$a*$c;
    //echo $diskriminant;
    $out = array();
    if ($diskriminant > 0) {
        $out = array();
        $out['x1'] = (-$b + sqrt($diskriminant))/(2*$a);
        $out['x2'] = (-$b - sqrt($diskriminant))/(2*$a);
        return $out;
    } else if ($diskriminant == 0) {
        $out['x'] = (-$b)/(2*$a);
        return $out;
    } else {
        return $out;
    }
}

$a = 2;
$b = 5;
$c = 1;
$vysledek = quadraticEquation($a, $b, $c);
//print_r($vysledek);

if (count($vysledek) == 2) {
    echo "Kvadratická rovnice má 2 řešení: x1 = ". $vysledek['x1'] .", x2 = ". $vysledek['x2'];
} else if (count($vysledek) == 1) {
    echo "Kvadratická rovnice má 1 řešení: x =". $vysledek['x'];
} else {
    echo "Kvadratická rovnice nemá řešení.";
}
