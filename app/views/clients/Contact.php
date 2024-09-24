<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link rel="stylesheet" href="http://localhost/mvcphp/app/assets/css/contact.css">
</head>

<body>
    <div class="body-contact">
        <div class="contact-container">
            <h2>Liên hệ với chúng tôi</h2>
            <form action="http://localhost/mvcphp/client/contact" method="POST" class="contact-form">
                <label for="name">Họ và tên:</label>
                <input type="text" id="name" name="name" placeholder="Nhập họ và tên của bạn" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>

                <label for="phone">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn" required>

                <label for="subject">Chủ đề:</label>
                <input type="text" id="subject" name="subject" placeholder="Chủ đề của bạn" required>

                <label for="message">Nội dung:</label>
                <textarea id="message" name="message" rows="4" placeholder="Nhập tin nhắn của bạn" required></textarea>

                <input type="submit" value="Gửi">
            </form>

        </div>
    </div>
</body>

</html>