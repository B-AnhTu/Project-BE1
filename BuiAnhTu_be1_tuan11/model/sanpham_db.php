<?php
    require_once '../model/db.php';
    require_once '../model/sanpham.php';
    class SanPham_DB extends Db{
        public function getAllSanPham($currentPage, $perPage){
            $startRecord = ($currentPage - 1)* $perPage;
            $sql = self::$connection->prepare("SELECT * FROM tbl_sanpham LIMIT $startRecord, $perPage");
            $sql->execute();

            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

            $arrSanPham = array();
            foreach ($items as $value) {
                $arrSanPham[] = new SanPham($value['ma'],$value['ten'],$value['gia'],$value['mota'],$value['madanhmuc'],$value['image']);
            }
            return $arrSanPham;

        }
        public function getSanPham($maSanPham){
            $sql = self::$connection->prepare("SELECT * FROM tbl_sanpham WHERE tbl_sanpham.ma = ? ");
            $sql->bind_param("i",$maSanPham);
            $sql->execute();

            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

            $sanPham = "";
            foreach ($items as $value) {
                $sanPham = new SanPham($value['ma'],$value['ten'],$value['gia'],$value['mota'],$value['madanhmuc'],$value['image']);
            }
            return $sanPham;

        }

        public function getSanPhamByDanhMuc($id, $currentPage, $perPage){
            $startRecord = ($currentPage - 1)* $perPage;
            $sql = self::$connection->prepare("SELECT * FROM tbl_sanpham where madanhmuc = ? LIMIT $startRecord, $perPage");
            $sql->bind_param("i",$id);
            $sql->execute();
            
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

            $arrSanPham = array();
            foreach ($items as $key => $value) {
                $arrSanPham[] = new SanPham($value['ma'],$value['ten'],$value['gia'],$value['mota'],$value['madanhmuc'],$value['image']);
            }
            return $arrSanPham;
        }
        //Thêm sản phẩm
        public function addSanPham($sanpham){
            $stmt = self::$connection->prepare("INSERT INTO tbl_sanpham VALUES (?,?,?,?,?)");
            $stmt->bind_param("isisi", $sanpham->ma, $sanpham->ten, $sanpham->gia, $sanpham->mota, $sanpham->madanhmuc);
            
            $stmt->execute();
        }
        //Sửa sản phẩm
        public function updateSanPham($sanpham){
            $stmt = self::$connection->prepare("UPDATE tbl_sanpham SET ten = ?, gia = ?, mota = ?, madanhmuc = ? WHERE ma = ?");
            $stmt->bind_param("sisii", $sanpham->ten, $sanpham->gia, $sanpham->mota, $sanpham->madanhmuc, $sanpham->ma);
            $stmt->execute();
        }
        //Xóa sản phẩm dựa trên mã sản phẩm
        public function deleteSanPham($id){
            $sql = self::$connection->prepare("DELETE FROM tbl_sanpham WHERE ma = ?");
            $sql->bind_param("i", $id);
            $sql->execute();
        }
        public function findProduct($keyword){
            $sql = self::$connection->prepare("SELECT * FROM tbl_product WHERE tbl_sanpham.ten or tbl_sanpham.mota LIKE'$keyword%'");
            $sql->execute();
        }
        public function searchProductName($keyword, $currentPage, $perPage){
            $startRecord = ($currentPage - 1)* $perPage;
            $sql = self::$connection->prepare("SELECT * FROM tbl_sanpham WHERE tbl_sanpham.ten or tbl_sanpham.mota LIKE'%$keyword%' LIMIT $startRecord,$perPage");
            $sql->execute();

            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

            $arrSanPham = array();
            foreach ($items as $key => $value) {
                $arrSanPham[] = new SanPham($value['ma'],$value['ten'],$value['gia'],$value['mota'],$value['madanhmuc'],$value['image']);
            }
            return $arrSanPham;
        }
        public function getTotalProduct(){
            //Tạo câu SQL
            $sql = self::$connection->prepare("SELECT COUNT(*) as Total FROM tbl_sanpham");
            $sql->execute();

            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            
            return $items[0]['Total']; //return an array
        }
        public function getTotalProductByDanhMuc($maDanhMuc){
            //Tạo câu SQL
            $sql = self::$connection->prepare("SELECT COUNT(*) as Total FROM tbl_sanpham WHERE tbl_sanpham.madanhmuc = ?");
            $sql->bind_param("i",$maDanhMuc);
            $sql->execute();

            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            
            return $items[0]['Total']; //return an array
        }
        //Lấy số lượng sản phẩm theo keyword
        public function getTotalSearchProductName($keyword){
            //Tạo câu SQL
            $sql = self::$connection->prepare("SELECT COUNT(*) as Total FROM tbl_sanpham WHERE tbl_sanpham.ten OR tbl_sanpham.mota LIKE'%$keyword%'");
            $sql->execute();

            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            
            return $items[0]['Total']; //return an array
        }
        public function getPaginationBar($url, $total, $page, $perPage, $offset)
        {
            if ($total <= 0) {
                return "";
            }
            $totalLinks = ceil($total / $perPage);
            if ($totalLinks <= 1) {
                return "";
            }
            $from = $page - $offset;
            $to = $page + $offset;

            if($from <= 0){
                $from = 1;
                $to = $from + $offset * 2;
            }
            if($to > $totalLinks){
                $to = $totalLinks;
            }
            $link = "";
            for ($j = $from; $j <= $to; $j++) {
                if ($j == $page) {
                    $link = $link . "<span> $j </span>";
                } else {
                    $link = $link . "<a href='$url&page=$j'> $j </a>";
                }
            }
            $firstLink = "";
            $prevLink = "";
            $nextLink = "";
            $lastLink = "";
            if ($page > 1) {
                $firstLink = "<a href='$url'> << </a>";
                $prev = $page - 1;
                $prevLink = "<a href='$url&page=$prev'> < </a>";
            }
            if ($page < $totalLinks) {
                $lastLink = "<a href='$url&page=$totalLinks'> >> </a>";
                $next = $page + 1;
                $nextLink = "<a href ='$url&page=$next'> > </a>";
            }
            return $firstLink . $prevLink . $link . $nextLink . $lastLink;
        }
    }
?>