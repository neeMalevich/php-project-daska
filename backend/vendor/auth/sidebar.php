<ul class="accaunt-sidebar">
    <li class="accaunt-sidebar__list">
        <a href="/profile.php" class="accaunt-sidebar__link <?= $_SERVER['REQUEST_URI'] == '/profile.php' ? ' _is-active' : ''; ?>">Контактные данные</a>
    </li>
    <li class="accaunt-sidebar__list">
        <a href="/whishlist.php" class="accaunt-sidebar__link <?= $_SERVER['REQUEST_URI'] == '/whishlist.php' ? ' _is-active' : ''; ?>">Избранное</a>
    </li>
    <form>
        <li class="accaunt-sidebar__list">
            <a href="/vendor/auth/logout.php" class="accaunt-sidebar__link">Выйти</a>
        </li>
    </form>
</ul>
