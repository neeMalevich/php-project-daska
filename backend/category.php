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

    <script>
        $(document).ready(function () {
            $(".product__item .whishlist").on("click", function () {
                const product_id = $(this).data("id");

                const isActive = $(this).hasClass("_is-active");

                if (<?= isset($_SESSION['user']) ? 'true' : 'false'; ?>) {
                    if (isActive) {
                        $(this).removeClass("_is-active");
                    } else {
                        $(this).addClass("_is-active");
                    }
                } else {

                    $(".modal-order").addClass("show-modal-order");
                }
            });
        });
    </script>

<?php require_once __DIR__ . '/vendor/components/footer.php'; ?>