<?php

session_start();

require_once __DIR__ . '/../config/db.php';

unset($_SESSION['error_message']);

$error_messages = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $surname = isset($_POST['surname']) ? $_POST['surname'] : null;
    $patronymic = isset($_POST['patronymic']) ? $_POST['patronymic'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $avatar = isset($_FILES['avatar']) ? $_FILES['avatar'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $password_new = isset($_POST['password_new']) ? $_POST['password_new'] : null;
    $password_confirm = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : null;

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_messages['error_message']['email_validation'] = 'Некорректный E-mail. Поле обязательно для заполнения';
    }

    $user_id = $_SESSION['user']['id'];
    $query = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($connect, $query);
    $user = mysqli_fetch_assoc($result);

    if (!empty($password)) {

        if (md5($password) == $user['password']) {
            if ($password_new == $password_confirm) {
                $hashed_password = md5($password_new);
                $update_query = "UPDATE users SET password='$hashed_password' WHERE id=$user_id";
                mysqli_query($connect, $update_query);

                $_SESSION['user']['password'] = $password;
                $_SESSION['users_update'] = 'success';
            } else {
                $error_messages['error_message']['password_new'] = 'Пароли не совпадают';
            }
        } else {
            $error_messages['error_message']['password'] = 'Неверный текущий пароль';
        }

    }

    if (!empty($username)) {
        $_SESSION['user']['username'] = $username;
    }

    if (!empty($surname)) {
        $_SESSION['user']['surname'] = $surname;
    }

    if (!empty($patronymic)) {
        $_SESSION['user']['patronymic'] = $patronymic;
    }

    if (!empty($avatar)) {
        $avatar_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $avatar['name'];

        if (move_uploaded_file($avatar['tmp_name'], $avatar_path)) {
            $_SESSION['user']['avatar'] = $avatar['name'];
        } else {
            $_SESSION['error_message']['avatar'] = "Ошибка пр загрузке изображения";
        }


    }

    if (!empty($email)) {
        $_SESSION['user']['email'] = $email;
        $_SESSION['users_update'] = 'success';

        $update_query = "UPDATE users SET username='$username', surname='$surname', patronymic='$patronymic', email='$email', avatar='$avatar_path' WHERE id=$user_id";
    }
//    else {
//        $update_query = "UPDATE users SET username='$username', surname='$surname', patronymic='$patronymic' WHERE id=$user_id";
//    }

    mysqli_query($connect, $update_query);

    $_SESSION['error_message'] = $error_messages;

    header('Location: /profile.php');
}