<?php
    session_start();  //bat dau session
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
            case 'dangnhap':
                if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                    $tennguoidung = $_POST['tennguoidung'];
                    $matkhau = $_POST['matkhau'];
                    $checkuser = ktDangNhap($tennguoidung, $matkhau);
                    if(is_array($checkuser)) {
                        $_SESSION['user'] = $checkuser;
                        //$thongbao = "Đăng nhập thành công!";
                        header('Location: index.php');
                        
                    }
                    else {
                        $_SESSION['thongbao'] = "Thông tin đăng nhập sai!";
                        header('Location: index.php');
                    }
                    
                }
                break;
            case 'edit_taikhoan':
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $matkhau = $_POST['matkhau'];
                    $tennguoidung = $_POST['tennguoidung'];
                    $email = $_POST['email'];
                    $sodienthoai = $_POST['sodienthoai'];
                    $diachi = $_POST['diachi'];
                    update_taikhoan($id, $tennguoidung, $email, $sodienthoai, $diachi);
                    $thongbao = "Cập nhật thành công!";
                    //cap nhat lai session
                    $_SESSION['user'] = ktDangNhap($tennguoidung, $matkhau);
                    header('Location: index.php?act=edit_taikhoan');
                    
                }
                include "view/taikhoan/edit_taikhoan.php";
                break;
            case 'doimatkhau':
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $tennguoidung = $_POST['tennguoidung'];
                    $mkhientai = $_POST['mkhientai'];
                    $mkmoi = $_POST['mkmoi'];
                    $mkxacnhan = $_POST['mkxacnhan'];
                    if($mkmoi != $mkxacnhan) {
                        $thongbao = "Mật khẩu mới và mật khẩu xác nhận không khớp!";
                    }
                    else if ($mkhientai == $mkmoi) {
                        $thongbao = "Mật khẩu cũ và mật khẩu mới trùng nhau!";
                    }
                    else {
                        $user = getOne($id);
                        // Kiểm tra xem mật khẩu cũ có đúng không
                        if ($user && $user['matkhau'] == $mkhientai) {
                            doiMatKhau($id, $mkmoi);
                            $thongbao = "Mật khẩu đã được cập nhật thành công!";
                            $_SESSION['user'] = ktDangNhap($tennguoidung, $mkmoi);
                            //header('Location: index.php?act=doimatkhau');
                        }
                        else {
                            $thongbao = "Mật khẩu cũ không đúng!";
                        }

                    }
                    
                }
                include "view/taikhoan/doimatkhau.php";
                break;
            case 'quenmatkhau':
                    if (isset($_POST['gui']) && ($_POST['gui'])) {
                        $email = $_POST['email'];
                        $user = getOneByEmail($email);
                        if (is_array($user)) {
                            // Trường hợp email tồn tại
                            $thongbao = "Mật khẩu của bạn là: " . $user['matkhau'];
                        } else {
                            // Trường hợp email không tồn tại
                            $thongbao = "Email không đúng hoặc không tồn tại trong hệ thống!";
                        }
                    }
                    include "view/taikhoan/quenmatkhau.php";
                    break;
            case 'logout':
                session_unset();
                header('Location: index.php');
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