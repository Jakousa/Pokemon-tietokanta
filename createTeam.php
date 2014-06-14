<?php

require 'libs/common.php';
require 'libs/models/team.php';
require 'libs/models/teammember.php';
require 'libs/models/pokemon.php';

if (empty($_SESSION['tiimi'])) {
    $_SESSION['ilmoitus'] = "Your team has to have atleast 1 Pokemon";
    header('Location: index.php');
} else if (empty($_POST["team"])) {
    
    $_SESSION['ilmoitus'] = "Name your team to save it";
    header('Location: index.php');
} else {

    $kirjautunutKayttaja = $_SESSION['kirjautunut'];
    
    $newteam = new Team();
    $newteam->setName($_POST['team']);
    $newteam->setOwnerid($kirjautunutKayttaja);

    if ($newteam->onkoKelvollinen()) {

        $newteam->lisaaKantaan();
        //Tiimi lisättiin kantaan onnistuneesti. Ja on saanut IDn
        //Ennen kuin käyttäjä lähetetään eteenpäin lisätään myös pokemonit tiimin jäseniksi
        foreach ($_SESSION["tiimi"] as $jasen) {
            //Ei tullut tallennettua muuta kuin nimi pokemonista joten haetaan id
            $apu = Pokemon::etsiPokemonNimella($jasen);
            $lisattava = new Teammember();
            $lisattava->setPokemonid($apu->getId());
            $lisattava->setTeamid($newteam->getId());
            //Koska pokemoneilla ei ole muokattavia ominaisuuksia lisätään se kantaan
            $lisattava->lisaaKantaan();
        }

        header('Location: index.php');
        //Asetetaan istuntoon ilmoitus siitä, että pokemon on lisätty.
        $_SESSION['ilmoitus'] = "Team successfully created";
    } else {
        $virheet = $newteam->getVirheet();

        //Virheet voidaan nyt välittää näkymälle syötettyjen tietojen kera
        naytaNakyma("index", array(
            'virhe' => $virheet
        ));
    }
}
header('Location: index.php');