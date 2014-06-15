<?php

require_once 'libs/common.php';
require_once 'libs/models/pokemon.php';

if (isLogged()) {
    //Etsitään käyttäjän Pokemonit
    if (!isset($_GET['part']) or $_GET['part'] == '') {
        $pokemonit = Pokemon::etsiOmistajanKaikkiPokemonit($_SESSION['kirjautunut']);
    } else {
        $part = $_GET['part'];
        $pokemonit = Ownedpokemon::etsiOmistajanPokemonitNimenOsalla($_SESSION['kirjautunut'], $part);
    }

    naytaNakyma("mypokemon", array(
        'pokemonit' => $pokemonit
    ));
} else {
    $_SESSION['ilmoitus'] = 'Access denied, login first.';
    header('Location: index.php');
}
