document.addEventListener("DOMContentLoaded", function() {
    var alertBox = document.getElementById("success-alert");

    if (alertBox) {
        // Hiển thị thông báo với hiệu ứng mờ dần
        alertBox.style.opacity = 1;

        // Sau 3 giây, giảm dần opacity rồi ẩn thông báo
        setTimeout(function() {
            alertBox.style.transition = "opacity 1s ease-out";
            alertBox.style.opacity = 0;

            // Xóa thông báo khỏi DOM sau khi ẩn
            setTimeout(function() {
                alertBox.remove();
            }, 1000);
        }, 3000);
    }
});
