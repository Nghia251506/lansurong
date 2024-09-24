<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Example</title>
    <style>
        .footer {
            display: flex;
            /* flex-direction: column; */
            align-items: center;
            background-color: #D9D9D9;
            color: black;
            padding: 20px;
        }

        .footer-contact {
            flex: 1;
            width: 100%;
            max-width: 800px;
            text-align: left;
        }

        .footer-contact h4 {
            margin-bottom: 10px;
        }

        .footer-contact p {
            margin: 5px 0;
        }

        .footer-contact a {
            color: black;
            /* Màu liên kết */
            text-decoration: none;
            /* Bỏ gạch chân */
        }

        .footer-contact a:hover {
            text-decoration: underline;
            /* Gạch chân khi hover */
        }

        .footer-logo {
            flex: 1;
            text-align: center;
        }

        .footer-logo img {
            max-width: 300px;
            border-radius: 50%;
        }

        .footer-bottom {
            text-align: center;
            padding: 10px;
            background-color: #e9ecef;
        }
    </style>
</head>

<body>

    <!-- Nội dung khác của trang -->

    <footer class="footer">
        <div class="footer-contact">
            <h4>Thông tin liên hệ</h4>
            <p><a href="tel:0123456789">Số điện thoại: 0934649950</a></p>
            <p><a href="mailto:info@example.com">Email: info@example.com</a></p>
            <p>Địa chỉ: 12 P. Cát Linh, Cát Linh, Đống Đa, Hà Nội, Việt Nam</p>
        </div>
        <div class="iframe">
            <!-- Google Map Iframe -->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.109757670627!2d105.83066977400905!3d21.028293887796977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9efaa14df7%3A0x350ca7549e2fb1b2!2zQsOtY2ggQ8OidSDEkOG6oW8gUXXDoW4!5e0!3m2!1svi!2s!4v1727099549743!5m2!1svi!2s"
                width="100%"
                height="300"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>
        <div class="footer-logo">
            <img src="http://localhost/mvcphp/app/assets/img/logo.jpg" alt="Logo">
        </div>
    </footer>
    <div class="footer-bottom">
        <p>Website được phát triển bởi Trọng Nghĩa Computer</p>
    </div>


</body>

</html>