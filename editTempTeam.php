<?php
require 'libs/common.php';

//Tallennetaan väliaikaista tiimiä etusivua ja tiimisivua varten
if (isset($_GET['added'])) {
    if (!isset($_SESSION["tiimi"])) {
        $_SESSION["tiimi"] = array();
        $_SESSION["tiimi"][] = $_GET['added'];
    } else if (count($_SESSION["tiimi"]) > 5) {
        
        $_SESSION['ilmoitus'] = "Team is already full";
    } else {
        $_SESSION["tiimi"][] = $_GET['added'];
    }
}
if (isset($_GET['removed'])) {
    unset($_SESSION["tiimi"][$_GET['removed']]);
}

header('Location: index.php');