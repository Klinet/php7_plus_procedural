<?php
function logged_in()
{
    return isset($_SESSION["uid"]);
}
