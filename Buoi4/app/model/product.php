<?php
require_once __DIR__ . '/../common/dbConnect.php';

// Lấy tất cả sản phẩm
function getAllProducts()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM products ORDER BY id ASC");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Lấy 1 sản phẩm theo id (không có thì trả về null)
function getProductById($id)
{
    global $conn;
    $stmt = mysqli_prepare($conn, "SELECT * FROM products WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);   // false nếu không có
}

// Thêm sản phẩm
function addProduct($name, $price, $quantity)
{
    global $conn;
    $stmt = mysqli_prepare($conn, "INSERT INTO products (name, price, quantity) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sdi', $name, $price, $quantity);
    return mysqli_stmt_execute($stmt);
}

// Cập nhật sản phẩm
function updateProduct($id, $name, $price, $quantity)
{
    global $conn;
    $stmt = mysqli_prepare($conn, "UPDATE products SET name = ?, price = ?, quantity = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'sdii', $name, $price, $quantity, $id);
    return mysqli_stmt_execute($stmt);
}

// Xóa sản phẩm
function deleteProduct($id)
{
    global $conn;
    $stmt = mysqli_prepare($conn, "DELETE FROM products WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    return mysqli_stmt_execute($stmt);
}