<?php
require 'views/navbar.php';
?>
<div id="team_page_holder">

    <div id="team_containers">
        Lista omista tiimeistä ja sensellaista
        <select>
            <?php foreach ($data->teams as $team) : ?>
            <option value="<?php echo $team->getId() ?>"><?php echo $team->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div id="team_containers">
        Ottelija
    </div>

    <div id="team_containers">
        Vastus
    </div>

    <div id="team_containers">
        Lista vihollisen pokemoneista

    </div>

    <div id="team_containers">
        Info oma
    </div>

    <div id="team_containers">
        Info ottelija
    </div>

    <div id="team_containers">
        Info vastus
    </div>

    <div id="team_containers">
        Info vastustajat
    </div>

</div>
