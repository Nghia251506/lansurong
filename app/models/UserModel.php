<?php
    class UserModel{
        private $__conn;
        public function __construct($conn)
        {
            $this->__conn = $conn;
        }

        public function login($email, $pass){
            try{
                if(isset($this->__conn)){
                    $sql = "select * from users where email = :email AND password = :pass";
                    $stmt = $this->__conn->prepare($sql);
                    $stmt->bindParam("email", $email, PDO::PARAM_STR);
                    $stmt->bindParam("pass", $pass, PDO::PARAM_STR);
                    $stmt->execute();
                    return $stmt->fetch(PDO::FETCH_OBJ);
                }
                return null;
            }catch(PDOException $ex){
                echo $ex->getMessage();
            }
        }

        public function registerUser($name, $email, $password, $role) {
            try {
                if (isset($this->__conn)) {
                    $sql = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
                    $stmt = $this->__conn->prepare($sql);
                    $stmt->bindParam("name", $name, PDO::PARAM_STR);
                    $stmt->bindParam("email", $email, PDO::PARAM_STR);
                    $stmt->bindParam("password", $password, PDO::PARAM_STR);
                    $stmt->bindParam("role", $role, PDO::PARAM_STR);
                    $stmt->execute();
                }
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
        
    }

?>