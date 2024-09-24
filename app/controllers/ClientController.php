<?php
class ClientController extends BaseController
{
    private $__clientModel, $__productModel, $__cartModel;
    public function __construct($conn)
    {
        $this->__clientModel = $this->initModel("ClientModel", $conn);
        $this->__productModel = $this->initModel("ProductModel", $conn);
        $this->__cartModel = $this->initModel("CartModel", $conn);
    }

    public function index()
    {
        $this->view("layouts/client", ["page" => "clients/Home"]);
    }

    

    public function notification()
    {
        $this->view("layouts/client", ["page" => "clients/Notifycation"]);
    }
    public function introduce()
    {
        $this->view("layouts/client", ["page" => "clients/Introduce"]);
    }
    public function service()
    {
        $this->view("layouts/client", ["page" => "clients/Service"]);
    }

    public function product()
    {
        $products = $this->__productModel->getAllProduct(); // Lấy tất cả sản phẩm
        $this->view("layouts/client", ["page" => "clients/Product", "products" => $products]); // Gọi view cho client
    }
    public function cart()
    {
        $cartItems = $this->__cartModel->getCartItems();
        $this->view("layouts/client", ["page" => "cart", "cartItems" => $cartItems]);
    }
    public function addToCart()
    {
        session_start();
        $productId = $_GET['product_id'];

        // Khởi tạo giỏ hàng nếu chưa tồn tại
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        if (isset($_SESSION['cart'][$productId])) {
            // Nếu có, tăng số lượng lên
            $_SESSION['cart'][$productId]['quantity']++;
            $quantity = $_SESSION['cart'][$productId]['quantity'];
            $this->__cartModel->updateCartItem($productId, $quantity);
        } else {
            // Nếu chưa, thêm sản phẩm mới vào giỏ hàng
            $product = $this->__productModel->getProductById($productId);
            if ($product) {
                $_SESSION['cart'][$productId] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'image_url' => $product->image_url,
                ];
                $this->__cartModel->addCartItem($productId, 1); // Thêm vào cơ sở dữ liệu
            }
        }

        // Chuyển hướng về trang giỏ hàng với thông báo
        header("Location: http://localhost/mvcphp/cart?added=true");
        exit();
    }


    public function buyNow()
    {
        $productId = $_GET['product_id'];
        // Xử lý thanh toán ngay, ví dụ thêm sản phẩm vào giỏ và điều hướng đến trang thanh toán
        $this->addToCart();  // Gọi hàm thêm vào giỏ hàng trước
        header("Location: http://localhost/mvcphp/checkout"); // Điều hướng đến trang thanh toán
        exit();
    }


    public function updateCart()
    {
        session_start();
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        if (isset($_SESSION['cart'][$productId])) {
            if ($quantity > 0) {
                $_SESSION['cart'][$productId]['quantity'] = $quantity;
                $this->__cartModel->updateCartItem($productId, $quantity);
            } else {
                // Nếu số lượng là 0, xóa sản phẩm khỏi giỏ hàng
                unset($_SESSION['cart'][$productId]);
            }
        }

        // Chuyển hướng về trang giỏ hàng
        header("Location: http://localhost/mvcphp/cart");
        exit();
    }


    public function removeFromCart()
    {
        session_start();
        $productId = $_POST['product_id'];

        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
            // Xóa sản phẩm khỏi cơ sở dữ liệu nếu cần
            // $this->__cartModel->removeCartItem($productId); // Thêm phương thức xóa nếu cần
        }

        // Chuyển hướng về trang giỏ hàng
        header("Location: http://localhost/mvcphp/cart");
        exit();
    }
}
