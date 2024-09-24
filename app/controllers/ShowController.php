<?php
class ShowController extends BaseController
{
    private $__showModel;
    public function __construct($conn)
    {
        $this->__showModel = $this->initModel("ShowModel", $conn);
    }

    public function list($page = 1)
    {
        $limit = 10; // Số lịch diễn trên mỗi trang
        $offset = ($page - 1) * $limit; // Tính offset
        $shows = $this->__showModel->getAllShow($limit, $offset);
        $totalShows = $this->__showModel->countAllShows();
        $totalPages = ceil($totalShows / $limit); // Tổng số trang

        $this->view("layouts/admin", [
            "page" => "shows/listShow",
            "shows" => $shows,
            "totalPages" => $totalPages,
            "currentPage" => $page
        ]);
    }

    public function add($id = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($id)) {
                $show = $this->__showModel->getShowById($id);
                $this->view("layouts/admin", ["page" => "shows/form_show", "show" => $show]);
            } else {
                $this->view("layouts/admin", ["page" => "shows/form_show"]);
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = trim($_POST["title"]);
            $description = trim($_POST["description"]);
            $date = trim($_POST["date"]);
            $location = trim($_POST["location"]);
            $price = trim($_POST["price"]);
            $category = trim($_POST["category"]);
            $customer_name = trim($_POST["customer_name"]);
            $customer_phone = trim($_POST["customer_phone"]);
            $id = trim($_POST["id"]);
            if ($id > 0) {
                $this->__showModel->editShow($title, $description, $date, $location, $price, $category, $customer_name, $customer_phone, $id);
            } else {
                $this->__showModel->saveShow($title, $description, $date, $location, $price, $category, $customer_name, $customer_phone);
            }
            header("Location: http://localhost/mvcphp/show/list");
        }
    }

    public function delete($id)
    {
        $this->__showModel->deleteShowById($id);
        header("Location: http://localhost/mvcphp/show/list");
    }

    public function search($page = 1) {
        $customerName = $_POST['customer_name'] ?? '';
        $customerPhone = $_POST['customer_phone'] ?? '';
    
        $limit = 10;
        $offset = ($page - 1) * $limit;
    
        $shows = $this->__showModel->searchShows($customerName, $customerPhone, $limit, $offset);
        
        // Lấy tổng số record để phân trang
        $totalShows = $this->__showModel->countShows($customerName, $customerPhone);
        $totalPages = ceil($totalShows / $limit);
    
        $this->view("layouts/admin", [
            "page" => "shows/listShow",
            "shows" => $shows,
            "totalPages" => $totalPages,
            "currentPage" => $page,
        ]);
    }
    
    
}
