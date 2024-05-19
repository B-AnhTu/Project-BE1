<?php
    require_once '../admin/header.php';
    if (isset($_GET['editId'])) {
        $editId = $_GET['editId'];
        $sp = $sanpham_db ->getSanPham($editId);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sản Phẩm</title>
</head>
<body>

    <h1>Sửa sản phẩm</h1><br>
    <div class="noidung">
    <form action="../controller/suaSanPham.php" method="get">
        <label for="ma">Mã sản phẩm: </label><br>
        <input type="text" name="ma" value="<?php echo $sp->ma ?>"><br>

        <label for="ten">Tên sản phẩm: </label><br>
        <input type="text" name="ten" value="<?php echo $sp->ten ?>"><br>

        <label for="ma">Giá: </label><br>
        <input type="text" name="gia" value="<?php echo $sp->gia ?>"><br>

        <label for="ma">Mô tả: </label><br>
        <input type="text" name="mota" value="<?php echo $sp->mota ?>"><br>

        <label for="ma">Mã danh mục: </label><br>
        <input type="text" name="madanhmuc" value="<?php echo $sp->madanhmuc ?>"><br>
        <input type="submit" class="btnSubmit" value="Sửa">
    </form>
    </div>
    
</body>
</html>