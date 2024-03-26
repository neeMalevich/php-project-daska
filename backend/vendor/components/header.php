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

    <link rel="stylesheet" href="/assets/css/main.css">
    <script src="/assets/js/jquery-3.4.1.min.js"></script>

    <script src="/assets/js/ajax/search.js"></script>


</head>

<body>

<header class="header">
    <div class="container">
        <div class="header__inner">
            <a href="/" class="header__logo logo">
                <img src="/assets/images/logo.png" alt="Лого" class="logo-img">
            </a>

            <div class="search-boxq__inner">
                <div class="search-boxq">
                    <div class="custom-select-search">
                        <?php
                        $categories = get_categories();

                        $catId = isset($_GET['cat']) ? (int)$_GET['cat'] : null;
                        $category_name = get_category_by_id($catId);

                        ?>
                        <div class="select-button-search">
                            <button class="select-button">
                                <span class="selected-value-search"><?= $category_name ? $category_name : 'Категория'; ?></span>
                                <span class="arrow"></span>
                            </button>
                            <ul class="select-dropdown-search" role="listbox" id="select-dropdown-search">

                                <li role="option search_cat_all">
                                    <input type="radio" id="search_cat_all" name="" />
                                    <label for="search_cat_all">
                                        <i class="bx bxl-price-low"></i>
                                        Все категории
                                    </label>
                                </li>

                                <?php foreach ($categories as $category) : ?>
                                    <li role="option">
                                        <input type="radio" id="search_cat_<?= $category['id']; ?>" name="<?= $category['id']; ?>" />
                                        <label for="search_cat_<?= $category['id']; ?>">
                                            <i class="bx bxl-price-low"></i>
                                            <?= $category['name']; ?>
                                        </label>
                                    </li>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                    </div>

                    <input class="search-inputq" type="search" placeholder="Поиск...">
                    <button type="search" class="search-btnq">
                        <img src="/assets/images/search.svg" alt="Поиск" class="search-img">
                    </button>
                </div>
                <div class="search-boxq__result"></div>
            </div>

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
                        <?= get_wishlist_icon_by_count($_SESSION['user']); ?>
                    </li>
                    <li>
                        <?= get_cart_icon_by_count($_SESSION['user']); ?>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</header>