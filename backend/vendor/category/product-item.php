<?php
session_start();

$whishlists_active = '';
if (array_key_exists($product['product_id'], get_whishlict_user($_SESSION['user']['id'])) == $product['product_id']) {
    $whishlists_active = ' _is-active';
}
?>

<div class="product__item <?= $_SERVER['REQUEST_URI'] == '/whishlist.php' ? ' product__item-whishlist' : ''; ?>">
    <div>
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
        <button class="card" data-id="<?= $product['product_id']; ?>">
            <img src="/assets/images/shopping_cart.png" alt="">
        </button>

        <button
            class="whishlist <?= $whishlists_active; ?>"
            data-id="<?= $product['product_id']; ?>"
            data-user_id="<?= isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : ''; ?>"
        >
            <img class="whishlist-noactiv" src="/assets/images/favorite.png" alt="">
            <img class="whishlist-isactiv" src="/assets/images/favorite-active.png" alt="">
        </button>

    </div>
</div>
