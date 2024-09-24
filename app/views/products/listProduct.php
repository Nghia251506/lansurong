<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $data = $input["data"];
    $products = $data["products"];
    ?>
    <h2 style="text-align: center;">Danh sách sản phẩm</h2>
    <table style="width:100%" border="1">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Mô tả sản phẩm</th>
            <th>Giá tiền</th>
            <th>Số lượng</th>
            <th>Hình ảnh</th>
            <th>Action</th>
        </tr>
        <?php
        $index = 1;
        foreach ($products as $product) : ?>
            <tr>
                <th><?= $index++ ?></th>
                <th><?= $product->name ?></th>
                <th><?= $product->description ?></th>
                <th><?= $product->price ?></th>
                <th><?= $product->quantity ?></th>
                <th><?= $product->image_url ?></th>
                <th><a href="http://localhost/mvcphp/product/add/<?= $product->id ?>">Edit</a> || <a href="http://localhost/mvcphp/product/delete/<?= $product->id ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Delete</a></th>
            </tr>
        <?php endforeach ?>
    </table>
    <?php
    // Kiểm tra nếu có thông báo thành công
    if (isset($_SESSION['success_message'])) {
        echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';

        // Xóa thông báo sau khi hiển thị để tránh lặp lại khi reload trang
        unset($_SESSION['success_message']);
    }
    ?>
    <script src="http://localhost/mvcphp/app/assets/js/alert.js"></script>
</body>

</html>