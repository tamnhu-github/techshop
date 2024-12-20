<?php
    include "view/header.php";
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/taikhoan.php";
    include "global.php";
    $sanphamnew = loadAll_sanpham_home();
    $listdanhmuc_home = loadAll_danhmuc();
    $listtop10 = loadAll_sanpham_top10();
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'gioithieu':
                include "view/aboutus.php";
                break;
            case 'lienhe':
                include "view/contact.php";
                break;
            case 'dangky':
                if(isset($_POST['dangky']) && ($_POST['dangky'])) {
                    $tennguoidung = $_POST['tennguoidung'];
                    $email = $_POST['email'];
                    $diachi = $_POST['diachi'];
                    $sodienthoai = $_POST['sodienthoai'];
                    $matkhau = $_POST['matkhau'];
                    insert_taikhoan($tennguoidung, $email, $diachi, $sodienthoai, $matkhau);
                    $thongbao = "Đã đăng ký thành công. Hãy đăng nhập để bình luận hoặc mua sắm nhé!";
                }
                include "view/taikhoan/dangky.php";
                break;
            case 'chitietsanpham':
                if(isset($_GET['masanpham']) && ($_GET['masanpham']) > 0 ) {
                    $masanpham = $_GET['masanpham'];
                    $listcungloai = loadAll_sanpham_cungloai($masanpham);
                    $sanpham = loadOne_sanpham($masanpham);
                    include "view/chitietsanpham.php";
                }
                else {
                    include "view/home.php";
                }
                
                break;
                 
            //load danh sách sản phẩm theo danh mục
            //tim kiem san pham tu search box
            case 'dssp':
                $maloai = 0;
                $key = "";
                if(isset($_POST['key']) && ($_POST['key'])!="") {
                    $key = $_POST['key'];
                }
                if(isset($_GET['maloai']) && ($_GET['maloai']) > 0) {
                    $maloai = $_GET['maloai'];
                    
                }
                $listsanpham = loadAll_sanpham($key, $maloai);
                $danhmuc = loadOne_danhmuc($maloai);
                include "view/dssp.php";
                break;
            default:
                include "view/home.php";
                break;
        }
    }
    else {
        include "view/home.php";
    }
    
    include "view/footer.php";
?>