<?php

$connect = mysqli_connect('localhost', 'root', 'root', 'php-project-daska');

if (!$connect) {
    die('Ошибка подключения к базе данных');
}