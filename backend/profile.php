<?php require_once __DIR__ . '/vendor/components/header.php'; ?>

    <section class="s-collection">
        <div class="container">
            <h1 class="section-title">
                Мой аккаунт
            </h1>

            <div class="collection__wrapper">

                <?php include_once 'vendor/auth/sidebar.php' ?>

                <div class="account__wrapper">
                    <div class="account__title">
                        Добро пожаловать, Солнышко
                    </div>
                    <form class="account" action="" method="POST">

                        <label for="username">Имя</label>
                        <input type="text" placeholder="Имя" id="username" name="username" required>

                        <label for="email">E-mail</label>
                        <input type="email" placeholder="E-mail" id="email" name="email" required>

                        <label for="password">Действующий пароль</label>
                        <input type="password" placeholder="Действующий пароль" id="password" name="password" required>

                        <label for="password_new">Новый пароль</label>
                        <input type="password" placeholder="Новый пароль" id="password_new" name="password_confirm"
                               required>

                        <label for="password_confirm">Повторите новый пароль</label>
                        <input type="password" placeholder="Повторите новый пароль" id="password_confirm"
                               name="password_confirm" required>

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

<?php require_once __DIR__ . '/vendor/components/footer.php'; ?>