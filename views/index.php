<?php
require 'views/navbar.php';
?>
<div class="leftcontainer" style="float:left">
    <h1>Pokémon-list</h1>
    <input type="text" id="search" placeholder="Type to search">
    <div class="scrollist">
        <table id="pokemonit" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type1</th>
                    <th>Type2</th>
                    <th>To Team</th>
                    <?php if (isLogged()) {
                        ?><th>Owned</th><?php }
                    ?>
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
                <!-- <form action="addMember.php" method="POST"> -->
                    <td><button type="submit" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span> Add to Team</button></td>
                <!--</form> -->
                <?php if (isLogged()) { ?>
                    <td><button type="button" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span> Catch</button></td>
                <?php } ?>
                <td><button type="button" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-info-sign"></span> </button></td>
                </tr>
                <?php
                if (isset($_POST[$pokemon->getId()])) {
                    naytaNakyma("login");
                }
                ?>
<?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="northeastcontainer" style="float:right">
    <div class="list-group">
        <table id="pokemonit" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type1</th>
                    <th>Type2</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> Number</td>
                    <td> Name</td>
                    <td> Type </td>
                    <td> Type </td>
                    <td><button type="button" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-circle"></span> </button></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
<div class="southeastcontainer" style="float:right">
    <a>southeast</a>
</div>