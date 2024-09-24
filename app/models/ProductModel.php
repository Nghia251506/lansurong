<?php
class ProductModel
{
    private $__conn;
    public function __construct($conn)
    {
        $this->__conn = $conn;
    }

    public function getALLProduct($limit = 10, $offset = 0)
    {
        try {
            if (isset($this->__conn)) {
                $sql = "select * from products order by id desc LIMIT :limit OFFSET :offset";
                $stmt = $this->__conn->prepare($sql);
                $stmt->bindParam("limit", $limit, PDO::PARAM_INT);
                $stmt->bindParam("offset", $offset, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }
            echo "no connection";
            return null;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }


    public function saveProduct($name, $description, $price, $image_url, $quantity)
    {
        try {
            if (isset($this->__conn)) {
                $sql = "INSERT INTO products (`name`, `description`, `price`, `image_url`, `quantity`) 
                    VALUES (:name, :description, :price, :image_url, :quantity)";
                $stmt = $this->__conn->prepare($sql);

                $stmt->bindParam("name", $name, PDO::PARAM_STR);
                $stmt->bindParam("description", $description, PDO::PARAM_STR);
                $stmt->bindParam("price", $price, PDO::PARAM_STR); 
                $stmt->bindParam("image_url", $image_url, PDO::PARAM_STR);
                $stmt->bindParam("quantity", $quantity, PDO::PARAM_INT);
                $stmt->execute();
                return true; // Trả về true nếu thành công
            }
        } catch (PDOException $ex) {
            error_log($ex->getMessage());
            return false; // Trả về false nếu có lỗi
        }
        return false; // Trả về false nếu kết nối không tồn tại
    }

    public function editProduct($name, $description, $price, $image_url,$quantity, $id)
    {
        try {
            if (isset($this->__conn)) {
                $sql = "UPDATE products 
                    SET name = :name, description = :description, price = :price, image_url = :image_url, quantity = :quantity 
                    WHERE id = :id";
                $stmt = $this->__conn->prepare($sql);

                $stmt->bindParam(":name", $name, PDO::PARAM_STR);
                $stmt->bindParam(":description", $description, PDO::PARAM_STR);
                $stmt->bindParam(":price", $price, PDO::PARAM_STR); // Giữ PDO::PARAM_STR nếu giá trị là DECIMAL
                $stmt->bindParam(":image_url", $image_url, PDO::PARAM_STR);
                $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();
                return true; // Trả về true nếu thành công
            }
        } catch (PDOException $ex) {
            // Log lỗi vào file thay vì echo
            error_log($ex->getMessage());
            return false; // Trả về false nếu có lỗi
        }
        return false; // Trả về false nếu kết nối không tồn tại
    }


    public function deleteProductById($id)
    {
        try {
            if (isset($this->__conn)) {
                $sql = "delete from products where id = :id";
                $stmt = $this->__conn->prepare($sql);
                $stmt->bindParam("id", $id, PDO::PARAM_INT);
                $stmt->execute();
            }
            return null;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getProductById($id)
    {
        try {
            if (isset($this->__conn)) {
                $sql = "select * from products where id = :id";
                $stmt = $this->__conn->prepare($sql);
                $stmt->bindParam("id", $id, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_OBJ);
            }
            return null;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}
