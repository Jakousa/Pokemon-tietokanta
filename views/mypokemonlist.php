<h1>Caught Pokémon</h1>
<form role="form" action="mypokemon.php" method="GET">
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
                <th>Release</th>
                <th>Info</th>
            </tr>
        </thead>
        <tbody>
        <form action="doReleaseMyPokemon.php" method="POST">
            <?php foreach ($data->pokemonit as $pokemon): ?>
                <tr>
                    <td> <?php echo $pokemon->getId(); ?></td>
                    <td> <?php echo $pokemon->getName(); ?></td>
                    <td> <?php echo $pokemon->getType1(); ?></td>
                    <td> <?php echo $pokemon->getType2(); ?></td>
                    <td><button type="submit" name="release" value="<?php echo $pokemon->getId() ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span> Release</button></td>
                    <!-- <a href="doInfo"> --><td><button type="button" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-info-sign"></span> </button></td>
                </tr>
            <?php endforeach; ?>
        </form>
        </tbody>
    </table>
</div>