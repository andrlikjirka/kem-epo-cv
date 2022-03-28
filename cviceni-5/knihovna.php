<?php
$conn = null;

include_once('db-pripojeni.php');

function zkontroluj_prihlaseni()
{
    //session_start();
    if (($_SESSION['id_uzivatele'] == "") || (!isset($_SESSION['id_uzivatele']))) {
        setcookie("volajici_skript", $_SERVER['SCRIPT_NAME'], time() + 3600);
        header("Location: http://localhost/kem-epo-cv/cviceni-5/login.php");
    }
    return true;
}

function login($form_user, $form_password)
{
    //session_start();
    if ($id_uzivatele = auth_uzivatele($form_user, $form_password)) {
        $_SESSION['id_uzivatele'] = $id_uzivatele;
        return true;
    } else {
        return false;
    }
}

function auth_uzivatele($user, $password)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM uzivatel WHERE jmeno='$user' AND heslo='$password'");
    $stmt->execute();
    if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        return $result['id_uzivatele'];
    } else {
        return false;
    }
}

function logout()
{
    unset($_SESSION['id_uzivatele']);
    session_destroy();
    setcookie("volajici_skript", "", time() - 3600 * 30);
    unset($_COOKIE["volajici_skript"]); //smaze PHP kopii cookie (bez tohohle porad funkce isset($_COOKIE['volajici_skript'] vraci true)
}

function uzivatelPrihlasen()
{
    if (isset($_SESSION['id_uzivatele'])) {
        return true;
    } else {
        return false;
    }
}

