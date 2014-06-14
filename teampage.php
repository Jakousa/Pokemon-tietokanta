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
    
    $vihollinen = $_SESSION['tiimi'];
    
    $vastus = array();
    foreach ($vihollinen as $vastustaja) {
        $vastus = Pokemon::etsiPokemonNimella($vastustaja);
    }
    
    naytaNakyma("teampage", array(
        'teams' => $tiimit,
        'vastus' => $vastus
    ));
}
