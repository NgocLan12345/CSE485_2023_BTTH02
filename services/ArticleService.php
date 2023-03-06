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
}