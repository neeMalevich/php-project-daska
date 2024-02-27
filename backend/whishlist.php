<?php
require_once __DIR__ . '/vendor/components/header.php';
session_start();

if (!$_SESSION['user']) {
    header('Location: /login.php');
    exit;
}
?>
    <section class="s-collection">
        <div class="container">
            <h1 class="section-title">
                Мой аккаунт
            </h1>

            <div class="collection__wrapper">

                <?php include_once 'vendor/auth/sidebar.php' ?>

                <div class="catalog__inner wishlist">

                    <?php include __DIR__ . '/vendor/category/product-item.php'; ?>

                </div>

                <?php /*
                <div class="wishlist">
                    <div class="wishlist__img">
                        <img src="/assets/images/wishlist-accaunt.svg" alt="">
                    </div>
                    <div class="wishlist__title">Список избранного пуст</div>
                    <div class="wishlist__text">У вас пока нет товаров в списке желаний. <br> На странице «Товары» вы
                        найдете много интересных товаров.
                    </div>

                    <a href="/category.php" class="account__btn mt-55" type="submit">
                        <span>
                            Вернуться в магазин
                        </span>
                    </a>
                </div>
                */ ?>

            </div>

        </div>
    </section>

<?php require_once __DIR__ . '/vendor/components/footer.php'; ?>