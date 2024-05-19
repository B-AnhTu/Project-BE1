<?php
require_once '../model/danhmuc_db.php';
require_once '../model/sanpham_db.php';
$danhmuc_db = new DanhMuc_DB();
$sanpham_db = new SanPham_DB();
if (isset($_GET['keyword'])) {
    $tukhoa = $_GET['keyword'];
}
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
            <li><a href="../admin/trangchu.php">Trang chủ</a></li>

            <li><a href="../admin/quanliSP.php">QLSP</a></li>
            <li><a href="../admin/quanliDM.php">QLDanhMuc</a></li>
        </ul>
        <form action="../view/timkiemSP.php" method="get" class="form-find">
            <input type="search" name="keyword" placeholder="Tìm kiếm">
            <input type="submit" value="Search" class="btnSubmit">
            <a href="../controller/logout.php"><input type="button" value="Logout" class="btnSubmit"></a>

        </form>

    </div>
    <?php
    if (isset($_SESSION['username'])) {
        echo '<div id="successMessage" class="alert alert-success">Chào mừng admin ' . $_SESSION['username'] . ' đã đăng nhập</div>';
    }
    ?>
    <script src="../public/js/script.js"></script>


</body>

</html>