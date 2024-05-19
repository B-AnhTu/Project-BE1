<?php
    require_once '../admin/header.php';
    if (isset($_GET['editId'])) {
        $editId = $_GET['editId'];
        $danhmuc = $danhmuc_db->getDanhMuc($editId);
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa danh mục</title>
</head>
<body>
    <h1>Sửa danh mục</h1>
<div class="noidung">
    <form action="../controller/suaDanhMuc.php" method="get">
        <label for="ma">Mã danh mục: </label><br>
        <input type="text" name="ma" value="<?php echo $danhmuc->ma?>"><br>

        <label for="ten">Tên danh mục: </label><br>
        <input type="text" name="ten" value="<?php echo $danhmuc->ten?>"><br>

        <label for="ghichu">Ghi chú: </label><br>
        <input type="text" name="ghichu" value="<?php echo $danhmuc->ghichu?>"><br>

        <input type="submit" class="btnSubmit" value="Sửa">
    </form>
    </div>
</body>
</html>