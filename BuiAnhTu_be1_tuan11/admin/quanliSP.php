<?php
require_once '../admin/header.php';
// hiển thị 5 sản phẩm trên 1 trang
$perPage = 5;
// Lấy số trang trên thanh địa chỉ
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// Tính tổng số dòng, ví dụ kết quả là 18
$total = $sanpham_db->getTotalProduct();
// lấy đường dẫn đến file hiện hành
$url = $_SERVER['PHP_SELF'] . "?";
$offset = 2;

$dssp = $sanpham_db->getAllSanPham($page, $perPage);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QLSP</title>
</head>

<body>

  <h1>Quản lí sản phẩm</h1><br>
  <?php
  if (isset($_GET['msg1']) == "insert") {
    echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Thêm sản phẩm thành công!
            </div>";
  }
  if (isset($_GET['msg2']) == "update") {
    echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Cập nhật sản phẩm thành công!
            </div>";
  }
  if (isset($_GET['msg3']) == "delete") {
    echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Xóa sản phẩm thành công!
            </div>";
  }
  ?>
  <div class="noidung">
    <form action="../controller/themSanPham.php" method="get">
      <label for="ma">Mã sản phẩm: </label><br>
      <input type="text" name="ma" placeholder="Nhập mã sản phẩm"><br>

      <label for="ten">Tên sản phẩm: </label><br>
      <input type="text" name="ten" placeholder="Nhập tên sản phẩm"><br>

      <label for="ma">Giá: </label><br>
      <input type="text" name="gia" placeholder="Nhập giá sản phẩm"><br>

      <label for="ma">Mô tả: </label><br>
      <input type="text" name="mota" placeholder="Nhập mô tả"><br>

      <label for="ma">Mã danh mục: </label><br>
      <input type="text" name="madanhmuc" placeholder="Nhập mã danh mục"><br>
      <input type="submit" class="btnSubmit" value="Thêm">
    </form>
  </div>
  <table>
    <thead>
      <tr>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Mô tả</th>
        <th>Mã danh mục</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
        foreach ($dssp as $value) {
          ?>
          <td><?php echo $value->ma ?></td>
          <td><?php echo $value->ten ?></td>
          <td><?php echo $value->gia ?></td>
          <td><?php echo $value->mota ?></td>
          <td><?php echo $value->madanhmuc ?></td>
          <td style="text-align: center">
            <a href="../admin/suaSP.php?editId=<?php echo $value->ma ?>" style="color:blue">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp |
            <a href="../controller/xoaSanPham.php?deleteId=<?php echo $value->ma ?>" style="color:red"
              onclick="confirm('Are you sure want to delete this record')">
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
            echo $sanpham_db->getPaginationBar($url, $total, $page, $perPage, $offset);
            ?>
        </li>
    </div></body>

</html>