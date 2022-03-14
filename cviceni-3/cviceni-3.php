<form action="" method="post">
    <label for="cislo">Číslo: </label>
    <input id="cislo" name="cislo" type="number" min="0" step="1" required > <br>
    <label for="metoda">Co chcete udělat? </label>
    <select id="metoda" name="metoda">
        <option value="faktorial">Faktoriál</option>
        <option value="pascal-troj">Pascalův trojúhelník</option>
        <option value="binom-rozvoj">Binomický rozvoj</option>
        <option value="permutace">Permutace</option>
    </select>

    <input type="submit">
</form>

<?php
require_once ('./Kombinatorika.php');

if (isset($_POST['cislo']) AND isset($_POST['metoda'])) {
    $cislo = test_vstup($_POST['cislo']);
    switch ($_POST['metoda']) {
        case 'faktorial':
            echo faktorial($cislo);
            break;
        case 'pascal-troj':
            echo "<pre>";
            pascalTrojuhelnik($cislo);
            echo "</pre>";
            break;
        case 'binom-rozvoj':
            echo binomickyRozvoj($cislo);
            break;
        case 'permutace':
            $pole = vytvorPoleHodnot($cislo);
            permutace($pole);
            break;
        default:
            echo "Neznámá operace.";
            break;
    }

}

function test_vstup($cislo)
{
    $cislo = trim($cislo);
    $cislo = stripslashes($cislo);
    $cislo = htmlspecialchars($cislo);
    $cislo = intval($cislo);
    return $cislo;
}

