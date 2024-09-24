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
    $product = $data["product"];
    ?>
    <?php
    // Nếu $product không rỗng, tức là đang chỉnh sửa
    $isUpdate = !empty($product);
    ?>

    <?php if ($isUpdate && !empty($product->image_url)): ?>
        <img src="<?php echo htmlspecialchars($product->image_url); ?>" alt="Ảnh sản phẩm hiện tại" width="100">
    <?php endif; ?>
    <h2 class="title-form" style="text-align: center;"><?php echo $isUpdate ? "Cập nhật " : "Thêm "; ?>Sản phẩm</h2>
    <form method="POST" action="http://localhost/mvcphp/product/add" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo !empty($product) ? $product->id : null ?>">
        <input type="text" name="name" placeholder="Tên sản phẩm" value="<?php echo !empty($product) ? $product->name : "" ?>"></br>
        <input type="number" step="1.0" name="price" placeholder="Giá tiền" value="<?php echo !empty($product) ? $product->price : "" ?>"></br>
        <input type="number" step="1.0" name="quantity" placeholder="Số lượng" value="<?php echo !empty($product) ? $product->quantity : "" ?>"></br>
        <input name="description" placeholder="Mô tả" value="<?php echo !empty($product) ? $product->description : "" ?>"></br>
        <input type="file" name="image" accept="image/*"></br>
        <input type="submit" value="submit">
    </form>
</body>

</html>