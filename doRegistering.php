<?php
require 'libs/common.php';
require 'libs/models/kayttaja.php';

if (empty($_POST["username"])) {
    naytaNakyma("signup", array(
        'virhe' => "Registering failed, you didn't choose username.",
    ));
}

if (empty($_POST["password"])) {
    naytaNakyma("signup", array(
        'kayttaja' => $kayttaja,
        'virhe' => "Registering failed, you didn't choose password.",
    ));
}

$newuser = new Kayttaja();
$newuser->setTunnus($_POST['username']);
$newuser->setSalasana($_POST['password']);

$isprevious = Kayttaja::etsiKayttajaTunnuksella($newuser->getTunnus());

//Pyydetään Kissa-oliota tarkastamaan syötetyt tiedot.
if ($newuser->onkoKelvollinen() && is_null($isprevious)) {
    
  $newuser->lisaaKantaan();
  //Kissa lisättiin kantaan onnistuneesti, lähetetään käyttäjä eteenpäin
  header('Location: index.php');
  //Asetetaan istuntoon ilmoitus siitä, että kissa on lisätty.
  //Tästä tekniikasta kerrotaan lisää kohta
  $_SESSION['ilmoitus'] = "Kissa lisätty onnistuneesti.";

} else {
  $virheet = $newuser->getVirheet();
  if (!is_null($isprevious)) {
      $virhe = 'Username is already in use.';
  }
  
  //Virheet voidaan nyt välittää näkymälle syötettyjen tietojen kera
  naytaNakyma("signup", array(
    'kayttaja' => $newuser->getTunnus(),
    'virhe' => $virhe
  ));
}