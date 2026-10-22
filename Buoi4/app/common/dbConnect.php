<?php
$host   = 'localhost';
$user   = 'root';
$pass   = '';              // sửa theo máy của bạn
$dbname = 'shopping_cart';

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die('Kết nối database thất bại: ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');