<?php require_once __DIR__ . '/vendor/components/header.php'; ?>

    <section class="s-collection">
        <div class="container">
            <h1 class="section-title">
                Войти
            </h1>

            <form class="account" action="" method="POST">
                <label for="email">E-mail</label>
                <input type="email" placeholder="E-mail" id="email" name="email" required>

                <label for="password">Пароль</label>
                <input type="password" placeholder="Пароль" id="password" name="password" required>
                <a class="account__reset" href="#">Забыли пароль?</a>

                <button class="account__btn" type="submit">
            <span>
                Войти
            </span>
                </button>

                <a class="account__register" href="/register.php">Зарегистрироваться</a>
            </form>

        </div>
    </section>

    <?php if($_GET['register'] == 'success') : ?>
        <div class="modal-order show-modal-order">
            <div class="modal-order-content">
                <span class="close-button-order">×</span>
                <div class="modal_product_title">Пользователь <?= $_GET['email']; ?> зарегистрирован</div>
            </div>
        </div>
    <?php endif; ?>

<?php require_once __DIR__ . '/vendor/components/footer.php'; ?>