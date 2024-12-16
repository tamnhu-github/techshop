<!-- layout -->
<?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "header.php";

    //controller
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            // danhmuc
            case 'adddm':
                //kiem tra xem ng dung co click vao nut add ko
                if(isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công!";
                }
                
                include "danhmuc/add.php";
                break;
            case 'dsdm':
                $listdanhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'xoadm':
                if(isset($_GET['maloai']) && ($_GET['maloai']) > 0) {
                    delete_danhmuc(($_GET['maloai']));
                }
                $listdanhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'suadm':
                if(isset($_GET['maloai']) && ($_GET['maloai']) > 0) {
                    $dm = loadOne_danhmuc(($_GET['maloai']));
                }
                include "danhmuc/update.php";
                break;
            case 'updatedm':
                //neu co nhan nut cap nhat
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $maloai = $_POST['maloai'];
                    $tenloai = $_POST['tenloai'];
                    update_danhmuc($maloai, $tenloai);
                    $thongbao = "Cập nhật thành công!";
                }
                $listdanhmuc = loadAll_danhmuc();
                include "danhmuc/list.php";
                break;
            

            //sanpham
            case 'addsp':
                //kiem tra xem ng dung co click vao nut add ko
                if(isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $tensanpham = $_POST['tensanpham'];
                    $gia = $_POST['gia'];
                    $mota = $_POST['mota'];
                    $maloai = $_POST['maloai'];
                    $anh = $_FILES['anh']['name']; //lay ten anh
                    $target_dir = "../upload/"; //thu muc chua anh
                    if (!is_dir($target_dir)) {
                        mkdir($target_dir, 0755, true);
                    }
                    $target_file = $target_dir . basename($_FILES["anh"]["name"]);
                    if(move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                        //echo "Thanh cong";
                    }
                    else {
                        //echo "That bai";
                    }
                    insert_sanpham($tensanpham, $gia, $mota, $anh, $maloai);
                    $thongbao = "Thêm thành công!";
                }

                $listdanhmuc = loadAll_danhmuc();
                include "sanpham/add.php";
                break;
            case 'dssp':
                if(isset($_POST['btnTim']) && ($_POST['btnTim'])) {
                    $key = $_POST['key'];
                    $maloai = $_POST['maloai'];
                }
                else {
                    $key = "";
                    $maloai = 0;
                }
                $listdanhmuc = loadAll_danhmuc();
                $listsanpham = loadAll_sanpham($key, $maloai);
                include "sanpham/list.php";
                break;
            case 'xoasp':
                if(isset($_GET['masanpham']) && ($_GET['masanpham']) > 0) {
                    delete_sanpham(($_GET['masanpham']));
                }
                $listdanhmuc = loadAll_danhmuc();
                $listsanpham = loadAll_sanpham("", 0);
                include "sanpham/list.php";
                break;
            case 'suasp':
                if(isset($_GET['maloai']) && ($_GET['maloai']) > 0) {
                    $dm = loadOne_sanpham(($_GET['maloai']));
                }
                include "sanpham/update.php";
                break;
            case 'updatesp':
                //neu co nhan nut cap nhat
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $maloai = $_POST['maloai'];
                    $tenloai = $_POST['tenloai'];
                    update_sanpham($maloai, $tenloai);
                    $thongbao = "Cập nhật thành công!";
                }
                $listdanhmuc = loadAll_sanpham("", 0);
                include "sanpham/list.php";
                break;
            default:
                include "home.php";
                break;
        }
    }
    else {
        include "home.php";
    }
    include "footer.php";
?>