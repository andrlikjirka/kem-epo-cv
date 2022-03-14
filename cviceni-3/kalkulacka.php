<!DOCTYPE html>
<html lang="cs">
<head>
<title>PHP Kalkulačka</title>
</head>
<body>

<?php

$stisknuto = '';
if (isset($_POST['stisknuto'])) {
    $stisknuto = $_POST['stisknuto'];
}

$ulozeno = '';
if (isset($_POST['ulozeno'])) {
    $ulozeno = $_POST['ulozeno'];
}

$zobraz = $ulozeno . $stisknuto;

if ($stisknuto == 'C') {
    $zobraz = '';
} else if ($stisknuto == '=') {
    $zobraz = eval("return $ulozeno;");
}

echo "<form action='' method='POST'>
    
    <table style='zoom:3; background-color: darkgrey; border-radius: 2px; padding: 4px 2px'>
        <tr>
            <td style= 'background-color: gold; border-radius: 2px; padding: 0 4px' colspan='4'>$zobraz</td>
        </tr>
        <tr>
            <td><input type='submit' name='stisknuto' value='7'></td>
            <td><input type='submit' name='stisknuto' value='8'></td>
            <td><input type='submit' name='stisknuto' value='9'></td>
            <td><input type='submit' name='stisknuto' value='*'></td>
        </tr>
        <tr>
            <td><input type='submit' name='stisknuto' value='4'></td>
            <td><input type='submit' name='stisknuto' value='5'></td>
            <td><input type='submit' name='stisknuto' value='6'></td>
            <td><input type='submit' name='stisknuto' value='/'></td>
        </tr>
        <tr>
            <td><input type='submit' name='stisknuto' value='1'></td>
            <td><input type='submit' name='stisknuto' value='2'></td>
            <td><input type='submit' name='stisknuto' value='3'></td>
            <td><input type='submit' name='stisknuto' value='-'></td>
        </tr>
        <tr>
            <td><input type='submit' name='stisknuto' value='0'></td>
            <td><input type='submit' name='stisknuto' value='='></td>
            <td><input type='submit' name='stisknuto' value='C'></td>
            <td><input type='submit' name='stisknuto' value='+'></td>
        </tr>
    </table>
        <input type='hidden' name='ulozeno' value=".$zobraz.">
</form>
</body>
</html>";



//úkol: Kalkulačka se všemi tlačítky jako formulář,resetování vyřešit předáváním v hidden elementu

//Vytvořit DB knih s 10 záznami

//Funkcionality a obsah IS PREZENTACE

