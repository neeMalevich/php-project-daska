<?php
session_start();

include __DIR__ . '/../function.php';

global $connect;

$cart_add = $_POST['cart_add'];
$cart_remove = $_POST['cart_remove'];
$cart_count = $_POST['cart_count'];

if (isset($cart_add) && !empty($cart_add)) {
    $check_query = "SELECT count FROM product_order WHERE product_id = '$cart_add'";
    $check_result = mysqli_query($connect, $check_query);

    debug($check_result);
    if (mysqli_num_rows($check_result) > 0) {
        $row = mysqli_fetch_assoc($check_result);
        $count = $row['count'] + 1;

        $query = "UPDATE product_order SET count = '$count' WHERE product_id = '$cart_add'";
    } else {
        $query = "INSERT INTO product_order (product_id, count) VALUES ('$cart_add', 1)";
    }

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "Record inserted/updated successfully.";
    } else {
        echo "Error inserting/updating record: " . mysqli_error($connect);
    }
debug($result);
}




