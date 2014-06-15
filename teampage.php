<?php

require_once 'libs/common.php';
require_once 'libs/models/team.php';
require_once 'libs/models/pokemon.php';

if (!isLogged()) {
    $_SESSION['ilmoitus'] = "Access denied, login first.";
    header('Location: index.php');
} else {
    $ownerid = $_SESSION['kirjautunut'];
    $tiimit = Team::etsiKaikkiTiimitOmistajalla($ownerid);
    
    $vastus = array();
    foreach ($_SESSION['tiimi'] as $vastustaja) {
        $pokemoni = Pokemon::etsiPokemonNimella($vastustaja);
        $vastus[] = $pokemoni;
    }
    
    naytaNakyma("teampage", array(
        'teams' => $tiimit,
        'vastus' => $vastus
    ));
}
