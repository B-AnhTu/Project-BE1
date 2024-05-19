<?php
    require_once '../model/db.php';
    require_once '../model/user.php';
    class User_DB extends Db{
        public function getAllUser($email, $password){
            $sql = self::$connection->prepare("SELECT * FROM tbl_user where email = ? and matkhau = ?");
            $sql->bind_param("ss",$email, $password);
            $sql->execute();

            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

            $arrUser = array();
            foreach ($items as $value) {
                $arrUser[] = new User($value['email'],$value['matkhau'],$value['hoten'],$value['quyen']);
            }
            return $arrUser;

        }
        public function getUser($email, $password){
            $sql = self::$connection->prepare("SELECT * FROM tbl_user where email = ? and matkhau = ?");
            $sql->bind_param("ss",$email, $password);
            $sql->execute();

            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

            $user = "";
            foreach ($items as $value) {
                $user = new User($value['email'],$value['matkhau'],$value['hoten'],$value['quyen']);
            }
            return $user;
        }
        public function getUserByEmail($email){
            $sql = self::$connection->prepare("SELECT * FROM tbl_user WHERE email = ?");
            $sql->bind_param("s", $email);
            $sql->execute();
        
            $result = $sql->get_result();
            $user = null;
            if ($row = $result->fetch_assoc()) {
                $user = new User($row['email'], $row['matkhau'], $row['hoten'], $row['quyen']);
            }
            return $user;
        }
        public function addUser($user){
            $sql = self::$connection->prepare("INSERT INTO tbl_user VALUES(?,?,?,?)");
            $sql->bind_param("sssi", $user->email, $user->matkhau, $user->hoten, $user->quyen);
            $sql->execute();
        }
        public function updateUser($user){
            $sql = self::$connection->prepare("UPDATE tbl_user SET matkhau = ?, hoten = ?, quyen = ? WHERE email = ?");
            $sql->bind_param("ssis", $user->matkhau, $user->hoten, $user->quyen, $user->email);
            $sql->execute();
        }
        public function deleteUser($email){
            $sql = self::$connection->prepare("DELETE FROM tbl_user WHERE email = ?");
            $sql->bind_param("s", $email);
            $sql->execute();
        }
    }
?>