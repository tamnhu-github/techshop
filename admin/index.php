<!-- layout -->
<?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
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
                if(isset($_GET['masanpham']) && ($_GET['masanpham']) > 0) {
                    $sanpham = loadOne_sanpham(($_GET['masanpham']));
                }
                $listdanhmuc = loadAll_danhmuc();
                include "sanpham/update.php";
                break;
            case 'updatesp':
                //neu co nhan nut cap nhat
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $masanpham = $_POST['masanpham'];
                    $tensanpham = $_POST['tensanpham'];
                    $gia = $_POST['gia'];
                    $mota = $_POST['mota'];
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
                    update_sanpham($masanpham, $tensanpham, $gia, $mota, $anh);
                    $thongbao = "Cập nhật thành công!";
                }
                $listdanhmuc = loadAll_danhmuc();
                $listsanpham = loadAll_sanpham("", 0);
                include "sanpham/list.php";
                break;

            //khachhang
            case 'dskh':
                $listkhachhang = loadAll_khachhang();
                include "taikhoan/list.php";
                break;
            case 'suakh':
                    if(isset($_GET['id']) && ($_GET['id']) > 0) {
                        $tk = getOne(($_GET['id']));
                    }
                    include "taikhoan/update.php";
                    break;
            case 'updatekh':
                //neu co nhan nut cap nhat
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $tennguoidung = $_POST['tennguoidung'];
                    $email = $_POST['email'];
                    $diachi = $_POST['diachi'];
                    $vaitro = $_POST['vaitro'];
                    $sodienthoai = $_POST['sodienthoai'];
                    update_taikhoanAdmin($id, $tennguoidung, $email, $sodienthoai, $diachi, $vaitro);
                    $success = "Cập nhật thành công!";
                }
                $listkhachhang = loadAll_khachhang();
                include "taikhoan/list.php";
                break;
                    
            case 'xoakh':
                if(isset($_GET['id']) && ($_GET['id']) > 0) {
                    if(isset($_GET['vaitro']) && ($_GET['vaitro']) == 0){
                        delete_khachhang(($_GET['id']));
                    }
                    else {
                        $thongbao = "Không thể xóa người dùng này";
                    } 
                }
                $listkhachhang = loadAll_khachhang();
                include "taikhoan/list.php";
                break;
            
            //binhluan
            case 'dsbl':
                $listkhachhang = loadAll_khachhang();
                $listsanpham = loadAll_sanpham("", 0);
                $listbinhluan = loadAll();
                include "binhluan/list.php";
                break;

            case 'xoabl':
                if(isset($_GET['idmsg']) && ($_GET['idmsg']) > 0) {
                    delete_binhluan(($_GET['idmsg']));
                }
                $listbinhluan = loadAll();
                $listkhachhang = loadAll_khachhang();
                $listsanpham = loadAll_sanpham("", 0);
                include "binhluan/list.php";
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