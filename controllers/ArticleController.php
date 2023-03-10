<?php
require_once("configs/DBConnection.php");
include("services/ArticleService.php");
include("services/CategoryService.php");
include("services/AuthorService.php");
class ArticleController{
    // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticle();

        // Nhiệm vụ 2: Tương tác với View
        include("views/admin/articles/index.php");
    }

    public function addArticle(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $categoryService = new CategoryService();
        $categories = $categoryService->getAllCategory();
        
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthor();
        
        // Nhiệm vụ 2: Tương tác với View
        include("views/article/add_article.php");

    }

    public function list(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticles();
        // echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View
        include("views/article/list_article.php");
    }
}