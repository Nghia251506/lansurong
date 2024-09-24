<?php

class CartModel
{
    private $__conn;

    public function __construct($conn)
    {
        $this->__conn = $conn;
    }

    public function getCartItems()
    {
        $sql = "SELECT c.quantity, p.name, p.price, p.image_url FROM cart c JOIN products p ON c.product_id = p.id";
        $stmt = $this->__conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function addCartItem($productId, $quantity)
    {
        $sql = "INSERT INTO cart_items (product_id, quantity) VALUES (?, ?)";
        $stmt = $this->__conn->prepare($sql);
        $stmt->bind_param("ii", $productId, $quantity);
        return $stmt->execute();
    }

    public function updateCartItem($productId, $quantity)
    {
        $sql = "UPDATE cart_items SET quantity = ? WHERE product_id = ?";
        $stmt = $this->__conn->prepare($sql);
        $stmt->bind_param("ii", $quantity, $productId);
        return $stmt->execute();
    }

    public function getCartItemByProductId($productId)
    {
        $sql = "SELECT * FROM cart_items WHERE product_id = ?";
        $stmt = $this->__conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
