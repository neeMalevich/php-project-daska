<?php
session_start();

include __DIR__ . '/../function.php';

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>Экологичная мебель</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="/assets/css/app.min.css">
    <script src="/assets/js/jquery-3.4.1.min.js"></script>

</head>

<body>

<header class="header">
    <div class="container">
        <div class="header__inner">
            <a href="/" class="header__logo logo">
                <img src="/assets/images/logo.png" alt="" class="logo-img">
            </a>

            <div class="header__right">

                <?php include __DIR__ . '/menu.php'; ?>

                <ul class="header__users">
                    <li>
                        <a href="/login.php">
                            <?php if (isset($_SESSION['user']['avatar']) && !empty($_SESSION['user']['avatar'])) : ?>
                                <img class="header__users-img" src="uploads/<?= $_SESSION['user']['avatar']; ?>" alt="">
                            <?php else : ?>
                                <img src="/assets/images/profile.png" alt="">
                            <?php endif; ?>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/assets/images/whishlist.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/assets/images/card.png" alt="">
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</header>