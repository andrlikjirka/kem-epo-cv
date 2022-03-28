<?php
session_start();
include_once 'knihovna.php';

zkontroluj_prihlaseni();

echo "<a href='uvod.php'>Zpět na úvodní stránku</a>";
echo "<h1>Zabezpečená stránka</h1>";
echo "Přihlášen uživatel s id = " . $_SESSION['id_uzivatele'];

echo "<p style='background-color: cadetblue; font-size: larger'>Obsah stránky je dostupný jen přihlášeným uživatelům!</p>";
