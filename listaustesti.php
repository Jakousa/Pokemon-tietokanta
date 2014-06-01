<?php 
//require_once sisällyttää annetun tiedoston vain kerran
require_once "libs/tietokantayhteys.php";
require_once "libs/models/kayttaja.php";

//Lista asioista array-tietotyyppiin laitettuna:
$lista = Kayttaja::etsiKaikkiKayttajat();
?>
<!DOCTYPE HTML>
<html>
    <head><title>Listatesti</title></head>
    <body>
        <h1>Listaustesti</h1>
        <ul>
            <?php foreach ($lista as $asia) { ?>
            <li><?php echo $asia->getTunnus(); ?></li>
            <li><?php echo $asia->getSalasana(); ?></li>
            <?php } ?>
        </ul>
    </body>
</html>