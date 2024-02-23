<?php
require_once __DIR__ . '/vendor/components/header.php';
session_start();

if (!$_SESSION['user']) {
    header('Location: /login.php');
    exit;
}

echo '<pre>';
echo print_r($_SESSION['user']);
echo '</pre>';
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

                    <?php if (isset($_SESSION['error_message']) && !empty($_SESSION['error_message'])): ?>
                        <div class="alert-danger _is-error account--error">
                            Ошибка обнавления информации о пользователи.
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['users_update']) && !empty($_SESSION['users_update']) && empty($_SESSION['error_message'])) : ?>
                        <div class="alert-danger _is-error account--success">
                            Информация обнавленена успешно.
                        </div>
                    <?php endif; ?>

                    <form class="account" action="/vendor/auth/account.php" method="POST" enctype="multipart/form-data">

                        <label for="username">Имя</label>
                        <input type="text" placeholder="Имя" value="<?= $_SESSION['user']['username']; ?>" id="username" name="username">

                        <label for="surname">Фамилия</label>
                        <input type="text" placeholder="Фамилия" value="<?= $_SESSION['user']['surname']; ?>" id="surname" name="surname" >

                        <label for="patronymic">Отчество</label>
                        <input type="text" placeholder="Отчество" value="<?= $_SESSION['user']['patronymic']; ?>" id="patronymic" name="patronymic" >

                        <label for="avatar">Изображение профиля</label>
                        <div class="image-input">
                            <?php if (isset($_SESSION['user']['avatar']) && !empty($_SESSION['user']['avatar'])) : ?>
                            <input type="file" name="avatar" id="imageInput">
                            <label for="imageInput" class="image-button" style="display: none;">
                                <i class="far fa-image"></i>
                                Выбрать изображение
                            </label>
                            <img src="uploads/<?= $_SESSION['user']['avatar']; ?>" class="image-preview" style="display: block;">
                            <span class="change-image" style="display: block;">Заменить изображение</span>
                            <?php else: ?>
                                <input type="file" name="avatar" id="imageInput">
                                <label for="imageInput" class="image-button">
                                    <i class="far fa-image"></i>
                                    Выбрать изображение
                                </label>
                                <img src="" class="image-preview">
                                <span class="change-image">Заменить изображение</span>
                            <?php endif; ?>
                        </div>

                        <label for="email">E-mail</label>
                        <input type="email" placeholder="E-mail" value="<?= $_SESSION['user']['email']; ?>" id="email" name="email">
                        <?php if (isset($_SESSION['error_message']['error_message']['email'])) : ?>
                            <div class="error-message"><?= $_SESSION['error_message']['error_message']['email']; ?></div>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['error_message']['error_message']['email'])) : ?>
                            <div class="error-message"><?= $_SESSION['error_message']['error_message']['email']; ?></div>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['error_message']['error_message']['email_validation'])) : ?>
                            <div class="error-message">
                                <?php echo $_SESSION['error_message']['error_message']['email_validation']; ?>
                            </div>
                        <?php endif; ?>

                        <label for="password">Действующий пароль</label>
                        <input type="password" placeholder="Действующий пароль" id="password" name="password">
                        <?php if (isset($_SESSION['error_message']['error_message']['password']) && !empty($_SESSION['error_message']['error_message']['password'])) : ?>
                            <div class="error-message"><?= $_SESSION['error_message']['error_message']['password']; ?></div>
                        <?php endif; ?>

                        <label for="password_new">Новый пароль</label>
                        <input type="password" placeholder="Новый пароль" id="password_new" name="password_new">
                        <?php if (isset($_SESSION['error_message']['error_message']['password_new']) && !empty($_SESSION['error_message']['error_message']['password_new'])) : ?>
                            <div class="error-message"><?= $_SESSION['error_message']['error_message']['password_new']; ?></div>
                        <?php endif; ?>

                        <label for="password_confirm">Повторите новый пароль</label>
                        <input type="password" placeholder="Повторите новый пароль" id="password_confirm" name="password_confirm" >
                        <?php if (isset($_SESSION['error_message']['error_message']['password_new']) && !empty($_SESSION['error_message']['error_message']['password_new'])) : ?>
                            <div class="error-message"><?= $_SESSION['error_message']['error_message']['password_new']; ?></div>
                        <?php endif; ?>

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

    <script src="/assets/js/profile.js"></script>
<?php
unset($_SESSION['error_message']);
unset($_SESSION['users_update']);
?>
<?php require_once __DIR__ . '/vendor/components/footer.php'; ?>