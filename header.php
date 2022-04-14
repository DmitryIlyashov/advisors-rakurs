<?php
    session_start();
    if (isset($_SESSION['creation_time']) && ((time() - $_SESSION['creation_time']) > 600)) {
        header("location: includes/logout.inc.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Цифровые сервисы Schneider Electric</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/control.css">
    <link rel="stylesheet" href="css/start-button.css">
    <link rel="stylesheet" href="css/toggle-switch.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/main.css">
    <?php
        if (isset($_SESSION["creation_time"])) {
            $session_time_left = 600 - (time() - $_SESSION["creation_time"]);
            echo '<meta http-equiv="refresh" content="'.$session_time_left.';url=includes/logout.inc.php"/>';
        }
    ?>
</head>
<body>
    <a href="#question">
        <div class="question-button bg-dark text-light">?</div>
    </a>    
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-4 mb-2 mt-2">
                        <div class="header__logo">
                            <a class="header__logo-link" href="https://www.rakurs.su/" target="_blank">
                                <img class="logo__img" src="img/logo3.svg" alt="Ракурс">
                            </a>
                        </div>
                    </div>
                    <div class="col-8">
                        <nav class="menu header__menu text-rakurs">
                            <ul class="menu__list">
                                <?php
                                    if(strpos($_SERVER['REQUEST_URI'], 'about.php')) {
                                        echo    '<li class="menu__list-item menu__list-item--active">
                                                    <a class="menu__link" href="about.php">О проекте</a>
                                                </li>';
                                    }
                                    else {
                                        echo    '<li class="menu__list-item">
                                                    <a class="menu__link" href="about.php">О проекте</a>
                                                </li>';
                                    }
                                    if(isset($_SESSION["creation_time"])) {
                                        if(strpos($_SERVER['REQUEST_URI'], 'about.php')){
                                            echo    '<li class="menu__list-item">
                                                        <a class="menu__link" href="control.php">Назад</a>
                                                    </li>';
                                        }
                                        else {
                                            echo    '<li class="menu__list-item">
                                                        <a class="menu__link" href="includes/logout.inc.php">Выйти</a>
                                                    </li>';
                                        }
                                    }
                                    else {
                                        if(strpos($_SERVER['REQUEST_URI'], 'index.php')) {
                                            echo    '<li class="menu__list-item menu__list-item--active">
                                                        <a class="menu__link" href="index.php">Вход</a>
                                                    </li>';
                                        }
                                        else {
                                            echo    '<li class="menu__list-item">
                                                        <a class="menu__link" href="index.php">Вход</a>
                                                    </li>';
                                        }
                                    }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
