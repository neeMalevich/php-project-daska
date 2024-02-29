<?php
require_once __DIR__ . '/vendor/components/header.php';

?>

    <section class="s-collection">
        <div class="container">
            <h1 class="section-title">
                Специально подобранные товары
            </h1>
            <div class="catalog">

                <?php include __DIR__ . '/vendor/category/sidebar.php'; ?>

                <div class="catalog__wrapper">
                    <div class="catalog__inner">

                        <?php include __DIR__ . '/vendor/category/products.php'; ?>

                    </div>

                    <!--                    <div class="catalog__more">-->
                    <!--                        <span>Смотреть еще</span>-->
                    <!--                    </div>-->
                </div>
            </div>
    </section>

    <section class="s-banner catalog-banner">
        <div class="container">
            <div class="banner__img">
                <img src="/assets/images/banner.png" alt="">
                <div class="banner__img-title">скидка 10% на первую покупку</div>
            </div>
        </div>
    </section>

    <div class="modal-order">
        <div class="modal-order-content">
            <span class="close-button-order">×</span>
            <div class="modal_product_title">Для добавления товара в избранное необходимо войти в аккаунт</div>
            <a href="/login.php" class="btn-form" style="margin-top: 25px">Войти</a>
        </div>
    </div>

    <?php include __DIR__ . '/assets/js/ajax/whishlist.php'; ?>
    <?php include __DIR__ . '/assets/js/ajax/filter.php'; ?>
    <script src="/assets/js/ajax/cart.js"></script>

<?php require_once __DIR__ . '/vendor/components/footer.php'; ?>