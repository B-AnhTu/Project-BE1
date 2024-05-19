<?php
session_start();

require_once '../view/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
</head>
<body>
    <div class="container">
        <?php
        if (!empty($_SESSION['cart'])) {
            echo "<div class='row'>";
            foreach ($_SESSION['cart'] as $id => $soluong) {
                $sanpham = $sanpham_db->getSanPham($id);
                ?>
                <div class="col-sm-3">
                    <div class="card-group">
                        <div class="card">
                            <img src="../public/img/<?php echo $sanpham->image ?>" alt="">
                            <div class="card-body">
                                <h4 class="card-title"><a href="../view/chitietSP.php?ma=<?php echo $sanpham->ma?>"><?php echo $sanpham->ten?></a></h4>
                                <h5 class="card-text"><?php echo $sanpham->gia?></h5>
                                <?php 
                                $str = $sanpham->mota;
                                $limit = 50;
                                $mota = substr($str, 0, $limit);
                                ?>
                                <p class="card-text"><?php echo $mota?><a href="../view/chitietSP.php?ma=<?php echo $sanpham->ma?>">[...]</a></p>
                                <a href="../controller/del.php?ma=<?php echo $sanpham->ma ?>"><input type="button" class="btn btn-primary" value="Xóa giỏ hàng"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            echo "</div>"; // Close row
        } else {
            echo "<p>Giỏ hàng trống</p>";
        }
        ?>
    </div>
</body>
</html>