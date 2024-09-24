<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách lịch diễn</title>
</head>

<body>
    <?php
    $data = $input["data"];
    $shows = $data["shows"];
    $totalPages = $data["totalPages"];
    $currentPage = $data["currentPage"];
    $customerName = $data["customer_name"] ?? "";
    $customerPhone = $data["customer_phone"] ?? "";
    ?>

    <h2 style="text-align: center;">Tìm kiếm lịch diễn</h2>
    <form method="POST" action="http://localhost/mvcphp/show/search" class="form-search">
        <input type="text" name="customer_name" placeholder="Tên khách hàng" class="input-search" value="<?php echo !empty($customerName) ? $customerName : "" ?>">
        <input type="text" name="customer_phone" placeholder="Số điện thoại" class="input-search" value="<?php echo !empty($customerPhone) ? $customerPhone : "" ?>">
        <input type="submit" value="Tìm kiếm" class="submit-search">
    </form>

    <h2 style="text-align: center;">Danh sách lịch diễn</h2>
    <table style="width:100%" border="1">
        <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Tên khách</th>
            <th>Số điện thoại</th>
            <th>Địa điểm</th>
            <th>Ngày diễn</th>
            <th>Giá tiền</th>
            <th>Hạng mục</th>
            <th>Ghi chú</th>
            <th>Action</th>
        </tr>
        <?php
        $index = 1 + ($currentPage - 1) * 10; // Cập nhật STT theo trang
        foreach ($shows as $show) : ?>
            <tr>
                <th><?= $index++ ?></th>
                <th><?= $show->title ?></th>
                <th><?= $show->customer_name ?></th>
                <th><?= $show->customer_phone ?></th>
                <th><?= $show->location ?></th>
                <th><?= $show->date ?></th>
                <th><?= $show->price ?></th>
                <th><?= $show->category ?></th>
                <th><?= $show->description ?></th>
                <th>
                    <a href="http://localhost/mvcphp/show/add/<?= $show->id ?>">Edit</a> ||
                    <a href="http://localhost/mvcphp/show/delete/<?= $show->id ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Delete</a>
                </th>
            </tr>
        <?php endforeach ?>
    </table>

    <!-- Phân trang -->
    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <!-- <a href="http://localhost/mvcphp/show/search?page=<?= $i ?>"></a> -->
            <form method="POST" action="http://localhost/mvcphp/show/search?page=<?= $i ?>" >
                <input type="hidden" name="customer_name" placeholder="Tên khách hàng"  value="<?php echo !empty($customerName) ? $customerName : "" ?>">
                <input type="hidden" name="customer_phone" placeholder="Số điện thoại"  value="<?php echo !empty($customerPhone) ? $customerPhone : "" ?>">
                <input type="submit" value="<?= $i ?>" class="submit-search">
            </form>
        <?php endfor; ?>
    </div>
</body>

</html>