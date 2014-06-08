<?php

$newuser = new Kayttaja();
$newuser->setTunnus($_POST['username']);
$newuser->setSalasana($_POST['password']);

//Pyydetään Kissa-oliota tarkastamaan syötetyt tiedot.
if ($uusikatti->onkoKelvollinen()) {
  $uusikatti->lisaaKantaan();
  
  //Kissa lisättiin kantaan onnistuneesti, lähetetään käyttäjä eteenpäin
  header('Location: kissalista.php');
  //Asetetaan istuntoon ilmoitus siitä, että kissa on lisätty.
  //Tästä tekniikasta kerrotaan lisää kohta
  $_SESSION['ilmoitus'] = "Kissa lisätty onnistuneesti.";

} else {
  $virheet = $uusikatti->getVirheet();

  //Virheet voidaan nyt välittää näkymälle syötettyjen tietojen kera
  naytaNakymä("kissalomake", array(
    'kissa' => $uusikatti,
    'virheet' => $virheet
  ));
}