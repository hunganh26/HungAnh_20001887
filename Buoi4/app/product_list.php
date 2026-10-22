<?php
require_once 'model/product.php';

$pageTitle = 'Danh sách sản phẩm';
$products = getAllProducts();

require 'view/header.php';
?>

<h2>Danh sách sản phẩm</h2>

<?php if (isset($_GET['msg'])): ?>
    <p class="success"><?= htmlspecialchars($_GET['msg']) ?></p>
<?php endif; ?>

<?php if (isset($_GET['error'])): ?>
    <p class="error"><?= htmlspecialchars($_GET['error']) ?></p>
<?php endif; ?>

<table>
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Chức năng</th>
    </tr>

    <?php if (count($products) === 0): ?>
        <tr><td colspan="5">Chưa có sản phẩm nào.</td></tr>
    <?php else: ?>
        <?php foreach ($products as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= htmlspecialchars($p['name']) ?></td>
            <td><?= number_format($p['price'], 0, ',', '.') ?> đ</td>
            <td><?= $p['quantity'] ?></td>
            <td>
                <a href="product_edit.php?id=<?= $p['id'] ?>">[Sửa]</a>
                <a href="product_delete.php?id=<?= $p['id'] ?>">[Xóa]</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>

<?php require 'view/footer.php'; ?>