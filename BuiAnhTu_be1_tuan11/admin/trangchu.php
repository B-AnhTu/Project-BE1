<?php
    session_start();
    include_once '../admin/header.php';
    


    //tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
    //nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
    if (!isset($_SESSION['username'])) {
        header('Location: ../view/dangnhap.php');
        $_SESSION['username'] = true;
    }
    $username = $_SESSION['username'];
    // hiển thị 4 sản phẩm trên 1 trang
    $perPage = 4; 				
    // Lấy số trang trên thanh địa chỉ
    $page = isset($_GET['page'])?$_GET['page']:1; 			
    // Tính tổng số dòng, ví dụ kết quả là 18
    $total = $sanpham_db->getTotalProduct();				
    // lấy đường dẫn đến file hiện hành
    $url = $_SERVER['PHP_SELF']."?";
    $offset = 2;

    $dssp = $sanpham_db->getAllSanPham($page, $perPage);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="../public/style.css" type="text/css">
</head>
<body>  
        <h1>Trang chủ</h1>
        <div class="container">
            <div class="row">
            <?php
                foreach ($dssp as $value) {
            ?>
                <div class="col-sm-3">
                    <div class="card-group">
                    <div class="card">
                        <img src="../public/img/<?php echo $value->image ?>" alt="">
                        <div class="card-body">
                            <h4 class="card-title"><a href="../view/chitietSP.php?ma=<?php echo $value->ma?>"><?php echo $value->ten?></a></h4>
                            <h5 class="card-text"><?php echo $value->gia?></h5>
                            <?php 
                                $str = $value->mota;
                                $limit = 50;
                                $mota = substr($str, 0, $limit);                                
                            ?>
                            <p class="card-text"><?php echo $mota?><a href="../view/chitietSP.php?ma=<?php echo $value->ma?>">[...]</a></p>
                            <a href="../controller/themGioHang.php?ma=<?php echo $value->ma ?>"><input type="button" class="btn btn-primary" value="Thêm vào giỏ"></a>
                        </div>
                    </div>
                    </div>
                    
                </div>
                <?php }?>
            </div>
            
        </div>
        <div class="pagination">
            <li>
            <?php
                echo $sanpham_db->getPaginationBar($url, $total, $page, $perPage, $offset);
            ?>
            </li>
        </div>
</body>
</html>