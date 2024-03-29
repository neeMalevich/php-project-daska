<?php
session_start();

include __DIR__ . '/../function.php';

global $connect;

$material = $_POST['material'];
$color = $_POST['color'];
$maker = $_POST['maker'];
$priceMax = $_POST['price_max'];
$priceMin = $_POST['price_min'];

$category = $_POST['category'];
$sort = $_POST['sort'];

$search = $_POST['search'];
$searchProject = $_POST['searchProject'];
$searchName = $_POST['searchName'];

$query = "SELECT * FROM products";
$conditions = [];

if (isset($color) && !empty($color) && is_array($color)) {
    $conditions[] = "color_id IN (" . implode(',', $color) . ")";
}

if (isset($category) && !empty($category)) {
    $conditions[] = "category_id IN ($category)";
}

if (isset($material) && !empty($material) && is_array($material)) {
    $conditions[] = "material_id IN (" . implode(',', $material) . ")";
}

if (isset($maker) && !empty($maker) && is_array($maker)) {
    $conditions[] = "maker_id IN (" . implode(',', $maker) . ")";
}

if ($priceMax && $priceMin) {
    $conditions[] = "price BETWEEN $priceMin AND $priceMax";
}

if (!empty($conditions)) {
    $query .= " WHERE " . implode(" OR ", $conditions);
}

if (isset($search) && !empty($search)) {
    switch ($search) {
        case !empty($searchName):
            $query = "SELECT * FROM products WHERE (name LIKE '%$search%' OR price LIKE '%$search%' OR description LIKE '%$search%')";
            break;
        case !empty($searchProject):
            $query = "SELECT * FROM products WHERE maker_id IN (SELECT maker_id FROM makers WHERE maker LIKE '%$search%')";
            break;
        case !empty($search):
            $query = "SELECT * FROM products WHERE maker_id IN (SELECT maker_id FROM makers WHERE maker LIKE '%$search%') OR (name LIKE '%$search%' OR price LIKE '%$search%' OR description LIKE '%$search%')";
            break;
    }
}

if (isset($sort) && !empty($sort)) {
    switch ($sort) {
        case 'price-low':
            $query .= " ORDER BY price ASC";
            break;
        case 'price-high':
            $query .= " ORDER BY price DESC";
            break;
        case 'sort-az':
            $query .= " ORDER BY name ASC";
            break;
        case 'sort-za':
            $query .= " ORDER BY name DESC";
            break;
    }
}

$result = mysqli_query($connect, $query);

$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

if (!empty($products)) :
    foreach ($products as $product) : ?>

        <?php include __DIR__ . '/product-item.php'?>

    <?php endforeach; ?>
<?php else: ?>
    <div class="sidebar__top">Нет товаров</div>
<?php endif; ?>