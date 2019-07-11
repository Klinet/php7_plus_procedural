<?php
function seo($menu, $mit)
{
    $seoTag = "";
    $i = 0;
    do {
        if ($menu[$i][1] === pageName()) {
            $seoTag = $menu[$i][$mit];
        }
        $i++;
    } while ($i < count($menu) && empty($seoTag));
    return $seoTag;
}
