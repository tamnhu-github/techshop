<?php
    function insert_sanpham($tensanpham, $gia, $mota, $anh, $maloai) {
        $sql = "INSERT INTO sanpham (tensanpham, gia, mota, anh, maloai) VALUES ('$tensanpham', '$gia', '$mota', '$anh', '$maloai')";
        pdo_execute($sql);
    }

    function delete_sanpham($masanpham) {
        $sql = "delete from sanpham where masanpham = ".$masanpham;
        pdo_execute($sql);
    }
    function loadall_sanpham_top10(){
        $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY luotxem DESC LIMIT 0,10";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham_home(){
        $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY masanpham DESC LIMIT 0,9";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function loadAll_sanpham($key, $maloai) {
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

?>