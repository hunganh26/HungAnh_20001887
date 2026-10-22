<?php
require_once 'model/product.php';

$pageTitle = 'Sửa sản phẩm';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$product = getProductById($id);
if (!$product) {
    header('Location: product_list.php?error=' . urlencode('Sản phẩm không tồn tại.'));
    exit;
}

$errors = [];
$name     = $product['name'];
$price    = $product['price'];
$quantity = $product['quantity'];

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
        if (updateProduct($id, $name, (float)$price, (int)$quantity)) {
            header('Location: product_list.php?msg=' . urlencode('Cập nhật sản phẩm thành công.'));
            exit;
        }
        $errors[] = 'Không thể cập nhật sản phẩm, vui lòng thử lại.';
    }
}

require 'view/header.php';
?>

<h2>Sửa sản phẩm #<?= $id ?></h2>

<?php foreach ($errors as $e): ?>
    <p class="error"><?= htmlspecialchars($e) ?></p>
<?php endforeach; ?>

<form method="post" action="product_edit.php?id=<?= $id ?>">
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
    <button type="submit">Cập nhật</button>
    <a href="product_list.php">Quay lại</a>
</form>

<?php require 'view/footer.php'; ?>