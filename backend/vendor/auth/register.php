<?php
session_start();

require_once __DIR__ . '/../config/db.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");

if (mysqli_num_rows($check_email) > 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => [
            'email' => "Такой E-mail уже существует"
        ],
        "fields" => ['email']
    ];

    echo json_encode($response);
    die();
}

$error_messages = [];

if ($username === '') {
    $error_messages['username'] = 'Поле "Имя" не заполнено';
}

if ($password === '') {
    $error_messages['password'] = 'Поле "Пароль" не заполнено';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_messages['email'] = 'Некорректный E-mail';
}

if ($password_confirm === '') {
    $error_messages['password_confirm'] = 'Поле "Повторите пароль" не заполнено';
}

if (!empty($error_messages)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => $error_messages,
        "fields" => array_keys($error_messages)
    ];

    echo json_encode($response);
    die();
}

if ($password === $password_confirm) {
    $password = md5($password);

    mysqli_query($connect, "INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES (NULL, '$username', '$email', '$password')");

    $response = [
        "status" => true,
        "message" => "Регистрация прошла успешно!",
    ];
    echo json_encode($response);
} else {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => [
            'password_confirm' => 'Пароли не совпадают'
        ],
        "fields" => ['password_confirm']
    ];
    echo json_encode($response);
}
?>