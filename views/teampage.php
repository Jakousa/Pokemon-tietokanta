<?php
require 'views/navbar.php';
?>
Sijoittelu väliaikainen
<div id="team_page_holder">

    <div id="team_containers">
        <form method="GET">
            <select name="team">
                <?php foreach ($data->teams as $team) : ?>
                    <option value="<?php echo $team->getId() ?>"><?php echo $team->getName() ?></option>
                <?php endforeach; ?>
            </select>
            <button class="btn btn-default btn-xs" type="submit">select</button>
        </form>
        <table id="tiimi" class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type1</th>
                        <th>Type2</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data->omatiimi as $ottelija) : ?>
                        <tr>
                            <td> <?php echo $ottelija->getName(); ?></td>
                            <td> <?php echo $ottelija->getType1(); ?></td>
                            <td> <?php echo $ottelija->getType2(); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>

    <div id="team_containers">
        a<!-- Ottelija -->
    </div>

    <div id="team_containers">
        a<!-- Vastus -->
    </div>

    <div id="team_containers" class ="list-group"> 
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
                        <th>Hp</th>
                        <th>Attack</th>
                        <th>Defense</th>
                        <th>Sp.Attack</th>
                        <th>Sp.Defense</th>
                        <th>Speed</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data->vastus as $opponent) : ?>
                        <tr>
                            <td> <?php echo $opponent->getName(); ?></td>
                            <td> <?php echo $opponent->getType1(); ?></td>
                            <td> <?php echo $opponent->getType2(); ?></td>
                            <td> <?php echo $opponent->getHp(); ?></td>
                            <td> <?php echo $opponent->getAttack(); ?></td>
                            <td> <?php echo $opponent->getDefense(); ?></td>
                            <td> <?php echo $opponent->getSpattack(); ?></td>
                            <td> <?php echo $opponent->getSpdefense(); ?></td>
                            <td> <?php echo $opponent->getSpeed(); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <div id="team_containers">
        <!-- Info oma -->
    </div>

    <div id="team_containers">
        <!-- Info ottelija -->
    </div>

    <div id="team_containers">
        <!-- Info vastus -->
    </div>

    <div id="team_containers">
        <!-- Info vastustajat -->
    </div>

</div>
