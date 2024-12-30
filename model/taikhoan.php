<?php
    function loadAll_khachhang($key="") {
        $sql = "select * from taikhoan where 11";
        if($key!="") {
            $sql.=" and tennguoidung like'%".$key."%'";
        }
        
        $sql .= " order by id desc";
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
        // Kiểm tra xem iduser có tồn tại trong bảng giohang không
        $sqlCheck = "SELECT COUNT(*) FROM giohang WHERE iduser = ?";
        $result = pdo_query_value($sqlCheck, $id); 
    
        if ($result > 0) {
            return ["success" => false, "message" => "Không thể xóa khách hàng đang có đơn hàng."];
        } else {
            $sql = "DELETE FROM taikhoan WHERE id = ?";
            pdo_execute($sql, $id);
            return ["success" => true, "message" => "Xóa khách hàng thành công!"];
        }
    }
?>