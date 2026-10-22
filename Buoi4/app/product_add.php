<?php
require_once 'model/product.php';

$pageTitle = 'Thêm sản phẩm';
$errors = [];
$name = '';
$price = '';
$quantity = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name'] ?? '');
    $price    = trim($_POST['price'] ?? '');
    $quantity = trim($_POST['quantity'] ?? '');

    if ($name === '') {
        $errors[] = 'Tên sản phẩm không được rỗng.';
    }
    if (!is_numeric($price) || $price <= 0) {
        $errors[] = 'Giá phải là số lớn hơn 0.';
    }
    if (filter_var($quantity, FILTER_VALIDATE_INT) === false || $quantity < 0) {
        $errors[] = 'Số lượng phải là số nguyên lớn hơn hoặc bằng 0.';
    }

    if (empty($errors)) {
        if (addProduct($name, (float)$price, (int)$quantity)) {
            header('Location: product_list.php?msg=' . urlencode('Thêm sản phẩm thành công.'));
            exit;
        }
        $errors[] = 'Không thể thêm sản phẩm, vui lòng thử lại.';
    }
}

require 'view/header.php';
?>

<h2>Thêm sản phẩm</h2>

<?php foreach ($errors as $e): ?>
    <p class="error"><?= htmlspecialchars($e) ?></p>
<?php endforeach; ?>

<form method="post" action="product_add.php">
    <p>
        <label>Tên sản phẩm:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
    </p>
    <p>
        <label>Giá:</label><br>
        <input type="text" name="price" value="<?= htmlspecialchars($price) ?>">
    </p>
    <p>
        <label>Số lượng:</label><br>
        <input type="text" name="quantity" value="<?= htmlspecialchars($quantity) ?>">
    </p>
    <button type="submit">Thêm</button>
    <a href="product_list.php">Quay lại</a>
</form>

<?php require 'view/footer.php'; ?>