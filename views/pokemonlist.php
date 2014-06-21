<h1>Pokémon-list</h1>
<form role="form" action="index.php" method="GET">
    <input type="hidden" name="info" value="<?php echo $_GET['info']; ?>" />
    <div class="input-group">
        <input type="text" name="part" class="form-control" placeholder="Search by name">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Search!</button>
        </span>
    </div>
</form>
<div class="scrollist">
    <table id="pokemonit" class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Type1</th>
                <th>Type2</th>
                <th>To Team</th>
                <?php if (isLogged()) : ?>
                    <th>Catch</th>
                <?php endif; ?>
                <th>Info</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->pokemonit as $pokemon): ?>
                <tr>
                    <td> <?php echo $pokemon->getId(); ?></td>
                    <td> <?php echo $pokemon->getName(); ?></td>
                    <td> <?php echo $pokemon->getType1(); ?></td>
                    <td> <?php echo $pokemon->getType2(); ?></td>
                    <td><a href="editTempTeam.php?added=<?php echo $pokemon->getName() ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span> Add to Team</a></td>
                    <?php if (isLogged()) : ?>
                <form action="doAddMyPokemon.php" method="POST">
                    <td><button type="submit" name="caught" value="<?php echo $pokemon->getId() ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-plus"></span> Normal</button>
                        or
                        <button type="submit" name="caughtShiny" value="<?php echo $pokemon->getId() ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-star-empty"></span> Shiny</button></td>
                </form>
            <?php endif; ?>
            <form role="form" action="index.php" method="GET">
                <input type="hidden" name="part" value="<?php echo $_GET['part']; ?>" />
                <td><button type="submit" name="info" value="<?php echo $pokemon->getId(); ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-info-sign"></span></button></td>
                </tr>
            </form>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>