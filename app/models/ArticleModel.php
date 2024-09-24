<?php

class ArticleModel{
    private $__conn;
    public function __construct($conn)
    {
        $this->__conn = $conn;
    }

    public function getHighlightedArticle() {
        // Giả sử bài viết đầu tiên là bài nổi bật
        $sql = "SELECT * FROM articles ORDER BY created_at DESC LIMIT 1";
        $stmt = $this->__conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getMainArticles($limit = 2) {
        // Lấy các bài viết chính, bỏ qua bài nổi bật
        $sql = "SELECT * FROM articles ORDER BY created_at DESC LIMIT :limit OFFSET 1";
        $stmt = $this->__conn->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // public function getCategoryArticles($category, $limit = 2) {
    //     // Lấy các bài viết theo chuyên mục
    //     $sql = "SELECT * FROM articles WHERE category = :category ORDER BY created_at DESC LIMIT :limit";
    //     $stmt = $this->__conn->prepare($sql);
    //     $stmt->bindParam(':category', $category);
    //     $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
    // }
}