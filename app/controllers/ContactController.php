<?php
class ContactController extends BaseController
{
    private $__contactModel;

    public function __construct($conn)
    {
        $this->__contactModel = $this->initModel("ContactModel", $conn);
    }

    public function index()
    {
        $this->view("layouts/client", ["page" => "clients/Contact"]);
    }

    public function submit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST["name"]);
            $email = trim($_POST["email"]);
            $phone = trim($_POST["phone"]); 
            $subject = trim($_POST["subject"]);
            $message = trim($_POST["message"]);

            // Kiểm tra dữ liệu
            if (!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message)) {
                // Gọi hàm trong Model để lưu thông tin
                if ($this->__contactModel->saveContact($name, $email, $phone, $subject, $message)) {
                    echo "Tin nhắn của bạn đã được gửi thành công!";
                } else {
                    echo "Có lỗi xảy ra, vui lòng thử lại.";
                }
            } else {
                echo "Vui lòng điền đầy đủ thông tin.";
            }
        } else {
            header("Location: contact.html");
        }
    }
}
