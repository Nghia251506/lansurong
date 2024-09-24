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
    $show = $data["show"];
    ?>
    <?php
    $isUpdate = !empty($show);
    ?>
    <h2 class="title-form" style="text-align: center;"><?php echo $isUpdate ? "Cập nhật " : "Thêm "; ?>lịch diễn</h2>
    <form method="POST" action="http://localhost/mvcphp/show/add">
        <input type="hidden" name="id" value="<?php echo !empty($show) ? $show->id : 0 ?>" required>
        <input type="text" name="title" placeholder="Tiêu đề" value="<?php echo !empty($show) ? $show->title : "" ?>" required></br>
        <input type="text" name="customer_name" placeholder="Tên khách" value="<?php echo !empty($show) ? $show->customer_name : "" ?>" required></br>
        <input type="text" name="customer_phone" placeholder="Số điện thoại" value="<?php echo !empty($show) ? $show->customer_phone : "" ?>" required></br>
        <input type="text" name="location" placeholder="Địa điểm" value="<?php echo !empty($show) ? $show->location : "" ?>" required></br>
        <input type="date" name="date" placeholder="Ngày diễn" value="<?php echo !empty($show) ? $show->date : "" ?>" required></br>
        <input type="number" name="price" step="1.0" placeholder="Giá tiền" value="<?php echo !empty($show) ? $show->price : "" ?>" required></br>
        <input type="text" name="category" placeholder="Hạng mục" value="<?php echo !empty($show) ? $show->category : "" ?>" required></br>
        <input type="text" name="description" placeholder="Ghi chú" value="<?php echo !empty($show) ? $show->description : "" ?>" required></br>
        <input type="submit" value="submit">
    </form>
</body>

</html>