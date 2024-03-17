<?php
require_once __DIR__ . '/vendor/components/header.php';
session_start();

if (!$_SESSION['user']) {
    header('Location: /login.php');
    exit;
}
?>

    <section class="s-collection">
        <div class="container">
            <h1 class="section-title">
                Мой аккаунт
            </h1>

            <div class="collection__wrapper">

                <?php include_once 'vendor/auth/sidebar.php' ?>

                <div class="account__wrapper">
                    <div class="account__title">
                        Добро пожаловать, <?= $_SESSION['user']['username']; ?>
                    </div>

                    <div class="alert-danger--wrapper"></div>
                    <?php if (isset($_SESSION['error_message']) && !empty($_SESSION['error_message'])): ?>
                        <div class="alert-danger _is-error account--error">
                            Ошибка обновления информации о пользователи.
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['users_update']) && !empty($_SESSION['users_update']) && empty($_SESSION['error_message'])) : ?>
                        <div class="alert-danger _is-error account--success">
                            Информация обновлена успешно.
                        </div>
                    <?php endif; ?>

                    <form id="account" class="account" action="/vendor/auth/account.php" method="POST" enctype="multipart/form-data">

                        <label for="username">Имя</label>
                        <input type="text" placeholder="Имя" value="<?= $_SESSION['user']['username']; ?>" id="username"
                               name="username">
                        <div class="error-message"></div>

                        <label for="avatar">Изображение профиля</label>
                        <?php
                        $avatar = get_user_avatar($_SESSION['user']);
                        ?>
                        <div class="file-input">
                            <input class="choose" type="file" name="avatar" accept="image/*">
                            <span class="button">Выбрать изображение</span>
                            <span class="label">файл не выбран</span>
                        </div>

                        <?php
                        if (!empty($avatar) && $avatar !== null) : ?>
                            <img class="imagess-preview" id="preview" src="<?= $avatar; ?>">
                        <?php else : ?>
                            <img class="imagess-preview" id="preview" src="">
                        <?php endif; ?>

                        <label for="email">E-mail</label>
                        <input type="email" placeholder="E-mail" value="<?= $_SESSION['user']['email']; ?>" id="email"
                               name="email" data-initial-value="<?= $_SESSION['user']['email']; ?>">
                        <div class="error-message"></div>

                        <label for="password">Действующий пароль</label>
                        <input type="password" placeholder="Действующий пароль" id="password" name="password">
                        <div class="error-message"></div>

                        <label for="password_new">Новый пароль</label>
                        <input type="password" placeholder="Новый пароль" id="password_new" name="password_new">
                        <div class="error-message"></div>

                        <label for="password_confirm">Повторите новый пароль</label>
                        <input type="password" placeholder="Повторите новый пароль" id="password_confirm"
                               name="password_confirm">
                        <div class="error-message"></div>

                        <button class="account__btn mt-55" type="submit">
                            <span>
                                Сохранить изменения
                            </span>
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </section>

    <?php if ($_SESSION['user']['register'] == 'success') : ?>
        <div class="modal-order show-modal-order">
            <div class="modal-order-content">
                <span class="close-button-order">×</span>
                <div class="modal_product_title">Пользователь успешно зарегистрирован</div>
            </div>
        </div>
    <?php endif; ?>

    <?php
    unset($_SESSION['user']['register']);
    unset($_SESSION['error_message']);
    unset($_SESSION['users_update']);
    ?>

    <script src="/assets/js/ajax/profile.js"></script>
<?php require_once __DIR__ . '/vendor/components/footer.php'; ?>