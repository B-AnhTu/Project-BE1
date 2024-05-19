<?php
    require_once '../model/danhmuc_db.php';
    $danhmuc_db = new DanhMuc_DB();

    $ma = $_GET['ma'];
    $ten = $_GET['ten'];
    $ghichu = $_GET['ghichu'];

    $danhmuc_db->updateDanhMuc(new DanhMuc($ma, $ten, $ghichu));
    header("location: ../admin/quanliDM.php?msg2='update'");
?>