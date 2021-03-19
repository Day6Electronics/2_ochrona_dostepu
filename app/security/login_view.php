<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
    <head>
        <meta charset="utf-8" />
        <title>Logowanie</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    </head>
    <body>

        <div style="width:50%; margin: 2em auto;">

            <form class="pure-form" action="<?php print(_APP_ROOT); ?>/app/security/login.php" method="post" class="pure-form pure-form-stacked">
                <fieldset>
                    <legend>Logowanie</legend>
                    <input id="id_login" type="text" name="login" placeholder="Login" value="<?php out($form['login']); ?>" />
                    <input id="id_pass" type="password" name="pass" placeholder="Hasło" />
                </fieldset>
                <input type="submit" value="Zaloguj" class="pure-button pure-button-primary"/>
            </form>	

            <?php
            if (isset($info)) {
                if (count($info) > 0) {
                    echo '<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
                    foreach ($info as $msg) {
                        echo '<li>' . $msg . '</li>';
                    }
                    echo '</ol>';
                }
            }
            ?>

        </div>

    </body>
</html>

