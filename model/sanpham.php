<?php
    function insert_sanpham($tensanpham, $gia, $mota, $anh, $maloai) {
        $sql = "INSERT INTO sanpham (tensanpham, gia, mota, anh, maloai) VALUES ('$tensanpham', '$gia', '$mota', '$anh', '$maloai')";
        pdo_execute($sql);
    }

    function delete_sanpham($masanpham) {
        // Kiểm tra xem masanpham có tồn tại trong bảng giohang không
        $sqlCheck = "SELECT COUNT(*) FROM giohang WHERE masanpham = ?";
        $result = pdo_query_value($sqlCheck, $masanpham); 
    
        if ($result > 0) {
            return ["success" => false, "message" => "Không thể xóa sản phẩm đang có đơn hàng."];
        } else {
            $sql = "DELETE FROM sanpham WHERE masanpham = ?";
            pdo_execute($sql, $masanpham);
            return ["success" => true, "message" => "Xóa sản phẩm thành công!"];
        }
    }
    function loadAll_sanpham($key="", $maloai=0) {
        $sql = "select * from sanpham where 1";
        if($key!="") {
            $sql.=" and tensanpham like'%".$key."%'";
        }
        if($maloai > 0) {
            $sql .= " and maloai = '".$maloai."'";
        }
        $sql .= " order by masanpham desc";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function loadOne_sanpham($masanpham) {
        $sql = "select * from sanpham where masanpham =".$masanpham;
        $sp = pdo_query_one($sql);
        return $sp;
    }

    function update_sanpham($masanpham, $tensanpham, $gia, $mota, $anh) {
        if($anh != null) {
            // Cập nhật đầy đủ
            $sql = "UPDATE sanpham 
                    SET tensanpham = '".$tensanpham."', 
                        gia = '".$gia."', 
                        mota = '".$mota."', 
                        anh = '".$anh."' 
                    WHERE masanpham = ".$masanpham;
        } else {
            // Cập nhật trừ ảnh
            $sql = "UPDATE sanpham 
                    SET tensanpham = '".$tensanpham."', 
                        gia = '".$gia."', 
                        mota = '".$mota."' 
                    WHERE masanpham = ".$masanpham;
        }
        
        pdo_execute($sql);
    }

    //lay 9 san pham cho trang chu
    function loadAll_sanpham_home() {
        $sql = "select * from sanpham where 1 order by masanpham desc limit 0,9";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    //top 10 yeu thich
    function loadAll_sanpham_top10() {
        $sql = "select * from sanpham where 1 order by luotxem desc limit 0,10";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    //lay nhung san pham cung loai voi masanpham
    function loadAll_sanpham_cungloai($masanpham) {
        $sql = "select * from sanpham where masanpham <> ".$masanpham." and maloai= (select maloai from sanpham where masanpham=".$masanpham.")";
        $listcungloai = pdo_query($sql);
        return $listcungloai;
    }

?>