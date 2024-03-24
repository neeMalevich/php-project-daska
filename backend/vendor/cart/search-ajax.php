<?php
session_start();

include __DIR__ . '/../function.php';

global $connect;

$name = $_POST['name'];

$products = [];

if (!empty($name) && $name !== '') {
    $query = "SELECT * FROM products 
            WHERE name LIKE '%$name%' 
            OR price LIKE '%$name%' 
            OR description LIKE '%$name%'";

    $result = mysqli_query($connect, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }

    if (!empty($products)) :
        foreach ($products as $product) : ?>

            <div class="search-boxq__item">
                <div class="search-boxq__item-img">
                    <img src="/assets/images/<?= $product['image']; ?>" alt="<?= $product['name']; ?>">
                </div>
                <div class="search-boxq__item-content">
                    <div class="search-boxq__item-title">
                        <?= $product['name']; ?>
                    </div>
                    <?php if (isset($product['price'])) : ?>
                        <div class="price-new">
                            $ <?= $product['price']; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        <?php endforeach; ?>
    <?php else: ?>
        <div class="search-boxq__item">
            <div class="search-boxq__item-none tac">Нет товаров</div>
        </div>
    <?php endif;
}

?>