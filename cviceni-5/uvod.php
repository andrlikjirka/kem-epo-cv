<?php
session_start();
include_once 'knihovna.php';

if (isset($_POST['odhlaseni'])) {
    logout();
}

echo "<a href='uvod.php'>Úvodní stránka</a>&nbsp;&nbsp;&nbsp;";
echo "<a href='nezabezpecena-stranka.php'>Nezabezpečená stránka</a>&nbsp;&nbsp;&nbsp;";
echo "<a href='zabezpecena-stranka.php'>Zabezpečená stránka</a><br><br>";

if (uzivatelPrihlasen()) {
    echo "
    <form action='' method='post'>
    <input type='submit' name='odhlaseni' value='Odhlásit'>
    </form> 
    ";
} else {
    echo "<a href='login.php' style='text-decoration: none'><button>Přihlásit</button></a>";
}
echo "<hr>";

echo "<h1>Úvodní stránka</h1>";

if (uzivatelPrihlasen()) {
    echo "Přihlášen uživatel s id = ".$_SESSION['id_uzivatele'];
} else {
    echo "Uživatel nepřihlášen";
}

