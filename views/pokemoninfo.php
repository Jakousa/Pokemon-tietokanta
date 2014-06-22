<h4># <?php echo $data->info->getId() . ": " . $data->info->getName(); ?> <small> <?php echo $data->info->getType1() ." ". $data->info->getType2() ; ?> </small></h4>
HP= <?php echo $data->info->getHp(); ?><br>
<?php teeAlkeellinenPalkki($data->info->getHp()); ?> <br>

Attack= <?php echo $data->info->getAttack(); ?><br>
<?php teeAlkeellinenPalkki($data->info->getAttack()); ?> <br>

Defense= <?php echo $data->info->getDefense(); ?><br>
<?php teeAlkeellinenPalkki($data->info->getDefense()); ?> <br>

Special Attack= <?php echo $data->info->getSpattack(); ?><br>
<?php teeAlkeellinenPalkki($data->info->getSpattack()); ?> <br>

Special Defense= <?php echo $data->info->getSpdefense(); ?><br>
<?php teeAlkeellinenPalkki($data->info->getSpdefense()); ?> <br>

Speed= <?php echo $data->info->getSpeed(); ?><br>
<?php teeAlkeellinenPalkki($data->info->getSpeed()); ?>