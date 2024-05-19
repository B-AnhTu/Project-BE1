<?php
    session_start();
    require_once '../model/danhmuc_db.php';
    require_once '../model/sanpham_db.php';
    $danhmuc_db = new DanhMuc_DB();
    $sanpham_db = new SanPham_DB();
    if (isset($_GET['keyword'])) {
        $tukhoa = $_GET['keyword'];
    }

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="../public/style.css" type="text/css">
</head>
<body>
        <div class="navigation">
        <ul>
            <li><a href="../view/trangchu.php">Trang chủ</a></li>
            <?php
            $dsdm = $danhmuc_db->getAllDanhMuc();
            foreach ($dsdm as $key => $value) {
        ?>
            <li><a href="../view/hienthiSP.php?madanhmuc=<?php echo $value -> ma?>"><?php echo $value->ten?></a></li>
            <?php }?>
            <a class="cart" href="../view/giohang.php"><i style="font-size:28px; color:black" class="fa">&#xf07a;</i></a>
        </ul>
        <form action="../view/timkiemSP.php" method="get" class="form-find">
            <input type="search" name="keyword" placeholder="Tìm kiếm">
            <input type="submit" value="Search" class="btnSubmit">
            <a href="../view/dangnhap.php"><input type="button" value="Đăng nhập" class="btnSubmit"></a>
        </form>
        </div>
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