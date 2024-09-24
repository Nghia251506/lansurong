<?php
class ProductController extends BaseController
{
    private $__productModel;
    public function __construct($conn)
    {
        $this->__productModel = $this->initModel("ProductModel", $conn);
    }

    public function list()
    {
        $products = $this->__productModel->getAllProduct();
        $this->view("layouts/admin", ["page" => "products/listProduct", "products" => $products]);
    }


    public function add($id = 0)
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Lấy thông tin sản phẩm nếu có $id, nghĩa là đang chỉnh sửa
            if ($id > 0) {
                $product = $this->__productModel->getProductById($id);
                $this->view("layouts/admin", ["page" => "products/form_product", "product" => $product]);
            } else {
                // Thêm mới sản phẩm
                $this->view("layouts/admin", ["page" => "products/form_product"]);
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST["name"]);
            $description = trim($_POST["description"]);
            $price = trim($_POST["price"]);
            $quantity = trim($_POST["quantity"]);
            $image_url = null;  // Khởi tạo biến chứa đường dẫn ảnh

            // Kiểm tra nếu có file ảnh được upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $uploadDir = 'uploads/';

                // Tạo tên file duy nhất để tránh trùng lặp
                $fileName = time() . '_' . basename($_FILES['image']['name']);
                $uploadFile = $uploadDir . $fileName;

                // Di chuyển file tới thư mục đích
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                    // Nếu tải lên thành công, lưu đường dẫn file vào biến $image_url
                    $image_url = $uploadFile;
                } else {
                    echo "Có lỗi xảy ra khi tải file.";
                }
            } else {
                $image_url = !empty($product) ? $product->image_url : null;
            }

            // Xử lý thêm/sửa sản phẩm
            $id = trim($_POST["id"]);
            if ($id > 0) {
                if (!$image_url) {
                    $product = $this->__productModel->getProductById($id);
                    $image_url = $product->image_url;  // Giữ lại ảnh cũ
                }

                $this->__productModel->editProduct($name, $description, $price, $image_url,$quantity, $id);

                // Lưu thông báo vào session
                $_SESSION['success_message'] = "Sản phẩm đã được cập nhật thành công!";
            } else {
                $this->__productModel->saveProduct($name, $description, $price, $image_url,$quantity);

                // Lưu thông báo vào session
                $_SESSION['success_message'] = "Sản phẩm đã được thêm thành công!";
            }

            // Chuyển hướng về trang danh sách sản phẩm
            header("Location: http://localhost/mvcphp/product/list");
            exit();
        }
    }





    public function delete($id)
    {
        $this->__productModel->deleteProductById($id);
        header("Location: http://localhost/mvcphp/product/list");
    }
}
