<?php
class ContactModel
{
    private $__conn;

    public function __construct($conn)
    {
        $this->__conn = $conn;
    }

    public function saveContact($name, $email, $phone, $subject, $message) {
        try {
            $sql = "INSERT INTO contacts (`name`, `email`, `phone`, `subject`, `message`) VALUES (:name, :email, :phone, :subject, :message)";
            $stmt = $this->__conn->prepare($sql);
            $stmt->bindParam("name", $name);
            $stmt->bindParam("email", $email);
            $stmt->bindParam("phone", $phone);
            $stmt->bindParam("subject", $subject);
            $stmt->bindParam("message", $message);
            $stmt->execute();
            return true;
        } catch (PDOException $ex) {
            echo "Lỗi: " . $ex->getMessage();
            return false;
        }
    }
}
