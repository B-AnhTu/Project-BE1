<?php
session_start();

require_once '../model/user_db.php';
$user_db = new User_DB();

$message = ""; // Thông báo lỗi hoặc thành công

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    if (empty($email) || empty($password)) {
        $message = "Email và mật khẩu không được để trống!";
    } else {
        $user = $user_db->getUserByEmail($email);
        if ($user && $password === $user->matkhau) { // So sánh mật khẩu không mã hóa
            $_SESSION['username'] = $user->hoten;
            $_SESSION['user_role'] = $user->quyen; // Lưu quyền của người dùng vào session
            $redirectUrl = $user->quyen == 1 ? "../admin/trangchu.php" : "../view/trangchu.php";
            header("Location: $redirectUrl");
            exit();
        } else {
            $message = "Email hoặc mật khẩu không đúng!";
        }
    }
}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../public/style.css" type="text/css">
</head>
<body>
    <div class="container mt-5">
        <h2>Đăng nhập</h2>
        <?php if (!empty($message)) echo "<p class='alert alert-danger'>$message</p>"; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Nhập email" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
    </div>
</body>
</html>