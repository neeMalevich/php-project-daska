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
                            <?php
                            $avatar = get_user_avatar($_SESSION['user']);
                            if (!empty($avatar) && $avatar !== null) : ?>
                                <img class="header__users-img" src="<?= $avatar; ?>" alt="">
                            <?php else : ?>
                                <img src="/assets/images/profile.png" alt="">
                            <?php endif; ?>
                        </a>
                    </li>
                    <li>
                        <?= get_wishlist($_SESSION['user']); ?>
                    </li>
                    <li>
                        <a href="/card.php">
                            <img src="/assets/images/card.png" alt="">
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</header>

<style>
    .whishlist-btn{
        position: relative;
    }
    .whishlist-btn._is-active .whishlist-count{
        display: flex;
    }
    .whishlist-count{
        display: none;
        position: absolute;
        width: 16px;
        height: 16px;
        background: #fff;
        right: 0;
        top: 12px;
        border-radius: 50%;
        color: #2B3B37;
        font-size: 12px;
        align-items: center;
        justify-content: center;
        box-shadow: -1px 2px 23px 0px rgba(0,0,0,0.75);
    }
</style>