<?php
function logged_in()
{
    return isset($_SESSION["uid"]);
}

$postEvent = filter_input(INPUT_POST,
    "event",
    FILTER_SANITIZE_SPECIAL_CHARS);

$getEvent = filter_input(INPUT_GET,
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

if ($postEvent === "login") {
    echo '<pre>';
    var_export($_POST);
    echo '</pre>';
    die();
    $sql = "SELECT uid FROM userek 
            WHERE email='$email' AND 
                  jelszo=" . titkosit($jelszo);
    $tabla = mysqli_query($dbc, $sql) or exit(mysqli_error($dbc));
    list($uid) = mysqli_fetch_row($tabla);
    if (isset($uid)) {
        $_SESSION['uid'] = $uid;
        $sql1 = "UPDATE userek 
                 SET tmp_jelszo = null 
                 WHERE uid = $uid";
        mysqli_query($dbc, $sql1);
        $uzenet = "Sikeres bejelentkezés!";
    } else { //vagy ideiglenes jelszóval
        $sql = "SELECT uid FROM userek 
                WHERE email='$email' AND 
                tmp_jelszo=" . titkosit($jelszo) . " AND
                NOT ISNULL(tmp_jelszo)";
        $tabla = mysqli_query($dbc, $sql) or exit(mysqli_error($dbc));
        list($uid) = mysqli_fetch_row($tabla);
        if (isset($uid)) {
            $_SESSION['tmp_uid'] = $uid;
            header("Location: " . URL . "aktivalas.php");
        } else {
            $uzenet = "Sikertelen bejelentkezés!";
        }
    }
}
