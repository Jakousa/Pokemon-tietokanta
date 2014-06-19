<?php

require_once 'libs/common.php';
require_once 'libs/models/ownedpokemon.php';

$newownedpokemon = new Ownedpokemon();
if (isset($_POST['caughtShiny'])) {
    $newownedpokemon->setPokemonid($_POST['caughtShiny']);
    $newownedpokemon->setShiny(1);
} else {
    $newownedpokemon->setPokemonid($_POST['caught']);
    $newownedpokemon->setShiny(0);
}
$newownedpokemon->setOwnerid($_SESSION['kirjautunut']);

$isprevious = Ownedpokemon::etsiOmistajanPokemonIdlla($newownedpokemon->getOwnerid(), $newownedpokemon->getPokemonid());

if (is_null($isprevious)) {
    $newownedpokemon->lisaaKantaan();
    header('Location: index.php');
    $_SESSION['ilmoitus'] = "Pokemon caught.";
} else {
    header('Location: index.php');
    $_SESSION['ilmoitus'] = "Pokemon has already been caught";
}