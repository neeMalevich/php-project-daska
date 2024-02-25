<?php
$catId = isset($_GET['cat']) ? (int)$_GET['cat'] : null;

$products = get_products($catId);

if (!empty($products)) :
    foreach ($products as $product) : ?>

        <div class="product__item" data-id="<?= $product['product_id']; ?>">
            <div class="product__img">
                <?php if ($product['image']) : ?>
                    <img src="/assets/images/<?= $product['image']; ?>"
                         alt="<?= $product['name']; ?>">
                <?php else : ?>
                    <img src="/assets/images/no-image.jpg" alt="Нет фото">
                <?php endif; ?>
            </div>
            <div class="product__title">
                <?= $product['name']; ?>
            </div>
            <div class="product__price">
                <?php if ($product['price_old']) : ?>
                    <div class="price-old">$ <?= $product['price_old']; ?></div>
                    <div class="price-new">$ <?= $product['price']; ?></div>
                <?php else: ?>
                    <div class="price-new">$ <?= $product['price']; ?></div>
                <?php endif; ?>
            </div>
            <div class="product__feedback">
                <button class="card">
                    <img src="/assets/images/shopping_cart.png" alt="">
                </button>
                <button class="whishlist">
                    <img src="/assets/images/favorite.png" alt="">
                </button>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="sidebar__top">Нет товаров</div>
<?php endif; ?>
