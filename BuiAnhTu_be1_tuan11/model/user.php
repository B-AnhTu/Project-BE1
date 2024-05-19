<?php
    class User{
        public $email, $matkhau, $hoten, $quyen;

        public function __construct($email, $matkhau, $hoten, $quyen)
        {
            $this->email = $email;
            $this->matkhau = $matkhau;
            $this->hoten = $hoten;
            $this->quyen = $quyen;
        }
    }
?>