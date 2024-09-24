<?php
    class UserController extends BaseController{
        private $__userModel;
        public function __construct($conn)
        {
            $this->__userModel = $this->initModel("UserModel", $conn);
        }

        public function login (){
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $this->view("users/login");
            } else {
                $email = trim($_REQUEST["email"]);
                $pass = trim($_REQUEST["password"]);
                $user = $this->__userModel->login($email, $pass);
                if (isset($user) && $user) {
                    $role = $user->role;
                    // đăng nhập thành công thì lưu thông tin vào session
                    $_SESSION["user"] = $user;
                    if ($role == "admin") {
                        header("Location: http://localhost/mvcphp/admin/index");
                    }elseif ($role == "employee") {
                        header("Location: http://localhost/mvcphp/employee/index");
                    }
                     else {
                        header("Location: http://localhost/mvcphp/client/index");
                    }
                } else {
                    header("Location: http://localhost/mvcphp/user/login?error=true");
                }
            }
        }

        public function logout() {
            if (isset($_SESSION["user"])) {
                $role = $_SESSION["user"]->role;
                // đăng xuất thành công thì bỏ thông tin khỏi session
                $_SESSION["user"] = null;
                if ($role == "admin") {
                    header("Location: http://localhost/mvcphp/user/login");
                } else {
                    header("Location: http://localhost/mvcphp/client/index"); 
                }
            } else {
                header("Location: http://localhost/mvcphp/client/index"); 
            }
        }

        public function register() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = trim($_POST["name"]);
                $email = trim($_POST["email"]);
                $password = trim($_POST["password"]);
                $confirm_password = trim($_POST["confirm_password"]);
                
                // Kiểm tra mật khẩu và xác nhận mật khẩu có khớp không
                if ($password !== $confirm_password) {
                    // Thông báo lỗi nếu không khớp
                    echo "Mật khẩu không khớp. Vui lòng thử lại.";
                    return;
                }
        
                $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Mã hóa mật khẩu
                $role = 'customer'; // Vai trò mặc định là customer
        
                // Gọi model để lưu người dùng
                $this->__userModel->registerUser($name, $email, $password, $role);
        
                // Chuyển hướng đến trang đăng nhập hoặc trang khác
                header("Location: http://localhost/mvcphp/user/login");
            } else {
                $this->view("users/register");
            }
        }
        
        
    }




?>