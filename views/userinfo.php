This page contains information about your account, delete your account <a href="deleteAccount.php" class="btn btn-default btn-xs"> here </a>
<h3> Pokedex stats:</h3>
Completed: <?php echo $data->mypokemonnumber . '/' . $data->pokemonnumber ?>
 of which you have <?php echo $data->shinynumber ?> shiny pokemon
 
 <h1><?php echo round(($data->mypokemonnumber/$data->pokemonnumber)*100,1).'%' ?></h1>
 
