<?php
session_start();

#region DB conn

$dbc = mysqli_connect(DB_HOST,
    DB_USER,
    DB_PASSWORD,
    DB_NAME);
mysqli_query($dbc, "SET NAMES utf8");

#endregion

#region events
$pEvent = filter_input(INPUT_POST,
    "event",
    FILTER_SANITIZE_SPECIAL_CHARS);
$gEvent = filter_input(INPUT_GET,
    'event',
    FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST,
    'email',
    FILTER_SANITIZE_SPECIAL_CHARS);
$jelszo = filter_input(INPUT_POST,
    'jelszo',
    FILTER_SANITIZE_SPECIAL_CHARS);
$jelszo1 = filter_input(INPUT_POST,
    'jelszo1',
    FILTER_SANITIZE_SPECIAL_CHARS);
$jelszo2 = filter_input(INPUT_POST,
    'jelszo2',
    FILTER_SANITIZE_SPECIAL_CHARS);
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

