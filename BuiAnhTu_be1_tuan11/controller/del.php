<?php
    session_start();

    if (isset($_GET['ma'])) {
        $ma = $_GET['ma'];
    }
    unset($_SESSION['cart'][$ma]);
    header('location: ../view/giohang.php?action=removed&ma='.$ma);
?>