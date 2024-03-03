<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /login.php');
    exit;
}
?>

<?php require_once __DIR__ . '/vendor/components/header.php'; ?>

    <section class="s-collection chechout-wrapper">
        <div class="container">
            <h1 class="section-title">
                Оформить заказ
            </h1>


            <form action="/vendor/cart/checkout.php" method="POST" class="account">
                <?php if (isset($_SESSION['error_message']) && !empty($_SESSION['error_message'])): ?>
                    <div class="alert-danger _is-error account--error">
                        Ошибка оформление заказа.
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['users_update']) && !empty($_SESSION['users_update']) && empty($_SESSION['error_message'])) : ?>
                    <div class="alert-danger _is-error account--success">
                        Заказ оформлен
                    </div>
                <?php endif; ?>
                <div class="alert-danger"></div>

                <label for="tel">Телефон</label>
                <input type="tel" placeholder="Телефон" id="order_tel" name="tel" required>
                <?php if (isset($_SESSION['error_message']['error_message']['tel'])) : ?>
                    <div class="error-message"><?= $_SESSION['error_message']['error_message']['tel']; ?></div>
                <?php endif; ?>

                <label for="data">Дата</label>
                <input type="date" id="data" name="order_data" required>

                <label for="time">Время</label>
                <input type="time" id="time" name="order_time" required>

                <label for="comment">Комментарий</label>
                <textarea name="comment" placeholder="Комментарий" id="comment" rows="5"></textarea>

                <button class="account__btn mt-55" type="submit">
                    <span>
                        Подтвердить заказ
                    </span>
                </button>

                <a class="account__register" href="/basket.php">Вернуться в корзину</a>
            </form>


        </div>
    </section>

<?php
unset($_SESSION['error_message']);
unset($_SESSION['users_update']);

require_once __DIR__ . '/vendor/components/footer.php';
?>