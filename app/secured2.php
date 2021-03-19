<?php
require_once dirname(__FILE__) . '/../config.php';
include _ROOT_PATH . '/app/security/check.php';
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
    <head>
        <meta charset="utf-8" />
        <title>Chroniona strona</title>
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
            <a href="<?php print(_APP_ROOT); ?>/app/calc.php" class="pure-button">Powrót do kalkulatora</a>
            <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="button-logout pure-button">Wyloguj</a>
        </div>

        <div style="width:90%; margin: 2em auto;">
            <p>Druga chroniona strona aplikacji.</p>
        </div>	

    </body>
</html>