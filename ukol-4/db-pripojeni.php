<?php

const SERVERNAME = "localhost";
const USERNAME = "root";
const PASSWORD = "";
const DBNAME = "epo-zbozi";

try {
    $conn = new PDO("mysql: host=".SERVERNAME."; dbname=".DBNAME, USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo ("Connected successfully<br>");

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function test_vstup_text($text)
{
    $text = trim($text);
    $text = stripslashes($text);
    $text = htmlspecialchars($text);
    return $text;
}

function test_vstup_cislo($cislo)
{
    $cislo = trim($cislo);
    $cislo = stripslashes($cislo);
    $cislo = htmlspecialchars($cislo);
    $cislo = intval($cislo);
    return $cislo;
}

?>