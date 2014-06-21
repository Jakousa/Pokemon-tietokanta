<?php

require_once 'libs/common.php';
require_once 'libs/models/pokemon.php';
require_once 'libs/models/kayttaja.php';
require_once 'libs/models/ownedpokemon.php';
require_once 'libs/models/team.php';
require_once 'libs/models/teammember.php';

$kirjautunutKayttaja = $_SESSION['kirjautunut'];
//poistetaan jokainen tiimi
$kaikkiTiimit = Team::etsiKaikkiTiimitOmistajalla($kirjautunutKayttaja);
foreach ($kaikkiTiimit as $tiimi) {
    Team::poistaOlemasta($tiimi->getId());
    Teammember::poistaTiimiOlemasta($tiimi->getId());
}

//poistetaan jokainen omistettu pokemon
$omistetutPokemonit = Ownedpokemon::etsiOmistajanKaikkiPokemonit($kirjautunutKayttaja);
foreach ($omistetutPokemonit as $pokemon) {
    Ownedpokemon::poistaOlemasta($kirjautunutKayttaja, $pokemon->getId());
}

Kayttaja::poistaOlemasta($kirjautunutKayttaja);

unset($_SESSION['kirjautunut']);

$_SESSION['ilmoitus'] = "Account has been deleted";

header('Location: index.php');