<?php
require_once '../view/header.php';
    if (isset($_GET['ma'])) {
        $maSP = $_GET['ma'];
        $sp = $sanpham_db->getSanPham($maSP);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
</head>
<body>
    <h1>Chi tiết sản phẩm</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card-group">
                    <div class="card">
                    <img src="../public/img/<?php echo $sp->image ?>" alt="">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $sp->ten?></h4>
                            <h5 class="card-text"><?php echo $sp->gia?></h5>
                            <p class="card-text"><?php echo $sp->mota?></p>
                            <a href="../controller/themGioHang.php?ma=<?php echo $sp->ma ?>"><input type="button" class="btn btn-primary" value="Thêm vào giỏ"></a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
</body>
</html>