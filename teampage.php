<?php

require_once 'libs/common.php';
require_once 'libs/models/team.php';
require_once 'libs/models/pokemon.php';
require_once 'libs/models/teammember.php';

if (!isLogged()) {
    $_SESSION['ilmoitus'] = "Access denied, login first.";
    header('Location: index.php');
} else {
    
    //Haetaan omat tiimit
    $ownerid = $_SESSION['kirjautunut'];
    $tiimit = Team::etsiKaikkiTiimitOmistajalla($ownerid);
    
    //Haetaan vastustaja
    $vastus = array();
    foreach ($_SESSION['tiimi'] as $vastustaja) {
        $pokemoni = Pokemon::etsiPokemonNimella($vastustaja);
        $vastus[] = $pokemoni;
    }
    
    //Jos oma tiimi on valittu haetaan se
    $omatiimi = array();
    if (isset($_GET['team'])) {
        $omatiimi = Teammember::etsiTiimi($_GET['team']);
    }
    
    naytaNakyma("teampage", array(
        'teams' => $tiimit,
        'vastus' => $vastus,
        'omatiimi' => $omatiimi
    ));
}
