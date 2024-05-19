<?php
    include_once '../view/header.php';
    if (isset($_GET['keyword'])) {
        $tuKhoa = $_GET['keyword'];
        // hiển thị 3 sản phẩm trên 1 trang
        $perPage = 3; 				
        // Lấy số trang trên thanh địa chỉ
        $page = isset($_GET['page'])?$_GET['page']:1; 			
        // Tính tổng số dòng, ví dụ kết quả là 18
        $total = $sanpham_db->getTotalSearchProductName($tuKhoa);				
        // lấy đường dẫn đến file hiện hành
        $url = $_SERVER['PHP_SELF']."?keyword=".$tuKhoa;
        $offset = 2;

        $dssp = $sanpham_db->searchProductName($tuKhoa, $page, $perPage);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
    <link rel="stylesheet" href="../public/style.css" type="text/css">
</head>
<body>
        
        <h2>Kết quả tìm kiếm</h2>
        <div class="container">
            <div class="row">
            <?php
                foreach ($dssp as $key => $value) {
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
                echo $sanpham_db->getPaginationBar($url, $total, $page, $perPage, $offset);;
            ?>
            </li>
        </div>
        
</body>
</html>