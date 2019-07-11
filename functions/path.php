<?php
function logged_in()
{
    return isset($_SESSION["uid"]);
}

function pageName()
{
    return pathinfo(filter_input(INPUT_SERVER, "PHP_SELF"), PATHINFO_BASENAME);
}

