<ul class="nav nav-tabs">
    <li><a href="index.php">Pokémon</a></li>
    <li><a href="teampage.html">Teams broken</a></li>
    <li><a href="mypokemon.html">My Pokémon broken</a></li>
    <?php if (isLogged()) {
        ?> <li class="navbar-right"><a style="float:right" href="logout.php">Logout</a></li> <?php
    } else {
        ?> 
        <li class="navbar-right"><a style="float:right" href="signup.php">Register</a></li>
        <li class="navbar-right"><a style="float:right" href="login.php">Login</a></li> <?php
    } ?>
    
</ul>