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
    <title>Đăng kí</title>
    <link rel="stylesheet" href="../public/style.css" type="text/css">

<body>
<div class="noidung">
    <h2>Đăng kí</h2>
    <form action="../controller/themUser.php" method="get">
        <label for="ten">Tên tài khoản: </label><br>
        <input type="text" name="ten" placeholder="Nhập tên tài khoản"><br>

        <label for="email">Email: </label><br>
        <input type="text" name="email" placeholder="Nhập email"><br>

        <label for="matkhau">Mật khẩu: </label><br>
        <input type="password" name="pass" placeholder="Nhập mật khẩu"><br>

        <input type="submit" class="btnDangKi" value="Tạo tài khoản">
    </form>
</body>
</html>