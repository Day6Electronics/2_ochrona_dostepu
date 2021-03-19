<?php

require_once dirname(__FILE__) . '/../../config.php';

function getParamsLogin(&$form) {
    $form['login'] = isset($_REQUEST ['login']) ? $_REQUEST ['login'] : null;
    $form['pass'] = isset($_REQUEST ['pass']) ? $_REQUEST ['pass'] : null;
}

function validateLogin(&$form, &$info) {
    if (!(isset($form['login']) && isset($form['pass']))) {
        return false;
    }
    if ($form['login'] == "") {
        $info [] = 'Nie podano loginu';
    }
    if ($form['pass'] == "") {
        $info [] = 'Nie podano hasła';
    }
    if (count($info) > 0)
        return false;

    if ($form['login'] == "admin" && $form['pass'] == "admin") {
        session_start();
        $_SESSION['role'] = 'admin';
        return true;
    }
    if ($form['login'] == "user1" && $form['pass'] == "user1") {
        session_start();
        $_SESSION['role'] = 'user1';
        return true;
    }

    $info [] = 'Niepoprawny login lub hasło';
    return false;
}

$form = array();
$info = array();

getParamsLogin($form);

if (!validateLogin($form, $info)) {
    include _ROOT_PATH . '/app/security/login_view.php';
} else {
    header("Location: " . _APP_URL);
}
