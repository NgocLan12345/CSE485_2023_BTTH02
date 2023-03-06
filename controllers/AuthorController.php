<?php
require_once('configs/DBConnection');
require_once('services/AuthorService.php');

class AuthorController
{
    public function list()
    {
        // Nhiệm vụ 1: Tương tác với Services/Models
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthor();
        // Nhiệm vụ 2: Tương tác với View
        include("views/author/list_author.php");
    }

    public function addauthor()
    {
        // Nhiệm vụ 1: Tương tác với Services/Models
        $authorService = new AuthorService();
        $authorService->insert();
        // Nhiệm vụ 2: Tương tác với View
        include("views/admin/authors/add_author.php");
    }

    public function editauthor()
    {
        // Nhiệm vụ 1: Tương tác với Services/Models

        $authorService = new AuthorService();
        $author = $authorService->getByID();
        
        // Nhiệm vụ 2: Tương tác với View
        include("views/admin/authors/edit_author.php");
    }
    public function updateauthor(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $authorService = new AuthorService();
        $authorService->update();
        // Nhiệm vụ 2: Tương tác với View
        include("views/author/edit_author.php");
    }

    public function deleteauthor()
    {
        // Nhiệm vụ 1: Tương tác với Services/Models
        $authorService = new AuthorService();
        $authorService->delete();
        include("views/admin/authors/delete_author.php");
    }
}

?>