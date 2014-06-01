<!DOCTYPE HTML>
<html>
    <head>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <title>Pokemon-tietokanta</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        /* HTML-rungon keskellä on sivun sisältö, 
         * joka haetaan sopivasta näkymätiedostosta.
         * Oikean näkymän tiedostonimi on tallennettu muuttujaan $sivu.
         */
        require 'views/' . $sivu . '.php';
        ?>

        <?php if (!empty($data->virhe)): ?>
            <div class="alert alert-danger"><?php echo $data->virhe; ?></div>
        <?php endif; ?>
            
    </body>
</html>