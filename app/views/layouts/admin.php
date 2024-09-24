<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/mvcphp/app/assets/css/show.css">
    <link rel="stylesheet" href="http://localhost/mvcphp/app/assets/css/style.css">
    <link rel="stylesheet" href="http://localhost/mvcphp/app/assets/css/base.css">
    <link rel="stylesheet" href="http://localhost/mvcphp/app/assets/css/admin.css">
    <link rel="stylesheet" href="http://localhost/mvcphp/app/assets/css/alert.css">
    <link rel="stylesheet" href="http://localhost/mvcphp/app/assets/css/form_search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .sidebar {
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 15px;
            height: 120px;
            position: sticky;
            top: 0;
        }

        .header-sidebar {
            display: flex;
            justify-content: space-between;
        }

        .dropdown {
            position: relative;
            /* Để chứa các phần tử con ở vị trí tuyệt đối */
            cursor: default;
        }

        .dropdown-menu {
            display: none;
            /* Ẩn menu mặc định */
            position: absolute;
            left: 0;
            /* Đặt menu bên trái */
            top: 100%;
            /* Xuống dưới nút toggle */
            background-color: white;
            border: 1px solid #ccc;
            z-index: 1000;
            padding: 10px;
            /* Thêm padding cho menu */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            /* Thêm bóng cho menu */
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            /* Hiển thị menu khi hover vào dropdown */
        }

        .dropdown-menu li {
            list-style: none;
            /* Ẩn dấu đầu dòng */
        }

        .dropdown-menu li a {
            text-decoration: none;
            /* Ẩn gạch chân */
            padding: 8px 12px;
            /* Thêm padding cho các mục menu */
            display: block;
            /* Hiển thị mục menu như một khối */
        }

        .dropdown-menu li a:hover {
            background-color: #f0f0f0;
            /* Thay đổi màu nền khi hover vào mục menu */
        }

        .pagination {
            text-align: center;
            margin-top: 20px;
        }

        .pagination a {
            margin: 0 5px;
            padding: 8px 12px;
            border: 1px solid #007bff;
            color: #007bff;
            text-decoration: none;
        }

        .pagination a.active {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <div class="grid wide">
        <?php
        $this->view("layouts/header");

        $this->view($input["page"], ["data" => $input]);
        ?>
    </div>
</body>

</html>