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

    //omieninfo
    if (isset($_GET['info']) and !empty($_GET['info'])) {
        $omainfo = Pokemon::etsiPokemonIdlla($_GET['info']);
    } else {
        $omainfo = new Pokemon();
    }

    //vastustajieninfo
    if (isset($_GET['info2']) and !empty($_GET['info2'])) {
        $vastusinfo = Pokemon::etsiPokemonIdlla($_GET['info2']);
    } else {
        $vastusinfo = new Pokemon();
    }

    naytaNakyma("teampage", array(
        'teams' => $tiimit,
        'vastus' => $vastus,
        'omatiimi' => $omatiimi,
        'info' => $omainfo,
        'info2' => $vastusinfo
    ));
}
