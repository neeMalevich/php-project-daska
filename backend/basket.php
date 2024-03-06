<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /login.php');
    exit;
}
?>

<?php
require_once __DIR__ . '/vendor/components/header.php';

$baskets = get_basket($_SESSION['user']['id']);
//debug($baskets);
$basket_sum = array_shift($baskets);
?>

    <section class="s-collection">
        <div class="container">
            <h1 class="section-title tal s-basket">
                Корзина
            </h1>
            <?php if ($baskets) : ?>
                <div class="basket-wrapper">
                    <div class="card__top">
                        <span>Товар</span>
                        <span>Информация</span>
                    </div>
                    <div class="card__inner">
                        <?php foreach ($baskets as $product) : ?>

                            <div class="card">
                                <div class="card__left">
                                    <div class="card__img">
                                        <?php if ($product['image']) : ?>
                                            <img src="/assets/images/<?= $product['image']; ?>"
                                                 alt="<?= $product['name']; ?>">
                                        <?php else : ?>
                                            <img src="/assets/images/no-image.jpg" alt="Нет фото">
                                        <?php endif; ?>
                                    </div>
                                    <div class="card__content">
                                        <div class="card__title">
                                            <?= $product['name']; ?>
                                        </div>
                                        <div class="card__info">
                                            <div class="card__info-item">Цвет: <?= $product['color_name']; ?></div>
                                            <div class="card__info-item">Материал: <?= $product['material_name']; ?></div>
                                        </div>
                                        <div class="card__btns">
                                            <button class="card__btn" data-id="<?= $product['product_id']; ?>">Удалить
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card__right">

                                    <div class="quantity_inner" data-id="<?= $product['product_id']; ?>"
                                         data-start-pice="<?= $product['price']; ?>">
                                        <button class="bt_minus">
                                            <svg viewBox="0 0 24 24">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                        </button>
                                        <input type="text" value="<?= $product['count'] ?>" size="2" class="quantity"
                                               data-max-count="20"/>
                                        <button class="bt_plus">
                                            <svg viewBox="0 0 24 24">
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="card__price" data-price="<?= $product['price']; ?>">
                                        $ <?= $product['price']; ?></div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                    <div class="card__bottom">
                        <div class="card__full-price">Итого: <span><?= $basket_sum; ?></span> $</div>
                        <a href="checkout.php" class="card__btn">Оформить заказ</a>
                    </div>
                <div
            <?php else: ?>
                <div class="sidebar__top tac">Нет товаров</div>
            <?php endif; ?>
        </div>
    </section>

    <script src="/assets/js/ajax/cart.js"></script>

<?php require_once __DIR__ . '/vendor/components/footer.php'; ?>