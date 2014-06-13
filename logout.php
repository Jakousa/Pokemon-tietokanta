<?php
  //Avataan istunto
  session_start();

  //Poistetaan istunnosta merkintä kirjautuneesta käyttäjästä -> Kirjaudutaan ulos
  unset($_SESSION['kirjautunut']);
  
  //Ilmoitetaan käyttäjälle onnistumisesta
  $_SESSION['ilmoitus'] = "You have successfully logged out";

  //Yleensä kannattaa ulkos kirjautumisen jälkeen ohjata käyttäjä kirjautumissivulle
  header('Location: index.php');
?>