<?php
    function insert_danhmuc($tenloai) {
        $sql = "INSERT INTO danhmuc (tenloai) VALUES ('$tenloai')";
        pdo_execute($sql);
    }

    function delete_danhmuc($maloai) {
        $sql = "delete from danhmuc where maloai = ".$maloai;
        pdo_execute($sql);
    }
    function loadAll_danhmuc() {
        $sql = "select * from danhmuc order by maloai desc";
        $listdanhmuc = pdo_query($sql);
        return $listdanhmuc;
    }

    function loadOne_danhmuc($maloai) {
        $sql = "select * from danhmuc where maloai =".$maloai;
        $dm = pdo_query_one($sql);
        return $dm;
    }

    function update_danhmuc($maloai, $tenloai) {
        $sql = "update danhmuc set tenloai ='".$tenloai."'where maloai=".$maloai;
        pdo_execute($sql);
    }

?>