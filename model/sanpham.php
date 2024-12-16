<?php
    function insert_sanpham($tensanpham, $gia, $mota, $anh, $maloai) {
        $sql = "INSERT INTO sanpham (tensanpham, gia, mota, anh, maloai) VALUES ('$tensanpham', '$gia', '$mota', '$anh', '$maloai')";
        pdo_execute($sql);
    }

    function delete_sanpham($masanpham) {
        $sql = "delete from sanpham where masanpham = ".$masanpham;
        pdo_execute($sql);
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

    function update_sanpham($masanpham, $tensanpham) {
        $sql = "update sanpham set tensanpham='".$tensanpham."'where masanpham=".$masanpham;
        pdo_execute($sql);
    }

?>