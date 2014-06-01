<?php
require_once 'libs/common.php';
?>

<!DOCTYPE HTML>
<html>
    <head><title>Kirjautumistesti</title></head>
    <body>
        <h1>Kirjautumistesti</h1>
        <ul>
            <?php
            if (isLogged()) {
                echo 'You are logged in';
            } else {
                echo 'You are NOT logged in';
            }
            ?>
            <a href="login.php">Login</a>
            <a href="logout.php">Logout</a>
        </ul>
    </body>
</html>