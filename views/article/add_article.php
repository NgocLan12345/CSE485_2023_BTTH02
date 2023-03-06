<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>
                <form action="?controller=article&action=add_process" method="post" enctype="multipart/form-data">
     
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblartName">Tiêu đề</span>
                        <input type="text" class="form-control" name="txtTitle" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblartName">Tên bài hát</span>
                        <input type="text" class="form-control" name="txtName" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Thể loại</span>
                        <select name="category_id" id="">
                            <?php foreach($categories as $){ ?>
                                <option value="<?= $each->getMaTLoai()?>">
                                    <?= $each->getTenTLoai()?>
                                </option>
                           <?php } ?>
                            
                        </select>
                    <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tác giả</span>
                        <select name="author_id" id="">
                        <?php foreach($authors as $each){ ?>
                                <option value="<?= $each->getMaTGia()?>">
                                    <?= $each->getTenTGia()?>
                                </option>
                           <?php } ?>
                            
                        </select> 
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblartName">Tóm tắt</span>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="summary"></textarea>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblartName">Nội dung</span>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="content"></textarea>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblartdate" >Ngày viết</span>
                        <input type="date" id="ngayviet" name="date">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblartName">Thêm hình ảnh</span>
                        <input type="file" class="form-control " name="image" accept="image/*" id="image"><br> 
                        <input type="submit" class="form-control " value="upload">
                    </div>

                    
                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
</main>

    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous">
    </script>
</body>

</html>