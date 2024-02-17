<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: /profile.php');
    exit;
}
?>

<?php require_once __DIR__ . '/vendor/components/header.php'; ?>

    <section class="s-collection">
        <div class="container">
            <h1 class="section-title">
                Войти
            </h1>

            <form class="account">
                <div class="alert-danger"></div>

                <label for="email">E-mail</label>
                <input type="email" placeholder="E-mail" id="email" name="email" required>
                <div class="error-message"></div>

                <label for="password">Пароль</label>
                <input type="password" placeholder="Пароль" id="password" name="password" required>
                <div class="error-message"></div>

                <button id="account-login" class="account__btn mt-55" type="submit">
                    <span>
                        Войти
                    </span>
                </button>

                <a class="account__register" href="/register.php">Зарегистрироваться</a>
            </form>

        </div>
    </section>

<?php if ($_GET['register'] == 'success') : ?>
    <div class="modal-order show-modal-order">
        <div class="modal-order-content">
            <span class="close-button-order">×</span>
            <div class="modal_product_title">Пользователь <?= $_GET['email']; ?> зарегистрирован</div>
        </div>
    </div>
<?php endif; ?>

<?php require_once __DIR__ . '/vendor/components/footer.php'; ?>