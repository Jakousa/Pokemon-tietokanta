<?php

require 'libs/common.php';
require 'libs/models/team.php';
require 'libs/models/teammember.php';
require 'libs/models/pokemon.php';

if (empty($_POST['team'])) {
    naytaNakyma("index", array(
        'virhe' => "Name your team to save it".$testi,
    ));
}

$newteam = new Team();
$newteam->setName($_POST['team']);
$newteam->setOwner($_SESSION['kirjautunut']);

if ($newteam->onkoKelvollinen()) {
    
  $newteam->lisaaKantaan();
  //Tiimi lisättiin kantaan onnistuneesti. Ja on saanut IDn

  //Ennen kuin käyttäjä lähetetään eteenpäin lisätään myös pokemonit tiimin jäseniksi
  foreach ($_SESSION["tiimi"] as $jasen) {
      $apu = Pokemon::etsiPokemonNimella($jasen);
      $lisattava = new Teammember();
      $lisattava->setPokemonid($apu->getId());
      $lisattava->setTeamid($newteam->getId());
      //Koska pokemoneilla ei ole muokattavia ominaisuuksia lisätään se kantaan
      $lisattava->lisaaKantaan();
  }
  
  header('Location: index.php');
  //Asetetaan istuntoon ilmoitus siitä, että pokemon on lisätty.
  //Tästä tekniikasta kerrotaan lisää kohta
  $_SESSION['ilmoitus'] = "Team successfully created";
  
} else {
  $virheet = $newteam->getVirheet();

  //Virheet voidaan nyt välittää näkymälle syötettyjen tietojen kera
  naytaNakyma("index", array(
    'pokemonit' => $pokemonit,
    'virhe' => $virhe
  ));
}