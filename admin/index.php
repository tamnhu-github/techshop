<!-- layout -->
<?php
session_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";
include "../model/thongke.php";
include "header.php";

//controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            // danhmuc
        case 'adddm':
            //kiem tra xem ng dung co click vao nut add ko
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "Thêm thành công!";
            }

            include "danhmuc/add.php";
            break;
        case 'dsdm':
            //Phân trang
            $pageParam = isset($_GET['page']) ? $_GET['page'] : null;
            $currentPage = ($pageParam === null || $pageParam === '') ? 1 : (int)$pageParam;
            $size = 10;

            $listdanhmuc = loadAll_danhmuc();
            $totalItems = count($listdanhmuc);
            $totalPages = (int) ceil($totalItems / $size);

            $startIndex = ($currentPage - 1) * $size;
            $listdanhmuc = array_slice($listdanhmuc, $startIndex, $size);

            $maxVisiblePages = 6;
            $startPage = max(1, $currentPage - 1);
            $endPage = min($totalPages, $startPage + $maxVisiblePages - 1);

            if ($endPage - $startPage < $maxVisiblePages - 1) {
                $startPage = max(1, $endPage - $maxVisiblePages + 1);
            }
            
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if (isset($_GET['maloai']) && ($_GET['maloai']) > 0) {
                delete_danhmuc(($_GET['maloai']));
            }
            header("Location: index.php?act=dsdm");
            break;
        case 'suadm':
            if (isset($_GET['maloai']) && ($_GET['maloai']) > 0) {
                $dm = loadOne_danhmuc(($_GET['maloai']));
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            //neu co nhan nut cap nhat
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $maloai = $_POST['maloai'];
                $tenloai = $_POST['tenloai'];
                update_danhmuc($maloai, $tenloai);
                $thongbao = "Cập nhật thành công!";
            }
            // $listdanhmuc = loadAll_danhmuc();
            // include "danhmuc/list.php";
            header("Location: index.php?act=dsdm");
            break;

            //sanpham
        case 'addsp':
            //kiem tra xem ng dung co click vao nut add ko
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
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
                if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                    //echo "Thanh cong";
                } else {
                    //echo "That bai";
                }
                insert_sanpham($tensanpham, $gia, $mota, $anh, $maloai);
                $thongbao = "Thêm thành công!";
            }

            $listdanhmuc = loadAll_danhmuc();
            include "sanpham/add.php";
            break;
        case 'dssp':
            if (isset($_POST['btnTim']) && ($_POST['btnTim'])) {
                $key = $_POST['key'];
                $maloai = $_POST['maloai'];
            } else {
                $key = "";
                $maloai = 0;
            }

            $pageParam = isset($_GET['page']) ? $_GET['page'] : null;
            $currentPage = ($pageParam === null || $pageParam === '') ? 1 : (int)$pageParam;
            $size = 10;
            $listdanhmuc = loadAll_danhmuc();
            $listsanpham = loadAll_sanpham($key, $maloai);
            $totalItems = count($listsanpham);
            $totalPages = (int) ceil($totalItems / $size);
            $startIndex = ($currentPage - 1) * $size;
            $listsanpham = array_slice($listsanpham, $startIndex, $size);

            $maxVisiblePages = 6;
            $startPage = max(1, $currentPage - 1);
            $endPage = min($totalPages, $startPage + $maxVisiblePages - 1);

            if ($endPage - $startPage < $maxVisiblePages - 1) {
                $startPage = max(1, $endPage - $maxVisiblePages + 1);
            }

            include "sanpham/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['masanpham']) && ($_GET['masanpham']) > 0) {
                $result = delete_sanpham($_GET['masanpham']);
                
                //Lưu kết quả vào session để hiển thị thông báo cho View
                if ($result['success']) {
                    $_SESSION['success'] = $result['message']; // Thông báo thành công
                } else {
                    $_SESSION['error'] = $result['message']; // Thông báo thất bại
                }
            } else {
                $_SESSION['error'] = "Mã sản phẩm không hợp lệ."; // Thông báo lỗi
            }

            header("Location: index.php?act=dssp");
            exit; 
            break;
        case 'suasp':
            if (isset($_GET['masanpham']) && ($_GET['masanpham']) > 0) {
                $sanpham = loadOne_sanpham(($_GET['masanpham']));
            }

            include "sanpham/update.php";
            break;
        case 'updatesp':
            //neu co nhan nut cap nhat
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
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
                if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
                    $_SESSION['success'] = "Cập nhật sản phẩm thành công!";
                } else {
                    $_SESSION['error'] = "Cập nhật sản phẩm thất bại";
                }
                update_sanpham($masanpham, $tensanpham, $gia, $mota, $anh);
                $thongbao = "Cập nhật thành công!";
            }
            header("Location: index.php?act=dssp");
            break;

            //khachhang
        case 'dskh':
            if (isset($_POST['btnTim']) && ($_POST['btnTim'])) {
                $key = $_POST['key'];
            } else {
                $key = "";
            }

            $pageParam = isset($_GET['page']) ? $_GET['page'] : null;
            $currentPage = ($pageParam === null || $pageParam === '') ? 1 : (int)$pageParam;
            $size = 10;

            $listkhachhang = loadAll_khachhang($key);
            $totalItems = count($listkhachhang);
            $totalPages = (int) ceil($totalItems / $size);

            $startIndex = ($currentPage - 1) * $size;
            $listkhachhang = array_slice($listkhachhang, $startIndex, $size);

            $maxVisiblePages = 6;
            $startPage = max(1, $currentPage - 1);
            $endPage = min($totalPages, $startPage + $maxVisiblePages - 1);

            if ($endPage - $startPage < $maxVisiblePages - 1) {
                $startPage = max(1, $endPage - $maxVisiblePages + 1);
            }

            include "taikhoan/list.php";
            break;
        case 'suakh':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $tk = getOne(($_GET['id']));
            }
            include "taikhoan/update.php";
            break;
        case 'updatekh':
            //neu co nhan nut cap nhat
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $tennguoidung = $_POST['tennguoidung'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $vaitro = $_POST['vaitro'];
                $sodienthoai = $_POST['sodienthoai'];
                update_taikhoanAdmin($id, $tennguoidung, $email, $sodienthoai, $diachi, $vaitro);
                $_SESSION['success'] = "Cập nhật thành công!";
            }
            header("Location: index.php?act=dskh");
            exit;
            break;

        case 'xoakh':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                if (isset($_GET['vaitro']) && ($_GET['vaitro']) == 0) {
                    $result = delete_khachhang($_GET['id']);
        
                    //Lưu kết quả vào session để hiển thị thông báo cho View
                    if ($result['success']) {
                        $_SESSION['success'] = $result['message']; 
                    } else {
                        $_SESSION['error'] = $result['message']; 
                    }
                } else {
                    $_SESSION['thongbao'] = "Không thể xóa người dùng này";
                }
            } else {
                $_SESSION['error'] = "ID không hợp lệ";
            }        
            header("Location: index.php?act=dskh");
            exit; 
            break;

            //binhluan
        case 'dsbl':
            //Phân trang
            $pageParam = isset($_GET['page']) ? $_GET['page'] : null;
            $currentPage = ($pageParam === null || $pageParam === '') ? 1 : (int)$pageParam;
            $size = 10;

            $listbinhluan = loadAll();
            $totalItems = count($listbinhluan);
            $totalPages = (int) ceil($totalItems / $size);

            $startIndex = ($currentPage - 1) * $size;
            $listbinhluan = array_slice($listbinhluan, $startIndex, $size);

            $maxVisiblePages = 6;
            $startPage = max(1, $currentPage - 1);
            $endPage = min($totalPages, $startPage + $maxVisiblePages - 1);

            if ($endPage - $startPage < $maxVisiblePages - 1) {
                $startPage = max(1, $endPage - $maxVisiblePages + 1);
            }

            $listkhachhang = loadAll_khachhang();
            $listsanpham = loadAll_sanpham("", 0);
            
            include "binhluan/list.php";
            break;

        case 'xoabl':
            if (isset($_GET['idmsg']) && ($_GET['idmsg']) > 0) {
                delete_binhluan(($_GET['idmsg']));
            }
            // $listbinhluan = loadAll();
            // $listkhachhang = loadAll_khachhang();
            // $listsanpham = loadAll_sanpham("", 0);
            // include "binhluan/list.php";
            header("Location: index.php?act=dsbl");
            break;

            //đơn hàng
        case 'dsdh':
            if (isset($_POST['btnTim']) && ($_POST['btnTim'])) {
                $key = $_POST['key'];
                $trangthai = $_POST['trangthai'];
                $ngaydathang = $_POST['ngaydathang'];
            } else {
                $key = "";
                $trangthai = "";
                $ngaydathang = "";
            }

            $pageParam = isset($_GET['page']) ? $_GET['page'] : null;
            $currentPage = ($pageParam === null || $pageParam === '') ? 1 : (int)$pageParam;
            $size = 10;
            //Lấy ds đơn hàng
            $listdonhang = loadAll_listBill($key, $trangthai, $ngaydathang);
            $totalItems = count($listdonhang);
            $totalPages = (int) ceil($totalItems / $size);

            $startIndex = ($currentPage - 1) * $size;
            $listdonhang = array_slice($listdonhang, $startIndex, $size);

            $maxVisiblePages = 6;
            $startPage = max(1, $currentPage - 1);
            $endPage = min($totalPages, $startPage + $maxVisiblePages - 1);

            if ($endPage - $startPage < $maxVisiblePages - 1) {
                $startPage = max(1, $endPage - $maxVisiblePages + 1);
            }

            $listkhachhang = loadAll_khachhang();
            include "donhang/list.php";
            break;
        case 'ctdh':
            if (isset($_GET['madonhang']) && ($_GET['madonhang']) > 0) {
                $madonhang = $_GET['madonhang'];
            }
            $listdonhang = loadOne_donhang($madonhang);
            $chitietdonhang = loadAll_giohang($madonhang);
            include "donhang/listdetails.php";
            break;
        case 'suadh':

            if (isset($_GET['madonhang']) && ($_GET['madonhang']) > 0) {
                $madonhang = $_GET['madonhang'];
                $trangthai = $_GET['trangthai'];
                update_donhang($madonhang, $trangthai);
                $_SESSION['success'] = "Cập nhật thành công!";
            }else{
                $_SESSION['error'] = "Cập nhật thất bại";
            }
            header("Location: index.php?act=dsdh");
            break;
        case 'xoadh':
            if (isset($_GET['madonhang']) && ($_GET['madonhang']) > 0) {
                $result = delete_donhang(($_GET['madonhang']));
                if ($result['success']) {
                    $_SESSION['success'] = $result['message']; 
                } else {
                    $_SESSION['error'] = $result['message']; 
                }
            }
            else{
                $_SESSION['error'] = "Không tìm thấy đơn hàng";
            }
            header("Location: index.php?act=dsdh");
            exit;
            break;
            //thong ke
        case 'thongke':
            $dstk = loadall_thongke_sanphamdanhmuc();

            include "thongke/list.php";
            break;
        case 'bieudo':
            $dstk = loadall_thongke_sanphamdanhmuc();
            $dstk_ngay = loadall_thongke_donhang_ngay();
            $dstk_trend = loadall_thongke_sp_trend();
            $dstk_doanhthu = loadall_thongke_doanhthu_ngay();
            include "thongke/bieudo.php";
            break;

        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
?>