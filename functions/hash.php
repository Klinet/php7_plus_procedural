<?php
function titkosit($jelszo)
{
    $str = "";
    for ($i = 1; $i <= MELYSEG; $i++) {
        $str .= "PASSWORD(";
    }
    $str .= "'$jelszo'";
    for ($i = 1; $i <= MELYSEG; $i++) {
        $str .= ")";
    }
    return $str;
}

function jelszoEllenorzes($jelszo, $minkbdb, $minnbdb, $minszdb, $minijdb)
{
    $kbdb = 0;
    $nbdb = 0;
    $szdb = 0;
    $ijdb = 0;
    for ($i = 0; $i < mb_strlen($jelszo); $i++) {
        if (mb_strpos(KB, $jelszo[$i]) !== false) {
            $kbdb++;
        } else
            if (mb_strpos(NB, $jelszo[$i]) !== false) {
                $nbdb++;
            } else
                if (mb_strpos(SZ, $jelszo[$i]) !== false) {
                    $szdb++;
                } else
                    if (mb_strpos(IJ, $jelszo[$i]) !== false) {
                        $ijdb++;
                    }
    }
    return $kbdb >= $minkbdb && $nbdb >= $minnbdb && $szdb >= $minszdb && $ijdb >= $minijdb;
}

function jelszogen()
{
    $jelszo = "";
    for ($i = 0; $i < 10; $i++) {
        $jelszo .= KARAKTEREK[rand(0, strlen(KARAKTEREK) - 1)];
    }
    return $jelszo;
}
