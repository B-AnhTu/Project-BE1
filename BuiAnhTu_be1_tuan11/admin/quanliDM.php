<?php
    require_once '../admin/header.php';

    $dsdm = $danhmuc_db ->getAllDanhMuc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QLDM</title>
</head>
<body>

    <h1>Quản lí danh mục</h1><br>
    <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Thêm danh mục thành công!
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Cập nhật danh mục thành công!
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Xóa danh mục thành công!
            </div>";
    }
  ?>
    <div class="noidung">
    <form action="../controller/themDanhMuc.php" method="get">
        <label for="ma">Mã danh mục: </label><br>
        <input type="text" name="ma" placeholder="Nhập mã danh mục"><br>

        <label for="ten">Tên danh mục: </label><br>
        <input type="text" name="ten" placeholder="Nhập tên danh mục"><br>

        <label for="ghichu">Ghi chú: </label><br>
        <input type="text" name="ghichu" placeholder="Nhập ghi chú"><br>

        <input type="submit" class="btnSubmit" value="Thêm">
    </form>
    </div>
    <table>
        <thead>
            <tr>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Ghi chú</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
                foreach ($dsdm as $value) {
            ?>
                <td><?php echo $value->ma?></td>
                <td><?php echo $value->ten?></td>
                <td><?php echo $value->ghichu?></td>
                <td>
                <a href="../admin/suaDM.php?editId=<?php echo $value->ma?>" style="color:blue">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
            <a href="../controller/xoaDanhMuc.php?deleteId=<?php echo $value->ma ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="pagination">
        <li>
            <?php
              echo $danhmuc_db->getPaginationBar($url, $total, $page, $perPage, $offset);
            ?>
        </li>
    </div>
</body>
</html>