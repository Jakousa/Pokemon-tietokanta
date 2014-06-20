<?php

require_once 'libs/common.php';
require_once 'libs/models/ownedpokemon.php';

Ownedpokemon::poistaOlemasta($_SESSION['kirjautunut'], $_POST['release']);

header('Location: mypokemon.php');
$_SESSION['ilmoitus'] = "Pokemon released.";