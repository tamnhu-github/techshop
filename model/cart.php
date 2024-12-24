<?php
    function viewcart() {
        $tongtien = 0;
        foreach ($_SESSION['mycart'] as $cart) {
            $anhPath = $cart[2];
            $ttien = $cart[3] * $cart[4];
            $tongtien += $ttien;
            if(is_file($cart[2])) {
                $anh = "<img src='" . $anhPath . "' class='img-fluid mw-100' style='max-height:100px;'>";
            }
            else {
                $anh = "No photo";
            }
            echo '<tr>
                    <td>'.$anh.'</td>
                    <td>'.$cart[1].'</td>
                    <td>'.number_format($cart[3]).'</td>
                    <td>'.$cart[4].'</td>
                    <td>'.number_format($ttien).' VND</td>                                                    
                </tr>'; 
        }                                   
    }
    function tinhTongTien() {
        $tongtien = 0;
        foreach ($_SESSION['mycart'] as $cart) {
            $ttien = $cart[3] * $cart[4];
            $tongtien += $ttien;
        }
        return $tongtien;
    }
    function insert_donhang($tennguoidathang, $email, $sodienthoai, $diachi, $pttt, $ngaydathang, $tongdonhang) {
        $sql = "INSERT INTO donhang (tennguoidathang, email, sodienthoai, diachi, pttt, ngaydathang, tongdonhang) VALUES ('$tennguoidathang','$email','$sodienthoai','$diachi','$pttt','$ngaydathang','$tongdonhang')";
        return pdo_execute_return_lastInsertId($sql);
    }
    // function insert_donhang($iduser, $tennguoidathang, $email, $sodienthoai, $diachi, $pttt, $ngaydathang, $tongdonhang) {
    //     $sql = "INSERT INTO donhang (iduser, tennguoidathang, email, sodienthoai, diachi, pttt, ngaydathang, tongdonhang) VALUES ('$iduser','$tennguoidathang','$email','$sodienthoai','$diachi','$pttt','$ngaydathang','$tongdonhang')";
    //     return pdo_execute_return_lastInsertId($sql);
    // }

    function insert_cart($iduser, $masanpham, $anh, $tensanpham, $gia, $soluong, $thanhtien, $madonhang) {
        $sql = "INSERT INTO giohang (iduser, masanpham, anh, tensanpham, gia, soluong, thanhtien, madonhang) VALUES ('$iduser','$masanpham','$anh','$tensanpham','$gia','$soluong','$thanhtien','$madonhang')";
        pdo_execute($sql);
    }

    function loadOne_donhang($madonhang) {
        $sql = "select * from donhang where madonhang =".$madonhang;
        $dh = pdo_query_one($sql);
        return $dh;
    }
    function loadAll_donhang($iduser) {
        $sql = "select * from donhang where iduser =".$iduser;
        $listbill = pdo_query($sql);
        return $listbill;
    }
    function donhang_chitiet($chitietdonhang) {
        global $img_path;
        $tongtien = 0; // Khởi tạo tổng tiền bên ngoài vòng lặp
        foreach ($chitietdonhang as $cart) {
            $anhPath = $cart['anh'];
            $tongtien += $cart['thanhtien']; // Cộng dồn tổng tiền
            if(is_file($cart['anh'])) {
                $anh = "<img src='" . $anhPath . "' class='img-fluid mw-100' style='max-height:100px;'>";
            }
            else {
                $anh = "No photo";
            }
            echo '<tr>
                <td>'.$anh.'</td>
                <td>'.$cart['tensanpham'].'</td>
                <td>'.number_format($cart['gia']).'</td>
                <td>'.$cart['soluong'].'</td>
                <td style="text-align: right;">'.number_format($cart['thanhtien']).' VND</td>                                                    
            </tr>'; 
        }    
        echo '<tr>
            <td colspan="4" style="text-align: right; font-weight: bold;">Tổng tiền:</td>
            <td style="text-align: right; font-weight: bold;">'.number_format($tongtien).' VND</td>                                                    
        </tr>';
    }
    
    //lấy toàn bộ sản phẩm trong giỏ hàng đã mua (có cùng mã đơn hàng)
    function loadAll_giohang($madonhang) {
        $sql = "select * from giohang where madonhang =".$madonhang;
        $donhang = pdo_query($sql);
        return $donhang;
    }

    function getTrangThaiDonHang($status) {
        switch ($status) {
            case 0:
                $trangthai = "Chờ xác nhận";
                break;
            case 1:
                $trangthai = "Đang xử lý";
                break;
            case 2:
                $trangthai = "Đang giao hàng";
                break;
            case 3:
                $trangthai = "Đã giao hàng";
                break;
            default:
                $trangthai = "Không xác định";
                break;
        }
        return $trangthai;
    }

    function demSoLuongMatHang($madonhang) {
        $sql = "select * from giohang where madonhang =".$madonhang;
        $donhang = pdo_query($sql);
        return sizeof($donhang);
    }
    
?>