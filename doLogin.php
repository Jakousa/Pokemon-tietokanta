<?php

require 'libs/common.php';
require 'libs/models/kayttaja.php';

//Tarkistetaan että vaaditut kentät on täytetty:
if (empty($_POST["username"])) {
    naytaNakyma("login", array(
        'virhe' => "Kirjautuminen epäonnistui! Et antanut käyttäjätunnusta.",
    ));
}
$kayttaja = $_POST["username"];

if (empty($_POST["password"])) {
    naytaNakyma("login", array(
        'kayttaja' => $kayttaja,
        'virhe' => "Kirjautuminen epäonnistui! Et antanut salasanaa.",
    ));
}
$salasana = $_POST["password"];

/* Tarkistetaan onko parametrina saatu oikeat tunnukset */
$user = Kayttaja::etsiKayttajaTunnuksilla($kayttaja, $salasana);

if ($user != null) {
    /* Jos tunnus on oikea, ohjataan käyttäjä sopivalla HTTP-otsakkeella. */
    
    //Tallennetaan istuntoon käyttäjäolio
    $_SESSION['kirjautunut'] = $user->getId();
    header('Location: index.php');
} else {
    /* Väärän tunnuksen syöttänyt saa eteensä lomakkeen ja virheen.
     * Tässä käytetään omassa kirjastotiedostossa määriteltyjä yleiskäyttöisiä funktioita.
     */
    naytaNakyma("login", array(
        /* Välitetään näkymälle tieto siitä, kuka yritti kirjautumista */
        'kayttaja' => $kayttaja,
        'virhe' => "Login failed! Invalid username or password.", request
    ));
}