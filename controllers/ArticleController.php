<?php
class ArticleController{
    // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        echo "Tương tác với Services/Models from Article";
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticle();
        $categoryService = new CategoryService();
        $authorService = new AuthorService();
        // Nhiệm vụ 2: Tương tác với View
        echo "Tương tác với View from Article";
        

        include("views/admin/articles/index.php");
    }

    public function add(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View

        $articleService = new ArticleService();
        $categoryService = new CategoryService();
        $authorService = new AuthorService();
        include("views/article/add_article.php");
    }

    public function list(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View
        include("views/article/list_article.php");
    }
}