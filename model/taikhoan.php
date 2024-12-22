<?php
<<<<<<< HEAD
function insert_taikhoan($email,$user,$password){
    $sql = "INSERT INTO taikhoan(email,user,password) values('$email','$user','$password')";
    pdo_execute($sql);
}

function checkuser($user,$pass){
    $sql = "SELECT * FROM taikhoan WHERE user='".$user."' AND password ='".$pass."'";
    $sp = pdo_query_one($sql);
    return $sp;
}

=======
    function loadAll_khachhang() {
        $sql = "select * from taikhoan order by id desc";
        $listkhachhang = pdo_query($sql);
        return $listkhachhang;
    }
    
    function insert_taikhoan($tennguoidung, $email, $diachi, $sodienthoai, $matkhau) {
        $sql = "INSERT INTO taikhoan (tennguoidung, email, diachi, sodienthoai, matkhau) VALUES ('$tennguoidung', '$email', '$diachi', '$sodienthoai', '$matkhau')";
        pdo_execute($sql);
    }

    function ktDangNhap($tennguoidung, $matkhau) {
        $sql = "SELECT * FROM taikhoan WHERE tennguoidung ='". $tennguoidung . "' and matkhau ='". $matkhau. "'"; 
        $user = pdo_query_one($sql);
        return $user;
    }
    function update_taikhoan($id, $tennguoidung, $email, $sodienthoai, $diachi) {
        $sql = "UPDATE taikhoan 
                SET tennguoidung = '".$tennguoidung."', 
                    email = '".$email."', 
                    sodienthoai = '".$sodienthoai."', 
                    diachi = '".$diachi."' 
                WHERE id = ".$id;
        pdo_execute($sql);
    }
    function update_taikhoanAdmin($id, $tennguoidung, $email, $sodienthoai, $diachi, $vaitro) {
        $sql = "UPDATE taikhoan 
                SET tennguoidung = '".$tennguoidung."', 
                    email = '".$email."', 
                    sodienthoai = '".$sodienthoai."', 
                    diachi = '".$diachi."',
                    vaitro = '".$vaitro."'
                WHERE id = ".$id;
        pdo_execute($sql);
    }

    function getOne($id) {
        $sql = "SELECT * FROM taikhoan WHERE id ='". $id . "'"; 
        $user = pdo_query_one($sql);
        return $user;
    }
    function getOneByEmail($email) {
        $sql = "SELECT * FROM taikhoan WHERE email ='". $email . "'"; 
        $user = pdo_query_one($sql);
        return $user;
    }
    function doiMatKhau($id, $mkmoi) {
        $sql = "UPDATE taikhoan 
                SET matkhau = '".$mkmoi."'
                WHERE id = ".$id;
        pdo_execute($sql);
    }
    function delete_khachhang($id) {
        $sql = "delete from taikhoan where id = ".$id;
        pdo_execute($sql);
    }
    
>>>>>>> nhu
?>