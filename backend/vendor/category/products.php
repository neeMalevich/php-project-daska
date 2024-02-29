<?php
$catId = isset($_GET['cat']) ? (int)$_GET['cat'] : null;

$products = get_products_by_category($catId);

if (!empty($products)) :
    foreach ($products as $product) : ?>

        <?php include __DIR__ . '/product-item.php'?>

    <?php endforeach; ?>
<?php else: ?>
    <div class="sidebar__top">Нет товаров</div>
<?php endif; ?>
