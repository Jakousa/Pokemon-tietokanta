<?php
require 'views/navbar.php';
?>
<div class="leftcontainer" style="float:left">
    <?php
    require 'views/pokemonlist.php';
    ?>
</div>

<div class="northeastcontainer" style="float:right">
    <h3>Team</h3>
    <?php
    require 'views/tempTeam.php';

    if (isLogged()) :
        ?>
        <form class="form-horizontal" role="form" action="createTeam.php" method="POST">
            <div class="input-group">
                <input type="text" name="team" class="form-control" placeholder="Name of team">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Save!</button>
                    <a href="clearTempTeam.php" class="btn btn-default">Clear!</a>
                    <a href="teampage.php" class="btn btn-default">Battle against!</a>
                </span>
            </div>
        </form>
<?php endif; ?>
</div>

<div class="southeastcontainer" style="float:right">
    <a>southeast</a>
</div>