<?php

require 'libs/common.php';
require 'libs/models/team.php';
require 'libs/models/teammember.php';
require 'libs/models/pokemon.php';

$id = $_POST['teamid'];

//Poisto-ominaisuus samassa
if (!isset($_SESSION['tiimi']) or empty($_SESSION['tiimi'])) {
    //Poistetaan tiimi ja jokainen tiimiin viittaava jäsen
    Team::poistaOlemasta($id);
    Teammember::poistaTiimiOlemasta($id);

    header('Location: index.php');

    $_SESSION['ilmoitus'] = "Team successfully deleted";
} else { // Muuten päivitys
    //Tiimi muokkaantuu
    Teammember::poistaTiimiOlemasta($id);

    foreach ($_SESSION['tiimi'] as $pokemonNimi) {
        $pokemon = Pokemon::etsiPokemonNimella($pokemonNimi);
        $lisattava = new Teammember();
        $lisattava->setPokemonid($pokemon->getId());
        $lisattava->setTeamid($id);
        //Koska pokemoneilla ei ole muokattavia ominaisuuksia lisätään se kantaan
        $lisattava->lisaaKantaan();
    }

    header('Location: index.php');

    $_SESSION['ilmoitus'] = "Team successfully updated";
}
