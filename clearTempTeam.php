<?php
  //Avataan istunto
  session_start();

  //Poistetaan istunnosta merkintä tiimistä
  unset($_SESSION['tiimi']);

  //Yleensä kannattaa ohjata käyttäjä kirjautumissivulle
  header('Location: index.php');
