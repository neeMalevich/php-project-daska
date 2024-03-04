<?php
$categories = get_categories();
?>

<?php foreach ($categories as $category) : ?>

    <div class="product__item">
        <a class="product__img">
            <?php if ($category['image']) : ?>
                <img src="/assets/images/<?= $category['image']; ?>"
                     alt="<?= $category['name']; ?>">
            <?php else : ?>
                <img src="/assets/images/no-image.jpg" alt="Нет фото">
            <?php endif; ?>
        </a>
        <a href="/category.php?cat=<?= $category['id']; ?>" class="product__title">
            <?= $category['name']; ?>
        </a>
    </div>

<?php endforeach; ?>
