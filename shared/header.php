<?php
$menu_items = array(
   ["Rólunk", "index.php", "Rólunk", "Rövid subtitle"],
   ["Fórumok", "pages/forums.php", "HTML és CSS fórum valamint PHP is", "Rövid subtitle 2"]
);
include_once 'includes/init.php';
?>
    <!DOCTYPE html>
    <html lang="hu">
    <head>
        <title><?php echo seo($menu_items, SEO_TITLE); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo seo($menu_items, SEO_DESCRIPTION); ?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="navbar-nav mr-auto">

                        <?php
                        foreach ($menu_items as $menu_item) {
                            $css_class = $menu_item[1] === pageName() ? 'class="nav-item active"' : 'class="nav-item"';
                            echo '<li ' . $css_class . '><a class="nav-link" href="' . $menu_item[1] . '">' . $menu_item[0] . '</a></li>';
                        }
                        ?>

                    </ul>
                    <div class="nav navbar-right text-right">
                        <?php
                        if (!logged_in()) {
                            if (pageName() !== "signup.php" && pageName() !== "forg_passwd.php" && pageName() !== "profile_activate.php") {
                                ?>
                                <a class="btn btn-info" data-toggle="modal" data-target="#loginModal">Bejelentkezés</a>
                                <a class="btn btn-success" href="pages/signup.php">Regisztráció</a>
                                <?php
                            }
                        } else {
                            if (pageName() === "forums.php") {
                                ?>
                                <a class="btn btn-warning" data-toggle="collapse" data-target="#form">Új fórum</a>
                                <?php
                            } elseif (pageName() === "comments.php") {
                                ?>
                                <a class="btn btn-warning" data-toggle="collapse" data-target="#form">Új komment</a>
                                <?php
                            }
                            if ($_SESSION["uid"] == 1) {
                                ?>
                                <a class="btn btn-info" data-toggle="modal" data-target="#userModal">Felhasználó
                                    infok</a>
                                <?php
                            }
                            if (pageName() !== "profile.php") {
                                ?>
                                <a class="btn btn-info" href="pages/profile.php">Profil</a>
                                <?php
                            }
                            ?>
                            <a class="btn btn-info" href="index.php?event=logout">Kijelentkezés</a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>
