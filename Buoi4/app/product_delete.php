<?php
require_once 'model/product.php';

$pageTitle = 'Xóa sản phẩm';
$id = isset($_REQUEST['id']) ? (int)$_REQUEST['id'] : 0;

$product = getProductById($id);

// Sản phẩm không tồn tại
if (!$product) {
    header('Location: product_list.php?error=' . urlencode('Sản phẩm không tồn tại hoặc đã bị xóa.'));
    exit;
}

// Người dùng đã xác nhận -> xóa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (deleteProduct($id)) {
        header('Location: product_list.php?msg=' . urlencode('Xóa sản phẩm thành công.'));
    } else {
        header('Location: product_list.php?error=' . urlencode('Không thể xóa sản phẩm.'));
    }
    exit;
}

require 'view/header.php';
?>

<h2>Xác nhận xóa sản phẩm</h2>

<p>Bạn có chắc chắn muốn xóa sản phẩm sau?</p>
<ul>
    <li>ID: <?= $product['id'] ?></li>
    <li>Tên: <?= htmlspecialchars($product['name']) ?></li>
    <li>Giá: <?= number_format($product['price'], 0, ',', '.') ?> đ</li>
    <li>Số lượng: <?= $product['quantity'] ?></li>
</ul>

<form method="post" action="product_delete.php">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <button type="submit">Đồng ý xóa</button>
    <a href="product_list.php">Hủy</a>
</form>

<?php require 'view/footer.php'; ?>