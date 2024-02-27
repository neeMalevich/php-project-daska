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

function get_products($id){
    global $connect;

    if($id){
        $query = "SELECT * FROM products where category_id IN($id) ORDER BY name";

    } else{
        $query = "SELECT * FROM products ORDER BY name";
    }

    $result = mysqli_query($connect, $query);

    $products = [];
    while ($row = mysqli_fetch_assoc($result)){
        $products[] = $row;
    }

    return $products;
}

function check_table_exists($table_name) {
    global $connect;

    $query = "SHOW TABLES LIKE '$table_name'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        return true; // Таблица существует
    } else {
        return false; // Таблица не существует
    }
}


function get_count_wishlists($user){
    global $connect;

    if (!$user){
        return false;
    }

    $query = "SELECT COUNT(user_id) AS wishlist_count FROM favorites WHERE user_id = $user";
    $result = mysqli_query($connect, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['wishlist_count'];

        return $count;
    } else {
        return false;
    }
}

function get_wishlist($user){
    if (!isset($user)){
        return '<a class="whishlist-btn" href="/login.php"><img src="/assets/images/whishlist.png" alt=""></a>';
    }

    $whishlistCount = get_count_wishlists($user['id']);
    $activeClass = ($whishlistCount > 0) ? '_is-active' : "";

    return '<a class="whishlist-btn ' . $activeClass . '" href="/whishlist.php">
        <img src="/assets/images/whishlist.png" alt="">
        <span class="whishlist-count">' . $whishlistCount . '</span>
    </a>';
}

function get_filter_column($table_name, $table_title_column)
{
    global $connect;

    $tableExists = check_table_exists($table_name);
    if (!$tableExists) {
        return false;
    }

    $query = "SELECT * FROM $table_name ORDER BY $table_title_column";
    $result = mysqli_query($connect, $query);

    $tableFilterColumn = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $row["filter_column"] = $table_title_column . '_' . $row[$table_title_column . '_id'];
        $tableFilterColumn[] = $row;
    }

    return $tableFilterColumn;
}

//function check_category_exists($categoryId)
//{
//    global $connect;
//
//    $categoryId = (int)$categoryId;
//
//    $query = "SELECT COUNT(*) FROM products WHERE category_id = $categoryId";
//    $result = mysqli_query($connect, $query);
//    $row = mysqli_fetch_array($result);
//
//    return $row[0] > 0;
//}