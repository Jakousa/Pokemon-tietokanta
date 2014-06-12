<?php

require_once 'libs/common.php';
require_once "libs/tietokantayhteys.php";
require_once 'libs/models/pokemon.php';

//Testataan jos jotakin ollaan haettu
if (!isset($_GET['part']) or $_GET['part'] == '') {
    $pokemonit = Pokemon::etsiKaikkiPokemonit();
} else {
    $part = $_GET['part'];
    $pokemonit = Pokemon::etsiPokemonNimesta($part);
}

//Tallennetaan väliaikaista tiimiä etusivua ja tiimisivua varten
if (isset($_GET['added'])) {
    if (!isset($_SESSION["tiimi"])) {
        $_SESSION["tiimi"] = array();
        $_SESSION["tiimi"][] = $_GET['added'];
    } else if (count($_SESSION["tiimi"]) > 5) {
        naytaNakyma("index", array(
            'pokemonit' => $pokemonit,
            'virhe' => "Team already has 6 members",
        ));
    } else {
        $_SESSION["tiimi"][] = $_GET['added'];
    }
}
if (isset($_GET['removed'])) {
    unset($_SESSION["tiimi"][$_GET['removed']]);
}

naytaNakyma("index", array(
    'pokemonit' => $pokemonit
));