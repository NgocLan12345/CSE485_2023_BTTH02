<?php
include("configs/DBConnection.php");
include("models/Article.php");
class ArticleService{
    public function getAllArticles(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql =' SELECT baiviet.*,theloai.ten_tloai,tacgia.ten_tgia 
                                FROM baiviet, theloai, tacgia 
                                WHERE baiviet.ma_tloai = theloai.ma_tloai and baiviet.ma_tgia=tacgia.ma_tgia
                                ORDER BY ma_bviet ASC';
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'],$row['ma_tloai'],$row['ten_tloai'],
            $row['ma_tgia'],$row['ten_tgia'],$row['tomtat'],$row['noidung'],$row['ngayviet'],$row['hinhanh']);
            array_push($articles,$article);
        }
        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }
    public function getArticle(){
         // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();
       $id = $_GET['ma_bviet'];

        // B2. Truy vấn
        // $sql =' SELECT baiviet.*,theloai.ten_tloai,tacgia.ten_tgia 
        //                         FROM baiviet, theloai, tacgia 
        //                         WHERE baiviet.ma_tloai = theloai.ma_tloai and baiviet.ma_tgia=tacgia.ma_tgia and  ma_bviet = '$id'';
         $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'],$row['ma_tloai'],$row['ten_tloai'],
            $row['ma_tgia'],$row['ten_tgia'],$row['tomtat'],$row['noidung'],$row['ngayviet'],$row['hinhanh']);
            array_push($articles,$article);
        }
        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }
    public function addArticle():void{
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        // B2. Truy vấn
        $title = $_POST['txtTitle'];
        $name = $_POST['txtName'];  
        $category_id = $_POST['category_id']; 
        $author_id = $_POST['author_id'];   
        $summary = $_POST['summary'];  
        $content = $_POST['content']; 
        $date =$_POST['date']; 
        $img = $_FILES['image'];
        $file_name = basename($img['name']);
        $folder = '../images/songs/';
        $path_file = $folder . $file_name;
        move_uploaded_file($img['tmp_name'], $path_file);
        $sql = "insert into baiviet(tieude,ten_bhat,ma_tloai,ma_tgia,tomtat,noidung,ngayviet,hinhanh) 
        values ('$title', '$name', '$category_id', '$author_id', '$summary', '$content', '$date', '$file_name')";
        // B3. Xử lý kết quả    
        // Mảng (danh sách) các đối tượng Article Model
        header('location:index.php?controller=article&action=list');
    }

    public function deleteArticle():void{
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $id =$_GET['ma_bviet'];
        $sql = "delete from baiviet where ma_bviet = '$ma_bviet'";        
        $stmt = $conn->query($sql);
        
        //die($stmt);
        // Mảng (danh sách) các đối tượng Article Model
        header('location:index.php?controller=article&action=list');
    }
}