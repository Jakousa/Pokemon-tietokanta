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
                    <th>Owned</th>
                    <th>Info</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data->pokemonit as $pokemon): ?>
                <tr>
                    <td> <?php echo $pokemon->getId(); ?></td>
                    <td> <?php echo $pokemon->getName(); ?></td>
                    <td> <?php echo $pokemon->getType1(); ?></td>
                    <td> <?php echo $pokemon->getType2(); ?></td>
                    <td> 1</td>
                    <td> 1</td>
                    <td> 1</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="northeastcontainer" style="float:right">
    <a>northeast</a>

</div>
<div class="southeastcontainer" style="float:right">
    <a>southeast</a>
</div>