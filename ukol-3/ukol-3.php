<form action="" method="post">
    <label for="bud-hodnota">Pt: </label>
    <input id="bud-hodnota" name="bud-hodnota" type="number" min="0" step="0.0001" required> <br><br>
    <label for="duchod">R:&nbsp; </label>
    <input id="duchod" name="duchod" type="number" min="0" required> <br><br>
    <label for="obdobi">n:&nbsp;&nbsp; </label>
    <input id="obdobi" name="obdobi" type="number" min="1" step="1" required> <br><br>
    <label for="frekvence">m:&nbsp; </label>
    <input id="frekvence" name="frekvence" type="number" min="1" step="1" required> <br><br>

    <input type="radio" id="predlhutny" name="typ-duchod" value="predlhutny">
    <label for="predlhutny">Předlhůtný</label>
    <input type="radio" id="polhutny" name="typ-duchod" value="polhutny">
    <label for="polhutny">Polhůtný</label><br><br>

    <input type="submit">
</form>


<?php

/*
 * Napište a odlaďte php skript, který vypíše na základě zadané budoucí hodnoty, zadané platby a zadaného počtu období
 * sazbu důchodu. Typ důchodu (polhůtný, předlhůtný), frekvence a všechny vstupní údaje jsou zadány ve formuláři
 */

if (isset($_POST['bud-hodnota']) AND isset($_POST['duchod']) AND isset($_POST['obdobi']) AND isset($_POST['frekvence']) AND isset($_POST['typ-duchod'])) {
    $bud_hodnota = test_vstup($_POST['bud-hodnota']);
    $duchod = test_vstup($_POST['duchod']);
    $obdobi = test_vstup($_POST['obdobi']);
    $frekvence = test_vstup($_POST['frekvence']);
    $typ_duchodu = $_POST['typ-duchod'];

    if ($bud_hodnota >= 0 AND $duchod >= 0 AND $obdobi >= 1 AND $frekvence >= 1) {
        echo "<pre>";
        echo "Budoucí hodnota: Pt = $bud_hodnota<br>";
        echo "Důchod: R = $duchod<br>";
        echo "Počet období: n = $obdobi<br>";
        echo "Frekvence úročení: m = $frekvence<br>";

        $sazby = odhadSazeb($bud_hodnota, $duchod, $obdobi, $frekvence, $typ_duchodu);
        echo "<br>Odhady sazeb a odpovídající budoucí hodnoty: <br>";
        print_r($sazby);
        echo "<br>";
        echo "<br>Úroková míra i(m): " . linearniInterpolace($sazby, $bud_hodnota) . " %";
        echo "</pre>";
    }
}

function test_vstup($cislo)
{
    $cislo = trim($cislo);
    $cislo = stripslashes($cislo);
    $cislo = htmlspecialchars($cislo);
    $cislo = doubleval($cislo);
    return $cislo;
}

function polhutnyOdhadSazeb($bud_hodnota, $duchod, $n, $m)
{
    $odhady = array();
    for ($i = 0.01; $i < 1; $i += 0.01) {
        if ($i/$m != 0) {
            $odhad = $duchod * ((pow((1+$i/$m),($n*$m))-1)/($i/$m));
            $odhad = abs($odhad - $bud_hodnota);
            $odhady["$i"] = "$odhad";
            //echo "$i: $odhad <br>";
        } else {
            echo 'Dělení nulou ve vzorci pro výpočet budoucí hodnoty!';
        }
    }
    return $odhady;
}

function predlhutnyOdhadSazeb($bud_hodnota, $duchod, $n, $m)
{
    $odhady = array();
    for ($i = 0.01; $i < 1; $i += 0.01) {
        if ($i/$m != 0) {
            $odhad = $duchod * ((pow((1+$i/$m),($n*$m))-1)/($i/$m)) * (1+$i/$m);
            $odhad = abs($odhad - $bud_hodnota);
            $odhady["$i"] = "$odhad";
        } else {
            echo 'Dělení nulou ve vzorci pro výpočet budoucí hodnoty!';
        }
    }
    return $odhady;
}

function odhadSazeb($bud_hodnota, $duchod, $obdobi, $frekvence, $typ_duchodu)
{
    switch ($typ_duchodu) {
        case 'predlhutny':
            $odhady = predlhutnyOdhadSazeb($bud_hodnota, $duchod, $obdobi, $frekvence);
            break;
        case 'polhutny':
            $odhady = polhutnyOdhadSazeb($bud_hodnota, $duchod, $obdobi, $frekvence);
            break;
        default:
            echo 'Neznámá operace!';
            break;
    }

    asort($odhady);
    $sazba1 = array_keys($odhady)[0];
    $duchod1 = spoctibudouciHodnotu($duchod, $sazba1, $obdobi, $frekvence, $typ_duchodu);
    $sazba2 = array_keys($odhady)[1];
    $duchod2 = spoctibudouciHodnotu($duchod, $sazba2, $obdobi, $frekvence, $typ_duchodu);

    $sazby = ["$sazba1" => "$duchod1",
              "$sazba2" => "$duchod2"];
    asort($sazby);
    return $sazby;
}

function spoctibudouciHodnotu($duchod, $i, $n, $m, $typ_duchodu)
{
    $bud_hodnota = 0;
    if ($i/$m != 0) {
        switch ($typ_duchodu) {
            case 'predlhutny':
                $bud_hodnota = $duchod * ((pow((1+$i/$m),($n*$m))-1)/($i/$m)) * (1 + $i/$m);
                break;
            case 'polhutny':
                $bud_hodnota = $duchod * ((pow((1+$i/$m),($n*$m))-1)/($i/$m));
                break;
            default:
                echo 'Neznámá operace!';
                break;
        }
    } else {
        echo 'Dělení nulou ve vzorci pro výpočet budoucí hodnoty!';
    }

    return $bud_hodnota;
}

function linearniInterpolace($sazby, $bud_hodnota)
{
    $sazba = 0;

    $horniSazba = array_keys($sazby)[1];

    $dolniPt = array_shift($sazby);
    $horniPt = array_shift($sazby);
    if ($dolniPt != $horniPt) {
        $x = (($horniPt - $bud_hodnota)/($horniPt - $dolniPt))*0.01;
        $sazba = ($horniSazba - $x) * 100;
    } else {
        echo 'Dělení nulou při výpočtu úrokové míry metodou lineární interpolace!';
    }

    return $sazba;
}
