<?php
    function insert_taikhoan($tennguoidung, $email, $diachi, $sodienthoai, $matkhau) {
        $sql = "INSERT INTO taikhoan (tennguoidung, email, diachi, sodienthoai, matkhau) VALUES ('$tennguoidung', '$email', '$diachi', '$sodienthoai', '$matkhau')";
        pdo_execute($sql);
    }
?>