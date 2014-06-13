<?php
require 'libs/common.php';
require 'libs/models/team.php';
require 'libs/models/teammember.php';

if (empty($_POST["team"])) {
    naytaNakyma("signup", array(
        'virhe' => "Registering failed, you didn't choose username.",
    ));
}
