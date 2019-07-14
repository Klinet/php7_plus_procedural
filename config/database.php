<?php

$db_connect = mysqli_connect(DB_HOST,
    DB_USER,
    DB_PASSWORD,
    DB_NAME);
mysqli_query($db_connect, "SET NAMES utf8");

global $db_connect;

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
