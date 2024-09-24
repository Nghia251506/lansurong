<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="http://localhost/mvcphp/app/assets/css/cart.css">
</head>

<body>
    <?php
    if (isset($_GET['added']) && $_GET['added'] == 'true') {
        echo "<p style='color: green;'>Sản phẩm đã được thêm vào giỏ hàng!</p>";
    }
    ?>

    <h1>Giỏ hàng của bạn</h1>
    <table>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($cartItems)): ?>
                <?php foreach ($cartItems as $productId => $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td><?php echo htmlspecialchars(number_format($item['price'], 0, ',', '.')); ?> VND</td>
                        <td>
                            <form method="POST" action="http://localhost/mvcphp/cart/update">
                                <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="0">
                                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                <input type="submit" value="Cập nhật">
                            </form>
                        </td>
                        <td><?php echo htmlspecialchars(number_format($item['price'] * $item['quantity'], 0, ',', '.')); ?> VND</td>
                        <td>
                            <form method="POST" action="http://localhost/mvcphp/cart/remove">
                                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                <input type="submit" value="Xóa">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Giỏ hàng của bạn trống.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="checkout.php" class="pay">Thanh toán</a>
</body>

</html>