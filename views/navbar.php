<ul class="nav nav-tabs">
    <li><a href="index.php">Pokémon</a></li>
    <?php if (isLogged()) :?> 
        <li><a href="teampage.php">Teams</a></li>
        <li><a href="mypokemon.php">My Pokémon broken</a></li>
        <li class="navbar-right"><a style="float:right" href="logout.php">Logout</a></li> 
    <?php else:?> 
        <li class="navbar-right"><a style="float:right" href="signup.php">Register</a></li>
        <li class="navbar-right"><a style="float:right" href="login.php">Login</a></li> 
    <?php endif; ?>

</ul>