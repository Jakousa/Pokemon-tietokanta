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
    //Tarkistetaan onko henkilö kirjautunut toimintoja varten.
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
    <?php if (sizeof($data->tiimit) > 0) : ?>
            <!-- Yhdistettiin tiimin muokkaus ja poisto -->
            To delete a team update it with no pokemon.
            <form class="form-horizontal" role="form" action="updateTeam.php" method="POST">
                <select name="teamid">
                    <?php foreach ($data->tiimit as $team) : ?>
                        <option value="<?php echo $team->getId() ?>"><?php echo $team->getName() ?></option>
        <?php endforeach; ?>
                </select> 
                <button class="btn btn-default btn-xs" type="submit">Update!</button>
            </form>
        <?php endif; ?>
<?php endif; ?>
</div>

<div class="southeastcontainer" style="float:right">
    <a>Will become info</a>
    <?php
    require 'views/pokemoninfo.php';
    ?> 
</div>