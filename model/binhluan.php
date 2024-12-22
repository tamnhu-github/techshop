<?php
    function insert_binhluan($iduser, $masanpham, $noidung, $ngaybinhluan) {
        $sql = "INSERT INTO binhluan (iduser, masanpham, noidung, ngaybinhluan) VALUES ('$iduser','$masanpham','$noidung','$ngaybinhluan')";
        pdo_execute($sql);
    }
    function loadAll_binhluan($masanpham) {
        $sql = "select * from binhluan where masanpham = '".$masanpham."' order by idmsg desc";
        $listbinhluan = pdo_query($sql);
        return $listbinhluan;
    }
    function loadAll() {
        $sql = "select * from binhluan order by idmsg desc";
        $listbinhluan = pdo_query($sql);
        return $listbinhluan;
    }
    function delete_binhluan($idmsg) {
        $sql = "delete from binhluan where idmsg = ".$idmsg;
        pdo_execute($sql);
    }
?>