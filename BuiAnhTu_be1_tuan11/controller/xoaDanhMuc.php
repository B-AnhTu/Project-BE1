<?php
     require_once '../model/danhmuc_db.php';
     
     $danhmuc_db = new DanhMuc_DB();

   // Delete record from table
   if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $danhmuc_db->deleteDanhMuc($deleteId);
    header("Location: ../admin/quanliDM.php?msg3='delete'");
  }
?>