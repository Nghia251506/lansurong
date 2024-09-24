<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Sản Phẩm</title>
    <link rel="stylesheet" href="styles.css"> <!-- Kết nối file CSS nếu cần -->
</head>

<body>
    <?php
    $data = $input["data"];
    $products = $data["products"];
    ?>
    <div class="container">
        <h2 class="title">Sản Phẩm</h2>
        <div class="product-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-item">
                    <img src="http://localhost/mvcphp/<?php echo htmlspecialchars($product->image_url); ?>" alt="<?php echo htmlspecialchars($product->name); ?>">
                    <h3><?php echo htmlspecialchars($product->name); ?></h3>
                    <p>Giá: <?php echo htmlspecialchars(number_format($product->price, 0, ',', '.')); ?> VND</p>
                    <button onclick="window.location.href='http://localhost/mvcphp/client/cart/add?product_id=<?php echo $product->id; ?>'">Giỏ hàng</button>
                    <button onclick="window.location.href='http://localhost/mvcphp/client/cart/buy_now?product_id=<?php echo $product->id; ?>'">Mua ngay</button>

                </div>

            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>