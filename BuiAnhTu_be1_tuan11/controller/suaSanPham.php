<?php
    require_once '../model/sanpham_db.php';
    $sanpham_db = new SanPham_DB();

    $ma = $_GET['ma'];
    $ten = $_GET['ten'];
    $gia = $_GET['gia'];
    $mota = $_GET['mota'];
    $madanhmuc = $_GET['madanhmuc'];

    $sanpham_db->updateSanPham(new SanPham($ma, $ten, $gia, $mota, $madanhmuc));
    header("location: ../admin/quanliSP.php?msg2='update'");
?>