<?php
require_once 'libs/common.php';
require_once "libs/tietokantayhteys.php";
require_once 'libs/models/pokemon.php';
$pokemonit = Pokemon::etsiKaikkiPokemonit();
naytaNakyma("index", array(
    'pokemonit' => $pokemonit
));