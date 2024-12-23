<?php
    session_start();  //bat dau session
    include "view/header.php";
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/taikhoan.php";
    include "model/cart.php";
    include "global.php";

    //kiem tra session mycart
    if(!isset($_SESSION['mycart'])) {
        $_SESSION['mycart'] = [];
    }
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

            //gio hang
            case 'addtocart':
                //them thong tin sp tu form addtocart den session
                if(isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                    $masanpham = $_POST['masanpham'];
                    $tensanpham = $_POST['tensanpham'];
                    $anh = $_POST['anh'];
                    $gia = $_POST['gia'];
                    $soluong = 1;

                    //cờ để kiểm tra sản phẩm tồn tại
                    $found = false;
                    $thanhtien = $gia * $soluong;
                    foreach ($_SESSION['mycart'] as $key => $cartItem) {
                        if ($cartItem[0] == $masanpham) {
                            // Nếu sản phẩm đã có, tăng số lượng
                            $_SESSION['mycart'][$key][4] += $soluong; // Tăng số lượng
                            $_SESSION['mycart'][$key][5] = $_SESSION['mycart'][$key][3] * $_SESSION['mycart'][$key][4]; // Cập nhật thành tiền
                            $found = true;
                            break;
                        }
                    }
                    if (!$found) {
                        // Nếu sản phẩm chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
                        $thanhtien = $gia * $soluong;
                        $listsanphamadd = [$masanpham, $tensanpham, $anh, $gia, $soluong, $thanhtien];
                        $_SESSION['mycart'][] = $listsanphamadd;
                    }
                }
                header('Location: index.php?act=viewcart');
                exit();
                break;
                case 'xoaspcart':
                    if (isset($_GET['masanpham'])) {
                        $masanpham = $_GET['masanpham'];
                        // Duyệt qua giỏ hàng để tìm sản phẩm cần xóa
                        foreach ($_SESSION['mycart'] as $key => $cartItem) {
                            if ($cartItem[0] == $masanpham) {
                                // Xóa sản phẩm khỏi giỏ hàng
                                unset($_SESSION['mycart'][$key]);
                                // Tái lập lại chỉ mục mảng sau khi xóa phần tử
                                //array_values() sẽ tái lập lại chỉ mục mảng giỏ hàng, bắt đầu lại từ chỉ mục 0, 1, 2, ... mà không có chỉ mục bị bỏ trống.
                                $_SESSION['mycart'] = array_values($_SESSION['mycart']);
                                break;
                            }
                        }
                    }
                    else {
                        // Xóa tất cả sản phẩm trong giỏ hàng nếu không có mã sản phẩm
                        $_SESSION['mycart'] = [];
                    }
                
                    header('Location: index.php?act=viewcart');
                    exit();
                    break;
                
            case 'viewcart':
                include "view/cart/viewcart.php";
                break;
            case 'dathang':
                include "view/cart/bill.php";
                break;

            case 'billconfirm':
                //tao moi don hang
                if(isset($_POST['confirm']) && ($_POST['confirm'])) {
                    $tennguoidathang = $_POST['tennguoidathang'];
                    $email = $_POST['email'];
                    $diachi = $_POST['diachi'];
                    $sodienthoai = $_POST['sodienthoai'];
                    $ngaydathang = date('h:i:sa d/m/Y');
                    $pttt = $_POST['pttt'];
                    $tongdonhang = tinhTongTien();
                    
                    //tra ve ma don hang moi tao
                    $madonhang = insert_donhang($tennguoidathang, $email, $sodienthoai, $diachi, $pttt, $ngaydathang, $tongdonhang);
                   
                    //insert into cart : $_session['mycart'] & madonhang
                    foreach ($_SESSION['mycart'] as $cart) {
                        insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $madonhang);
                    }

                    //xoa session sau khi mua xong
                    $_SESSION['mycart'] = [];
                }
                $donhang = loadOne_donhang($madonhang);
                $chitietdonhang = loadAll_giohang($madonhang);
                include "view/cart/billconfirm.php";
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