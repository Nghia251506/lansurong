<?php
class ShowModel
{
    private $__conn;
    public function __construct($conn)
    {
        $this->__conn = $conn;
    }


    public function getAllShow($limit = 10, $offset = 0)
    {
        try {
            if (isset($this->__conn)) {
                $sql = "select * from shows order by id desc LIMIT :limit OFFSET :offset";
                $stmt = $this->__conn->prepare($sql);
                $stmt->bindParam("limit", $limit, PDO::PARAM_INT);
                $stmt->bindParam("offset", $offset, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }
            return null;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function countAllShows()
    {
        try {
            if (isset($this->__conn)) {
                $sql = "SELECT COUNT(*) FROM shows";
                $stmt = $this->__conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchColumn();
            }
            return 0;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }


    public function saveShow($title, $description, $date, $location, $price, $category, $customer_name, $customer_phone)
    {
        try {
            if (isset($this->__conn)) {
                $sql = "insert into shows (`title`,`description`,`date`,`location`, `price`, `category`, `customer_name`,`customer_phone`) values (:title, :description, :date, :location,:price,:category,:customer_name,:customer_phone) ";
                $stmt = $this->__conn->prepare($sql);
                $stmt->bindParam("title", $title, PDO::PARAM_STR);
                $stmt->bindParam("description", $description, PDO::PARAM_STR);
                $stmt->bindParam("date", $date, PDO::PARAM_STR);
                $stmt->bindParam("location", $location, PDO::PARAM_STR);
                $stmt->bindParam("price", $price, PDO::PARAM_STR);
                $stmt->bindParam("category", $category, PDO::PARAM_STR);
                $stmt->bindParam("customer_name", $customer_name, PDO::PARAM_STR);
                $stmt->bindParam("customer_phone", $customer_phone, PDO::PARAM_STR);
                $stmt->execute();
            }
            return null;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }


    public function editShow($title, $description, $date, $location, $price, $category, $customer_name, $customer_phone, $id)
    {
        try {
            if (isset($this->__conn)) {
                $sql = "update shows set title = :title, description = :description, date = :date, 
                    location = :location, price = :price,category = :category, 
                    customer_name = :customer_name, customer_phone = :customer_phone where id = :id";
                $stmt = $this->__conn->prepare($sql);
                $stmt->bindParam("title", $title, PDO::PARAM_STR);
                $stmt->bindParam("description", $description, PDO::PARAM_STR);
                $stmt->bindParam("date", $date, PDO::PARAM_STR);
                $stmt->bindParam("location", $location, PDO::PARAM_STR);
                $stmt->bindParam("price", $price, PDO::PARAM_STR);
                $stmt->bindParam("category", $category, PDO::PARAM_STR);
                $stmt->bindParam("customer_name", $customer_name, PDO::PARAM_STR);
                $stmt->bindParam("customer_phone", $customer_phone, PDO::PARAM_STR);
                $stmt->bindParam("id", $id, PDO::PARAM_INT);
                $stmt->execute();
            }
            return null;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function deleteShowById($id)
    {
        try {
            if (isset($this->__conn)) {
                $sql = "delete from shows where id = :id";
                $stmt = $this->__conn->prepare($sql);
                $stmt->bindParam("id", $id, PDO::PARAM_INT);
                $stmt->execute();
            }
            return null;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getShowById($id)
    {
        try {
            if (isset($this->__conn)) {
                $sql = "select * from shows where id = :id";
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


    public function searchShows($customerName, $customerPhone, $limit = 10, $offset = 0)
    {
        try {
            $sql = "SELECT * FROM shows WHERE 
                        (customer_name LIKE :customerName OR :customerName = '') AND 
                        (customer_phone LIKE :customerPhone OR :customerPhone = '') 
                        ORDER BY id desc
                        LIMIT :limit_page OFFSET :offset";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindValue(":customerName", '%' . $customerName . '%');
            $stmt->bindValue(":customerPhone", '%' . $customerPhone . '%');
            $stmt->bindParam(":limit_page", $limit, PDO::PARAM_INT);
            $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return [];
        }
    }
    
    public function countShows($customerName, $customerPhone)
    {
        try {
            $sql = "SELECT COUNT(*) as total FROM shows WHERE 
                        (customer_name LIKE :customerName OR :customerName = '') AND 
                        (customer_phone LIKE :customerPhone OR :customerPhone = '')";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindValue(":customerName", '%' . $customerName . '%');
            $stmt->bindValue(":customerPhone", '%' . $customerPhone . '%');
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ)->total;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }
}
