<?php
require_once('config/DBConnection.php');
require_once('models/Author.php');
class AuthorService{

    public function getAllAuthor($sql){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();   //khởi tạo đối tượng PDO
        $sql = "select * from tacgia";
        $stmt = $conn->query($sql);
        
        $authors = [];
        while($row = $stmt->fetch()){
            $author = new Author($row['ma_tgia'],$row['ten_tgia'],$row['hinh_tgia']);
            array_push($authors,$author);
        }
      //  $conn=null; //đóng kết nối
        return $authors;
    }
    public function getById(){
        $dbConn = new DBConnection;
        $conn = $dbConn->getConnection();   //khởi tạo đối tượng PDO
      //  $stmt = $pdo->prepare('SELECT * FROM tacgia WHERE ma_tgia=:matacgia');
        //$stmt->execute($arguments);
        $id = $_GET['id'];
        // B2. Truy vấn
        $sql = "select * from tacgia where ma_tgia='$id'";
        $stmt = $conn->query($sql);

        $row = $stmt->fetch();
        $author = new Author($row['ma_tgia'],$row['ten_tgia'],$row['hinh_tgia']);
        //$conn=null; 
        return $author;
    }

    public function insert():void{
        $dbConn = new DBConnection;
        $conn = $dbConn->getConnection();
        $name = $_POST['txttentg'];   

        $sql = "insert into tacgia(ten_tgia) 
        values ('$name')";
        $stmt = $conn->query($sql);



        header('location:index.php?controller=Author&action=list');
    }

    public function update(array $arguments){
        $dbConn = new DBConnection;
        $conn = $dbConn->getConnection();

        $name = $_POST['txttentg'];  
        $id =$_POST['txtId'];
    
        $sql = "UPDATE tacgia
                SET ten_tgia = '$name'
                WHERE ma_tgia = '$id';";

        $stmt = $conn->query($sql);

        header('location:index.php?controller=Author&action=list');
    }

    public function delete(array $arguments){
        $dbConn = new DBConnection;
        $pdo = $dbConn->getConnection();

        $id =$_GET['id'];
    
        $sql = "delete from tacgia
                WHERE ma_tgia = '$id';";

        $stmt = $conn->query($sql);
        
        header('location:index.php?controller=Author&action=list');
    }
}

    ?>
