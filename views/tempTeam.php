
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
                    <td><a href="editTempTeam.php?removed=<?php echo array_search($member, $_SESSION["tiimi"]) ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-circle"></span> </a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>