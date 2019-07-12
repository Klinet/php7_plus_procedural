<?php
session_start();
function logged_in()
{
    return isset($_SESSION["uid"]);
}


#region filters

$nev = filter_input(INPUT_POST,
    'nev',
    FILTER_SANITIZE_SPECIAL_CHARS);
$elfogad = filter_input(INPUT_POST,
    "elfogad",
    FILTER_SANITIZE_NUMBER_INT);
settype($elfogad, 'integer');
$cim = filter_input(INPUT_POST,
    'cim',
    FILTER_SANITIZE_SPECIAL_CHARS);
$tartalom = filter_input(INPUT_POST,
    'tartalom',
    FILTER_SANITIZE_SPECIAL_CHARS);
$fid = filter_input(INPUT_POST,
    'fid',
    FILTER_SANITIZE_NUMBER_INT);
$kid = filter_input(INPUT_POST,
    'kid',
    FILTER_SANITIZE_NUMBER_INT);
settype($kid, "integer");
if (is_null($fid)) {
    $fid = filter_input(INPUT_GET,
        'fid',
        FILTER_SANITIZE_NUMBER_INT);
}
settype($fid, "integer");
$szoveg = filter_input(INPUT_POST,
    "szoveg",
    FILTER_SANITIZE_SPECIAL_CHARS);

#endregion

#region POST events

#endregion

