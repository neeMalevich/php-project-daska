<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /login.php');
    exit;
}
?>

<?php require_once __DIR__ . '/vendor/components/header.php'; ?>

<section class="s-collection">
    <div class="container">
        <h1 class="section-title tal">
            Корзина
        </h1>
        <div class="card__top">
            <span>Товар</span>
            <span>Информация</span>
        </div>
        <div class="card__inner">
            <div class="card">
                <div class="card__left">
                    <div class="card__img">
                        <img src="/assets/images/styl.png" alt="">
                    </div>
                    <div class="card__content">
                        <div class="card__title">Тумба Панормо</div>
                        <div class="card__info">
                            <div class="card__info-item">Цвет:</div>
                            <div class="card__info-item">Материал:</div>
                        </div>
                        <div class="card__btns">
                            <button class="card__btn">Удалить</button>
                        </div>
                    </div>
                </div>
                <div class="card__right">
                    <select class="select" name="format" id="format">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="3">4</option>
                    </select>

                    <div class="card__price">$ 475,00</div>
                </div>
            </div>
        </div>
        <div class="card__bottom">
            <div class="card__full-price">Итого: <span>1111</span> $</div>
            <a href="checkout.php" class="card__btn">Оформить заказ</a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/vendor/components/footer.php'; ?>