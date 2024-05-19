<?php
    require_once '../model/db.php';
    require_once '../model/danhmuc.php';

    class DanhMuc_DB extends Db{
        public function getAllDanhMuc(){
            $sql = self::$connection->prepare("SELECT * FROM tbl_danhmuc");
            $sql->execute();

            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

            $arrDanhMuc = array();
            foreach ($items as $key => $value) {
                $arrDanhMuc[] = new DanhMuc($value['ma'],$value['ten'],$value['ghichu']);
            }
            return $arrDanhMuc;

        }
        public function getDanhMuc($madanhmuc){
            $sql = self::$connection->prepare("SELECT * FROM tbl_danhmuc where ma = ?");
            $sql->bind_param("i",$madanhmuc);
            $sql->execute();

            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

            $arrDanhMuc = "";
            foreach ($items as $key => $value) {
                $arrDanhMuc = new DanhMuc($value['ma'],$value['ten'],$value['ghichu']);
            }
            return $arrDanhMuc;
        }
        //Thêm danh mục
        public function addDanhMuc($danhmuc){
            $stmt = self::$connection->prepare("INSERT INTO tbl_danhmuc VALUES (?,?,?)");
            $stmt->bind_param("iss", $danhmuc->ma, $danhmuc->ten, $danhmuc->ghichu);
            
            $stmt->execute();
        }
        //Sửa danh mục
        public function updateDanhMuc($danhmuc){
            $stmt = self::$connection->prepare("UPDATE tbl_danhmuc SET ten = ?, ghichu = ? WHERE ma = ?");
            $stmt->bind_param("ssi", $danhmuc->ten, $danhmuc->ghichu, $danhmuc->ma);
            $stmt->execute();
        }
        //Xóa danh mục dựa trên id
        public function deleteDanhMuc($id){
            $sql = self::$connection->prepare("DELETE FROM tbl_danhmuc WHERE ma = ?");
            $sql->bind_param("i", $id);
            $sql->execute();
        }
    }
    // $dm = new DanhMuc_DB();
    // print_r($dm->getAllDanhMuc());
?>