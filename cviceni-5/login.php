<?php
session_start();
include_once ('knihovna.php');

//vypis statusu prihlaseni pri chybne zadanych udajich
if (isset($_GET['status'])) {
    echo "<br><b style='background-color: lightcoral; width: 140px'>$_GET[status]</b><br>";
}

if (isset($_POST['jmeno']) AND isset($_POST['heslo'])) {
    $jmeno = $_POST['jmeno'];
    $heslo = $_POST['heslo'];
    if (!login($jmeno, $heslo)) {
        $status = urlencode("Chybně zadané údaje");
        header("Location: http://localhost/kem-epo-cv/cviceni-5/login.php?status=$status");
    } else {
        if (isset($_COOKIE['volajici_skript'])) {
            header("Location: http://localhost/".$_COOKIE['volajici_skript']);
        } else {
            header("Location: http://localhost/kem-epo-cv/cviceni-5/uvod.php");
        }
    }
}

if (!uzivatelPrihlasen()) {
    echo "
<h1>Přihlášení</h1>
<form action='' method='post'>
  <label for='jmeno'>Jméno: </label><br>
  <input type='text' id='jmeno' name='jmeno' required><br><br>
  <label for='heslo'>Heslo: </label><br>
  <input type='password' id='heslo' name='heslo' required><br><br>
  <input type='submit' value='Přihlásit'>
</form> 

";
} else {
    echo "Přihlášený uživatel se nemůže znovu přihlásit";
}


