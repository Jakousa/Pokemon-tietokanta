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
        <?php if (!empty($_SESSION['ilmoitus'])): ?>
            <div class="alert alert-info">
                <?php echo $_SESSION['ilmoitus']; ?>
            </div>
            <?php
            // Samalla kun viesti näytetään, se poistetaan istunnosta,
            // ettei se näkyisi myöhemmin jollain toisella sivulla uudestaan.
            unset($_SESSION['ilmoitus']);
        endif;
        ?>

        <?php if (!empty($data->virhe)): ?>
            <div class="alert alert-danger"><?php echo $data->virhe; ?></div>
        <?php endif; ?>

        <?php
        /* HTML-rungon keskellä on sivun sisältö, 
         * joka haetaan sopivasta näkymätiedostosta.
         * Oikean näkymän tiedostonimi on tallennettu muuttujaan $sivu.
         */
        require 'views/' . $sivu . '.php';
        ?>

    </body>
</html>