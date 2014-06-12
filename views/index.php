<?php
require 'views/navbar.php';
?>
<div class="leftcontainer" style="float:left">
    <h1>Pokémon-list</h1>
    <form role="form" action="index.php" method="GET">
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
                        <th>Owned</th>
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
                        <td><a href="index.php?added=<?php echo $pokemon->getName() ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span> Add to Team</a></td>
                        <?php if (isLogged()) : ?>
                            <td><button type="button" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span> Catch</button></td>
                        <?php endif; ?>
                        <td><button type="button" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-info-sign"></span> </button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="northeastcontainer" style="float:right">
    <h3>Team</h3>
    <div class="list-group">
        <table id="tiimi" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION["tiimi"] as $member) : ?>
                <tr>
                    <td> <?php echo $member; ?></td>
                    <td><a href="index.php?removed=<?php echo array_search($member, $_SESSION["tiimi"]) ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-circle"></span> </a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<div class="southeastcontainer" style="float:right">
    <a>southeast</a>
</div>