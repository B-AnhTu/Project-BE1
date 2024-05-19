<?php
     require_once '../model/sanpham_db.php';
     
     $sanpham_db = new SanPham_DB();

   // Delete record from table
   if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $sanpham_db->deleteSanPham($deleteId);
    header("Location: ../admin/quanliSP.php?msg3='delete'");
  }
?>