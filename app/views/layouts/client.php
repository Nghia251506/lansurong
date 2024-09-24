<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lân sư rồng Thiếu Lâm Hồng Gia</title>
    <link rel="stylesheet" href="http://localhost/mvcphp/app/assets/css/base.css">
    <link rel="stylesheet" href="http://localhost/mvcphp/app/assets/css/client.css">
    <link rel="stylesheet" href="http://localhost/mvcphp/app/assets/css/product.css">
    <link rel="stylesheet" href="http://localhost/mvcphp/app/assets/css/reponsive.css">
    <link rel="stylesheet" href="http://localhost/mvcphp/app/assets/css/notifycation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        #button-introduce {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff0000;
            /* Màu nền */
            color: rgb(253, 253, 253);
            /* Màu chữ */
            text-decoration: none;
            /* Bỏ gạch chân */
            border-radius: 5px;
            /* Bo góc */
            transition: background-color 0.3s;
            /* Hiệu ứng chuyển đổi màu nền */
        }

        #button-introduce:hover {
            background-color: #18fd03;
            /* Màu nền khi hover */
        }

        .callnow {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff0000;
            /* Màu nền */
            color: rgb(253, 253, 253);
            /* Màu chữ */
            text-decoration: none;
            /* Bỏ gạch chân */
            border-radius: 5px;
            /* Bo góc */
            transition: background-color 0.3s;
            /* Hiệu ứng chuyển đổi màu nền */
        }

        .callnow:hover {
            background-color: #18fd03;
            color: white;
            /* Màu nền khi hover */
        }


        #user-menu {
            position: relative;
        }

        #user-name {
            cursor: pointer;
        }

        #dropdown {
            width: 130px;
            display: none;
            position: absolute;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        #user-menu:hover #dropdown {
            display: block;
        }

        #dropdown li {
            padding: 10px;
        }

        #dropdown li a {
            text-decoration: none;
            color: black;
        }

        #dropdown li:hover {
            background: #f0f0f0;
        }

        #header {
            background-color: var(--color-header);
            height: 100%;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
    </style>
</head>

<body>
    <div class="grid wide">
        <?php
        $this->view("layouts/headerClient");
        $this->view($input["page"], ["data" => $input]);
        $this->view("layouts/footer");
        ?>
    </div>
</body>

</html>