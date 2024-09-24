<?php

class CustomerModel{
    private $__conn;
    public function __construct($conn)
    {
        $this->__conn = $conn;
    }

    public function findCustomerId($customer_name, $customer_phone){
        try {
            if (isset($this->__conn)) {
                $sql = "SELECT id FROM customers WHERE name = :customer_name AND phone = :customer_phone LIMIT 1";
                $stmt = $this->__conn->prepare($sql);
                $stmt->bindParam("customer_name", $customer_name, PDO::PARAM_STR);
                $stmt->bindParam("customer_phone", $customer_phone, PDO::PARAM_STR);
                $stmt->execute();
    
                // Kiểm tra xem có kết quả hay không
                if ($stmt->rowCount() > 0) {
                    return $stmt->fetchColumn(); // Trả về ID của khách hàng
                }
                return null; // Không tìm thấy khách hàng
            }
            return null;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return null;
        }
    }

    public function addCustomer($customer_name, $customer_phone){
        try {
            if (isset($this->__conn)) {
                $sql = "INSERT INTO customers (`name`, `phone`) VALUES (:customer_name, :customer_phone)";
                $stmt = $this->__conn->prepare($sql);
                $stmt->bindParam("customer_name", $customer_name, PDO::PARAM_STR);
                $stmt->bindParam("customer_phone", $customer_phone, PDO::PARAM_STR);
                $stmt->execute();
    
                // Trả về ID của khách hàng vừa thêm
                return $this->__conn->lastInsertId();
            }
            return null;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return null;
        }
    }
}