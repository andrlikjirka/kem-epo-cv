<?php

$a = 3;
$b = 2;
$c = 4;

echo "Počítaná kvadratická rovnice: ";

$diskriminant = pow($b, 2) - 4*$a*$c;

if ($diskriminant > 0) {
    $x1 = (-$b + sqrt($diskriminant))/(2*$a);
    $x2 = (-$b - sqrt($diskriminant))/(2*$a);
    echo "Kvadratická rovnice má 2 řešení: x1 = $x1, x2 = $x2";
} else if ($diskriminant == 0) {
    $x = (-$b)/(2*$a);
    echo "Kvadratická rovnice má 1 řešení: x = $x";
} else {
    echo "Kvadratická rovnice nemá řešení.";
}

?>

