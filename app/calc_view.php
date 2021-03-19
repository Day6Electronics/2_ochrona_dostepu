<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
    <head>
        <meta charset="utf-8" />
        <title>Kalkulator rezystora LED</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    </head>
    <body>

        <div style="width:90%; margin: 2em auto;">
            <style scoped="">
                .button-logout{
                    color: white;
                    border-radius: 4px;
                    background: rgb(230, 50, 50);
                }
            </style>
            <a href="<?php print(_APP_ROOT); ?>/app/secured2.php" class="pure-button">Przejdź do drugiej strony</a>
            <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="button-logout pure-button">Wyloguj</a>
        </div>

        <div style="width:90%; margin: 2em auto;">

            <form action="<?php print(_APP_URL); ?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
                <legend>Kalkulator rezystora diody LED</legend>
                <fieldset>
                    <label for="id_v1">Napięcie zasilania (V): </label>
                    <input id="id_v1" type="text" name="v1" value="<?php if (isset($v1)) print($v1); ?>" />
                    <br />
                    <label for="id_v1">Napięcie przewodzenia (V): </label>
                    <input id="id_v2" type="text" name="v2" value="<?php if (isset($v2)) print($v2); ?>" />
                    <br />
                    <label for="id_amp">Prąd przewodzenia (mA): </label>
                    <input id="id_amp" type="text" name="amp" value="<?php if (isset($amp)) print($amp); ?>" />
                    <br />
                </fieldset>	
                <input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
            </form>	

            <?php
            if (isset($info)) {
                if (count($info) > 0) {
                    echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 10px; background-color: #f88; width:300px;">';
                    foreach ($info as $msg) {
                        echo '<li>' . $msg . '</li>';
                    }
                    echo '</ol>';
                }
            }
            ?>

            <?php if (isset($resistor)) { ?>
                <div style="margin: 20px; padding: 10px; border-radius: 10px; background-color: #0f0; width:300px;">
                    <?php echo 'Wartość rezystora: ' . $resistor . ' Ohm'; ?>
                </div>
            <?php } ?>

    </body>
</html>


