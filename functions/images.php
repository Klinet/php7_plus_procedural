<?php
function atmeretez($filename, $width, $height, $prefix)
{
    list($widthOriginal, $heightOriginal) = getimagesize(USER_IMG_DIR . "/" . $filename);
    if ($widthOriginal < $heightOriginal) {
        $width = $widthOriginal * $height / $heightOriginal;
    } else {
        $height = $heightOriginal * $width / $widthOriginal;
    }

    $kepOriginal = imagecreatefromjpeg(USER_IMG_DIR . "/" . $filename);

    $kepUj = imagecreatetruecolor($width, $height);

    imagecopyresized($kepUj, $kepOriginal, 0, 0, 0, 0, $width, $height, $widthOriginal, $heightOriginal);

    imagejpeg($kepUj, USER_IMG_DIR . "/" . $prefix . $filename, 100);
}

function kepfeltoltes($filename)
{
    if ($_FILES["upload"]["error"] === 0) {
        if ($_FILES["upload"]["type"] === "image/jpeg") {
            if ($_FILES["upload"]["size"] <= UPLOAD_MAX_FILESIZE) {
                if (is_uploaded_file($_FILES["upload"]["tmp_name"])) {
                    if (!is_dir(USER_IMG_DIR)) {
                        mkdir(USER_IMG_DIR);
                    }
                    if (move_uploaded_file($_FILES["upload"]["tmp_name"], USER_IMG_DIR . "/" . $filename)) {
                        atmeretez($filename, 100, 100, "kicsi_");
                        atmeretez($filename, 250, 250, "kozepes_");
                        atmeretez($filename, 800, 600, "nagy_");
                        unlink(USER_IMG_DIR . "/" . $filename);
                        return "Fájl feltöltése sikeres!";
                    } else {
                        return "Hiba a fájl tárolásakor!";
                    }
                } else {
                    return "Hiba a fájl tárolásakor!";
                }
            } else {
                return "Túl nagy fájlméret!";
            }
        } else {
            return "Hibás fájltípus!";
        }
    } else {
        return "Nincs fájl kiválasztva!";
    }
}
