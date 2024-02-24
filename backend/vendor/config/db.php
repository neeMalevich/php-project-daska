<?php

$connect = mysqli_connect('localhost', 'root', 'root', 'green_oak');

if (!$connect) {
    die('Ошибка подключения к базе данных');
}