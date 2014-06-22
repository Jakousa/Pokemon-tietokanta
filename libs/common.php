<?php

session_start();

function naytaNakyma($sivu, $data = array()) {
    $data = (object) $data;
    require 'views/template.php';
    exit();
}

function isLogged() {
    if (isset($_SESSION['kirjautunut'])) {
        return true;
    }
    return false;
}

function teeAlkeellinenPalkki($number) {
    $x = 1;
    while ($x <= $number) {
        echo "/";
        $x++;
        $x++;
    }
}