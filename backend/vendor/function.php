<?php

require_once __DIR__ . '/config/db.php';

function debug($item){
    echo '<pre>';
    echo print_r($item);
    echo '</pre>';
}

function get_menu(){
    global $connect;

    $query = "SELECT id, name FROM categories";
    $result = mysqli_query($connect, $query);

    $menu = [];
    while ($row = mysqli_fetch_assoc($result)){
        $menu[$row['id']] = $row;
    }

    return $menu;
}