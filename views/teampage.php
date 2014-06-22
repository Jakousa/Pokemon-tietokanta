<?php
require 'views/navbar.php';
?>
<div id="team_page_holder">

    <div id="team_containers">
        <form method="GET">
            <select name="team">
                <?php foreach ($data->teams as $team) : ?>
                    <option value="<?php echo $team->getId() ?>"><?php echo $team->getName() ?></option>
                <?php endforeach; ?>
            </select>
            <button class="btn btn-default btn-xs" type="submit">select</button>
            <input type="hidden" name="info" value="<?php echo $_GET['info']; ?>" />
            <input type="hidden" name="info2" value="<?php echo $_GET['info2']; ?>" />
        </form>
        <table id="tiimi" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type1</th>
                    <th>Type2</th>
                    <th>Choose</th>
                </tr>
            </thead>
            <tbody>
            <form method="GET">
                <input type="hidden" name="team" value="<?php echo $_GET['team']; ?>" />
                <?php foreach ($data->omatiimi as $ottelija) : ?>
                    <tr>
                        <td> <?php echo $ottelija->getName(); ?></td>
                        <td> <?php echo $ottelija->getType1(); ?></td>
                        <td> <?php echo $ottelija->getType2(); ?></td>
                        <td> <button type="submit" name="info" value="<?php echo $ottelija->getId(); ?>" class="btn btn-xs btn-default">Choose</button></td>
                    </tr>
                <?php endforeach; ?>
                <input type="hidden" name="info2" value="<?php echo $_GET['info2']; ?>" />
            </form>
            </tbody>
        </table>
    </div>

    <div id="team_containers">
        Your fighter<!-- Ottelija -->
        <?php
        require 'views/pokemoninfo.php';
        ?>
    </div>

    <div id="team_containers">
        Your opponent<!-- Vastus -->
        <?php
        $data->info = $data->info2;
        require 'views/pokemoninfo.php';
        ?>
    </div>

    <div id="team_containers" class ="list-group" style="float:right"> 
        <!-- Lista vihollisen pokemoneista-->
        <?php if (!isset($_SESSION['tiimi']) or empty($_SESSION['tiimi'])) : ?>
            No enemy selected, do it in the <a href="index.php">front page.</a>
        <?php else : ?>
            <table id="tiimi" class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type1</th>
                        <th>Type2</th>
                        <th>Choose</th>
                    </tr>
                </thead>
                <tbody>
                <form method="GET">
                    <?php if (isset($_GET['team'])) : ?>
                    <input type="hidden" name="team" value="<?php echo $_GET['team']; ?>" />
                    <?php endif;?>
                    <input type="hidden" name="info" value="<?php echo $_GET['info']; ?>" />
                    <?php foreach ($data->vastus as $opponent) : ?>
                        <tr>
                            <td> <?php echo $opponent->getName(); ?></td>
                            <td> <?php echo $opponent->getType1(); ?></td>
                            <td> <?php echo $opponent->getType2(); ?></td>
                            <td><button type="submit" name="info2" value="<?php echo $opponent->getId(); ?>" class="btn btn-xs btn-default">Choose</button></td>
                        </tr>
                    <?php endforeach; ?>
                </form>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
