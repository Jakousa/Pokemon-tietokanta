<?php

require_once 'libs/common.php';
require_once "libs/tietokantayhteys.php";
require_once 'libs/models/pokemon.php';
require_once 'libs/models/team.php';

//Testataan jos jotakin ollaan haettu
if (!isset($_GET['part']) or $_GET['part'] == '') {
    $pokemonit = Pokemon::etsiKaikkiPokemonit();
} else {
    $part = $_GET['part'];
    $pokemonit = Pokemon::etsiPokemonNimesta($part);
}

//Infon haku
if (isset($_GET['info'])) {
    $infopokemon = Pokemon::etsiPokemonIdlla($_GET['info']);
}

//Testataan jos ollaan kirjauduttu: kirjautuneelle näytetään tiimit
if (isset($_SESSION['kirjautunut'])) {
    $teams = Team::etsiKaikkiTiimitOmistajalla($_SESSION['kirjautunut']);

    naytaNakyma("index", array(
        'pokemonit' => $pokemonit,
        'tiimit' => $teams,
        'info' => $infopokemon
    ));
} else {
    naytaNakyma("index", array(
        'pokemonit' => $pokemonit,
        'info' => $infopokemon
    ));
}