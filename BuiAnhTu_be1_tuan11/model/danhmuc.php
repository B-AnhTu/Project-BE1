<?php
    class DanhMuc{
        public $ma, $ten, $ghichu;

        public function __construct($ma, $ten, $ghichu)
        {
            $this->ma = $ma;
            $this->ten = $ten;
            $this->ghichu =$ghichu;
        }
    }
?>