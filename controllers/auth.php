<?php
include_once '../config/constants.php';
include_once '../includes/init.php';

$postEvent = filter_input(INPUT_POST,
    "event",
    FILTER_SANITIZE_SPECIAL_CHARS);

$getEvent = filter_input(INPUT_GET,
    'event',
    FILTER_SANITIZE_SPECIAL_CHARS);

$email = filter_input(INPUT_POST,
    'email',
    FILTER_SANITIZE_SPECIAL_CHARS);

$reg_email = filter_input(INPUT_POST,
    'reg_email',
    FILTER_SANITIZE_SPECIAL_CHARS);

$password = filter_input(INPUT_POST,
    'password',
    FILTER_SANITIZE_SPECIAL_CHARS);

$username = filter_input(INPUT_POST,
    'username',
    FILTER_SANITIZE_SPECIAL_CHARS);

if ($postEvent === "login") {
    $sql = "SELECT uid FROM userek 
            WHERE email='$email' AND 
                  jelszo=" . titkosit($jelszo);
    $tbl = mysqli_query($db_connect, $sql) or exit(mysqli_error($db_connect));
    list($uid) = mysqli_fetch_row($tbl);
    if (isset($uid)) {
        $_SESSION['uid'] = $uid;
        $sql1 = "UPDATE userek 
                 SET tmp_jelszo = null 
                 WHERE uid = $uid";
        mysqli_query($db_connect, $sql1);
        $uzenet = "Sikeres bejelentkezés!";
    } else { //vagy ideiglenes jelszóval
        $sql = "SELECT uid FROM userek 
                WHERE email='$email' AND 
                tmp_jelszo=" . titkosit($jelszo) . " AND
                NOT ISNULL(tmp_jelszo)";
        $tbl = mysqli_query($db_connect, $sql) or exit(mysqli_error($db_connect));
        list($uid) = mysqli_fetch_row($tbl);
        if (isset($uid)) {
            $_SESSION['tmp_uid'] = $uid;
            header("Location: " . URL . "aktivalas.php");
        } else {
            $uzenet = "Sikertelen bejelentkezés!";
        }
    }
}elseif ($postEvent === "signup"){
/*    echo $email;
    echo $username;
    echo $postEvent;*/

    $elfogad = 1;
    if ($elfogad !== 1) {
        $uzenet = "El kell fogadni a felhasználási feltételeket!";
    } else {

        /*$sql = "SELECT COUNT(*) AS db FROM userek
                WHERE email = '$email'";
        $tbl = mysqli_query($db_connect, $sql);
        list($db) = mysqli_fetch_row($tbl);
        
        if ($db > 0) {
            $uzenet = "Hiba! Már létezik ez az e-mail cím az adatbázisban! Adj meg egy másikat!";
        } else {*/ //Regisztrálható

            $jelszo1 = jelszogen();
            $jelszo2 = jelszogen();

            $sql = "INSERT INTO 
                        userek(email, 
                               nev, 
                               jelszo, 
                               tmp_jelszo) 
                        VALUES('$reg_email', 
                               '$username', 
                               " . titkosit($jelszo1) . ", 
                               " . titkosit($jelszo2) . ")";
            mysqli_query($db_connect, $sql);

            if (mysqli_query($db_connect, $sql)) {
                $last_id = mysqli_insert_id($db_connect);
                echo "New record created successfully. Last inserted ID is: " . $last_id;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($db_connect);
            }

            /*$sql = "SELECT uid, email FROM userek
    WHERE uid > 0";
            $users = mysqli_query($db_connect, $sql) or exit(mysqli_error($db_connect));;

            while ($row = mysqli_fetch_row($users)) {
                printf ("%s (%s)\n", $row[0], $row[1]);
            }
            mysqli_free_result($users);*/

/*            $targy = "Regisztráció aktiválása";
            $szoveg = "<h3>Kedves $nev</h3>";
            $szoveg .= "<p>Az új ideiglenes jelszavad: $jelszo2</p>";
            mail($email, $targy, $szoveg, createMailHeader());
            $uzenet = $szoveg;*/
        }
    /*}*/
}
