<?php
session_start();

include_once 'knihovna.php';

echo "<a href='uvod.php'>Zpět na úvodní stránku</a>";

echo "<h1>Nezabezpečená stránka</h1>";
if (uzivatelPrihlasen()) {
    echo "Přihlášen uživatel s id = " . $_SESSION['id_uzivatele'];
} else {
    echo "Uživatel nepřihlášen.<br>";
}
echo "<p style='background-color: cadetblue; font-size: larger'>Obsah stránky je dostupný všem!</p>";
