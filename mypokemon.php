<?php

require_once 'libs/common.php';
require_once 'libs/models/pokemon.php';
require_once 'libs/models/ownedpokemon.php';

if (isLogged()) {
    //Etsitään käyttäjän Pokemonit
    $pokemonit = Ownedpokemon::etsiOmistajanKaikkiPokemonit($_SESSION['kirjautunut']);
    $mypokemonnumber = sizeof($pokemonit);
    if (!isset($_GET['part']) or $_GET['part'] == '') {
        
    } else {
        $part = $_GET['part'];
        $pokemonit = Ownedpokemon::etsiOmistajanPokemonitNimenOsalla($_SESSION['kirjautunut'], $part);
    }

    //Tarvitaan tietoja userinfoa varten ja tilin muutos
    //Lasketaan shinyjen määrä, lasketaan kuinka monta pokemonia on omistuksessa / kaikki pokemonit
    $pokemonnumber = sizeof(Pokemon::etsiKaikkiPokemonit());
    $shinynumber = sizeof(Ownedpokemon::etsiOmistajanShinyPokemonit($_SESSION['kirjautunut']));

    //Lisäksi infon katselu
    if (!isset($_GET['info'])) {
        if (empty($pokemonit)) {
            $_GET['info'] = 1;
        } else {
            $_GET['info'] = $pokemonit[rand(0, sizeof($pokemonit)-1)]->getId();
        }
    } else {
        $shinyinfo = Ownedpokemon::etsiOmistajanPokemonIdlla($_SESSION['kirjautunut'], $_GET['info']);
    }
    $infopokemon = Pokemon::etsiPokemonIdlla($_GET['info']);


    naytaNakyma("mypokemon", array(
        'pokemonit' => $pokemonit,
        'mypokemonnumber' => $mypokemonnumber,
        'pokemonnumber' => $pokemonnumber,
        'shinynumber' => $shinynumber,
        'info' => $infopokemon,
        'shinyinfo' => $shinyinfo
    ));
} else {
    $_SESSION['ilmoitus'] = 'Access denied, login first.';
    header('Location: index.php');
}
