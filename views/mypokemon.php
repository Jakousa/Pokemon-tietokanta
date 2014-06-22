<?php
require 'views/navbar.php';
?>
<div class="leftcontainer" style="float:left">
    <?php
    require 'views/mypokemonlist.php';
    ?>
</div>

<div class="northeastcontainer" style="float:right">
    <?php
    require 'views/userinfo.php';
    ?>
</div>

<div class="southeastcontainer" style="float:right">
    <?php
    if ($data->shinyinfo === true) {
        ?>This pokemon is shiny<?php
    }
    require 'views/pokemoninfo.php';
    ?>
</div>