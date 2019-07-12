<?php

function pageName()
{
    return pathinfo(filter_input(INPUT_SERVER, "PHP_SELF"), PATHINFO_BASENAME);
}

function aktUrlFajlnev()
{
    return pathinfo(filter_input(INPUT_SERVER, "PHP_SELF"), PATHINFO_BASENAME);
}
