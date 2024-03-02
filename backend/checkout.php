<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /login.php');
    exit;
}
?>

<?php require_once __DIR__ . '/vendor/components/header.php'; ?>

    <section class="s-collection">
        <div class="container">
            <h1 class="section-title">
                Оформить заказ
            </h1>

            <form class="account">
                <div class="alert-danger"></div>

                <label for="tel">Телефон</label>
                <input type="tel" placeholder="Телефон" id="tel" name="tel" required>
                <div class="error-message"></div>

                <label for="data">Дата</label>
                <input type="date" id="data" name="data" required>
                <div class="error-message"></div>

                <label for="time">Время</label>
                <input type="time" id="time" name="time" required>
                <div class="error-message"></div>

                <label for="comment">Комментарий</label>
                <textarea name="comment" placeholder="Комментарий" id="comment" rows="5"></textarea>
                <div class="error-message"></div>

                <button id="account-login" class="account__btn mt-55" type="submit">
                    <span>
                        Подтвердить заказ
                    </span>
                </button>

                <a class="account__register" href="/basket.php">Вернуться в корзину</a>
            </form>

        </div>
    </section>

<?php require_once __DIR__ . '/vendor/components/footer.php'; ?>