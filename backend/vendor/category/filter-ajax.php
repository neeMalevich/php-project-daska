<?php
include __DIR__ . '/../function.php';

global $connect;

$material = $_POST['material'];
$color = $_POST['color'];
$maker = $_POST['maker'];
$priceMax = $_POST['price_max'];
$priceMin = $_POST['price_min'];

$category = $_POST['category'];

//debug($category);

$query = "SELECT * FROM products";
$conditions = [];

if (isset($color) && !empty($color) && is_array($color)){
    $conditions[] = "color_id IN (".implode(',',$color).")";
}

if (isset($category) && !empty($category)){
    $conditions[] = "category_id IN ($category)";
}

if (isset($material) && !empty($material) && is_array($material)){
    $conditions[] = "material_id IN (".implode(',',$material).")";
}

if (isset($maker) && !empty($maker) && is_array($maker)){
    $conditions[] = "maker_id IN (".implode(',',$maker).")";
}

if ($priceMax && $priceMin){
    $conditions[] = "price BETWEEN $priceMin AND $priceMax";
}

if (!empty($conditions)) {
    $query .= " WHERE " . implode(" AND ", $conditions);
}

$result = mysqli_query($connect, $query);

$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

if (!empty($products)) :
    foreach ($products as $product) : ?>

        <div class="product__item">
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
                <button class="whishlist" data-id="<?= $product['product_id']; ?>">
                    <img src="/assets/images/favorite.png" alt="">
                </button>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="sidebar__top">Нет товаров</div>
<?php endif; ?>