<?php
class ArticleController extends BaseController{
    private $__articleModel;

    public function __construct($conn)
    {
        // Khởi tạo model
        $this->__articleModel = $this->initModel("ArticleModel", $conn);
    }

    public function index(){
        // Lấy bài viết nổi bật
        $highlightedArticle = $this->__articleModel->getHighlightedArticle();
        
        // Lấy các bài viết chính
        $mainArticles = $this->__articleModel->getMainArticles();

        // Lấy bài viết theo các chuyên mục khác nhau
        // $categoryAArticles = $this->__articleModel->getCategoryArticles('A');
        // $categoryBArticles = $this->__articleModel->getCategoryArticles('B');
        // $categoryCArticles = $this->__articleModel->getCategoryArticles('C');
        // $categoryDArticles = $this->__articleModel->getCategoryArticles('D');
        
        // Truyền dữ liệu tới view
        $this->view("layouts/client", [
            "page" => "clients/Notifycation",
            "highlightedArticle" => $highlightedArticle,
            "mainArticles" => $mainArticles,
            // "categoryAArticles" => $categoryAArticles,
            // "categoryBArticles" => $categoryBArticles,
            // "categoryCArticles" => $categoryCArticles,
            // "categoryDArticles" => $categoryDArticles,
        ]);
    }
}
