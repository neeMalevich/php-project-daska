<?php
$menu = get_menu();
?>

<div class="Header-nav">
    <ul class="header__menu menu">
        <li>
            <a href="#">о нас</a>
        </li>

        <li class="dropdown-nav">
            <a class="dropdown-nav-btn" href="/category.php">товары</a>
            <ul class="No-list">
                <?php foreach($menu as $item) : ?>
                    <li>
                        <a href="/category.php?cat=<?= $item['id']; ?>">
                            <?= $item['name']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>


        <li>
            <a href="#">контакты</a>
        </li>
    </ul>
</div>
