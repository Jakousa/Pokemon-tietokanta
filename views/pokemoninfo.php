<h4># <?php echo $data->info->getId() . ": " . $data->info->getName(); ?> <small> <?php echo $data->info->getType1() ." ". $data->info->getType2() ; ?> </small></h4>
HP= <?php echo $data->info->getHp(); ?><br>
<?php
$x=1;
while($x<=$data->info->getHp()) {
  echo "/";
  $x++;
}
?> <br>
Attack= <?php echo $data->info->getAttack(); ?><br>
<?php
$x=1;
while($x<=$data->info->getAttack()) {
  echo "/";
  $x++;
}
?> <br>
Defense= <?php echo $data->info->getDefense(); ?><br>
<?php
$x=1;
while($x<=$data->info->getDefense()) {
  echo "/";
  $x++;
}
?> <br>
Special Attack= <?php echo $data->info->getSpattack(); ?><br>
<?php
$x=1;
while($x<=$data->info->getSpattack()) {
  echo "/";
  $x++;
}
?> <br>
Special Defense= <?php echo $data->info->getSpdefense(); ?><br>
<?php
$x=1;
while($x<=$data->info->getSpdefense()) {
  echo "/";
  $x++;
}
?> <br>
Speed= <?php echo $data->info->getSpeed(); ?><br>
<?php
$x=1;
while($x<=$data->info->getSpeed()) {
  echo "/";
  $x++;
}
?> <br>