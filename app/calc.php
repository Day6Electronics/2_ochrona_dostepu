<?php

require_once dirname(__FILE__) . '/../config.php';
include _ROOT_PATH . '/app/security/check.php';

function getParams(&$v1, &$v2, &$amp) {
    $v1 = isset($_REQUEST['v1']) ? $_REQUEST['v1'] : null;
    $v2 = isset($_REQUEST['v2']) ? $_REQUEST['v2'] : null;
    $amp = isset($_REQUEST['amp']) ? $_REQUEST['amp'] : null;
}

function validate(&$v1, &$v2, &$amp, &$info) {
    if (!(isset($v1) && isset($v2) && isset($amp))) {
        return false;
    }

    if ($v1 == "") {
        $info [] = 'Nie podano napięcia zasilania!';
    }
    if ($v2 == "") {
        $info [] = 'Nie podano napięcia przewodzenia!';
    }
    if ($amp == "") {
        $info [] = 'Nie podano prądu przewodzenia!';
    }
    if (count($info) != 0)
        return false;

    if (empty($info)) {
        if (!is_numeric($v1)) {
            $info [] = 'Błędny zapis napięcia zasilania!';
        }
        if (!is_numeric($v2)) {
            $info [] = 'Błędny zapis napięcia przewodzenia!';
        }
        if (!is_numeric($amp)) {
            $info [] = 'Błędny zapis prądu przewodzenia!';
        }
    }
    if (count($info) != 0)
        return false;

    if (empty($info)) {
        if ($v1 <= $v2) {
            $info [] = 'Wartość napięcia zasilania musi być większa od wartości napięcia przewodzenia!';
        }
    }
    if (count($info) != 0)
        return false;
    else
        return true;
}

function process(&$v1, &$v2, &$amp, &$info, &$resistor) {
    global $role;

    if ($role == 'admin') {
        $v1 = (double) $v1;
        $v2 = (double) $v2;
        $amp = (double) $amp;
    } else if ($v1 > 10) {
        $info [] = 'Tylko administrator może podać tak wysokie napięcie!';
    }
    if (count($info) != 0)
        return false;

    $resistor = ($v1 - $v2) / ($amp / 1000);
}

$v1 = null;
$v2 = null;
$amp = null;
$resistor = null;
$info = array();

getParams($v1, $v2, $amp);
if (validate($v1, $v2, $amp, $info)) {
    process($v1, $v2, $amp, $info, $resistor);
}
include 'calc_view.php';

