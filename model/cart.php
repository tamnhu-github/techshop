<?php
function viewCart()
{
    $tongtien = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $suasp = "index.php?act=suasp&masanpham=" . $cart[0];
        $xoasp = "index.php?act=xoaspcart&masanpham=" . $cart[0];
        $anhPath = $cart[2];
        $ttien = $cart[3] * $cart[4];
        $tongtien += $ttien;

        if (is_file($cart[2])) {
            $anh = "<img src='" . $anhPath . "' class='img-fluid' style='max-height:100px;'>";
        } else {
            $anh = "No photo";
        }

        echo '<tr>
                    <td>' . $anh . '</td>
                    <td>' . $cart[1] . '</td>
                    <td>' . number_format($cart[3]) . ' VND</td>
                    <td>
                        <form action="index.php?act=suasp" method="POST" class="d-inline">
                            <input type="hidden" name="masanpham" value="' . $cart[0] . '">
                            <input type="number" name="soluong" value="' . $cart[4] . '" min="1" required 
                                   onblur="this.form.submit();" 
                                   style="width: 60px; text-align: center;">
                        </form>
                    </td>
                    <td>' . number_format($ttien) . ' VND</td>
                    <td>
                        <a href="' . $xoasp . '" class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>';
    }

    echo '
            <tr class="total-amount">
                <td colspan="4" class="text-end">
                    <strong>TỔNG TIỀN:</strong>
                </td>
                <td>' . number_format($tongtien) . ' VND</td>
            </tr>';
}
function viewCart_billconfirm($madonhang)
{
    $tongtien = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $anhPath = $cart[2];
        $ttien = $cart[3] * $cart[4];
        $tongtien += $ttien;

        $anh = is_file($anhPath) ? "<img src='" . $anhPath . "' class='img-fluid' style='max-height:100px;'>" : "No photo";

        echo '<tr>
                <td>' . $anh . '</td>
                <td>' . $cart[1] . '</td>
                <td>' . number_format($cart[3]) . ' VND</td>
                <td>
                    <input type="number" class="form-control" value="' . $cart[4] . '" min="1" 
                           onchange="capnhatSL(' . $cart[0] . ', this.value);">
                </td>
                <td>' . number_format($ttien) . ' VND</td>
                <td>
                    <a href="index.php?act=xoaspcart&masanpham=' . $cart[0] . '" class="btn btn-danger btn-sm">Xóa</a>
                </td>
            </tr>';
    }

    echo '<tr class="total-amount">
            <td colspan="4" class="text-end">
                <strong>TỔNG TIỀN:</strong>
            </td>
            <td>' . number_format($tongtien) . ' VND</td>
          </tr>';
}
function getSoLuongGioHang()
{
    if (isset($_SESSION['mycart']) && is_array($_SESSION['mycart'])) {
        $total = 0;
        foreach ($_SESSION['mycart'] as $cartItem) {
            $total += $cartItem[4];
        }
        return $total;
    }
    return 0;
}
function tinhTongTien()
{
    $tongtien = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $ttien = $cart[3] * $cart[4];
        $tongtien += $ttien;
    }
    return $tongtien;
}
function insert_donhang($iduser, $tennguoidathang, $email, $sodienthoai, $diachi, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "INSERT INTO donhang (iduser, tennguoidathang, email, sodienthoai, diachi, pttt, ngaydathang, tongdonhang) VALUES ('$iduser','$tennguoidathang','$email','$sodienthoai','$diachi','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}

function insert_cart($iduser, $masanpham, $anh, $tensanpham, $gia, $soluong, $thanhtien, $madonhang)
{
    $sql = "INSERT INTO giohang (iduser, masanpham, anh, tensanpham, gia, soluong, thanhtien, madonhang) VALUES ('$iduser','$masanpham','$anh','$tensanpham','$gia','$soluong','$thanhtien','$madonhang')";
    pdo_execute($sql);
}

function loadOne_donhang($madonhang)
{
    $sql = "select * from donhang where madonhang =" . $madonhang;
    $dh = pdo_query_one($sql);
    return $dh;
}

function loadAll_donhang($iduser)
{
    $sql = "select * from donhang where iduser =" . $iduser;
    $listbill = pdo_query($sql);
    return $listbill;
}

function loadAll_listBill($key = "", $trangthai = "", $ngaydathang = "")
{
    $sql = "SELECT * FROM donhang WHERE 1";

    // Tìm kiếm theo mã đơn hàng hoặc tên người đặt hàng
    if ($key != "") {
        $sql .= " AND (madonhang LIKE '%" . $key . "%' OR tennguoidathang LIKE '%" . $key . "%')";
    }

    // Tìm kiếm theo trạng thái
    if ($trangthai !== "") {
        $sql .= " AND trangthai = " . intval($trangthai);
    }

    // Tìm kiếm theo ngày đặt hàng
    if ($ngaydathang != "") {
        // Chuyển đổi định dạng từ 'd/m/Y' sang 'Y-m-d H:i:s'
        $formattedDate = DateTime::createFromFormat('Y-m-d', $ngaydathang);
        if ($formattedDate) {
            $dateString = $formattedDate->format('Y-m-d');
            $startOfDay = $dateString . ' 00:00:00';
            $endOfDay = $dateString . ' 23:59:59';
            $sql .= " AND STR_TO_DATE(ngaydathang, '%h:%i:%s %p %d/%m/%Y') BETWEEN '" . $startOfDay . "' AND '" . $endOfDay . "'";
        }
    }

    $sql .= " ORDER BY madonhang DESC";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
}

function donhang_chitiet($chitietdonhang)
{
    global $img_path;
    $tongtien = 0; // Khởi tạo tổng tiền bên ngoài vòng lặp
    foreach ($chitietdonhang as $cart) {
        $anhPath = $cart['anh'];
        $tongtien += $cart['thanhtien']; // Cộng dồn tổng tiền
        if (is_file($cart['anh'])) {
            $anh = "<img src='" . $anhPath . "' class='img-fluid mw-100' style='max-height:100px;'>";
        } else {
            $anh = "No photo";
        }
        echo '<tr>
                <td>' . $anh . '</td>
                <td>' . $cart['tensanpham'] . '</td>
                <td>' . number_format($cart['gia']) . '</td>
                <td>' . $cart['soluong'] . '
                    
                    
                </td>
                <td style="text-align: right;">' . number_format($cart['thanhtien']) . ' VND</td>                                                    
            </tr>';
    }
    echo '<tr>
            <td colspan="4" style="text-align: right; font-weight: bold;">Tổng tiền:</td>
            <td style="text-align: right; font-weight: bold;">' . number_format($tongtien) . ' VND</td>                                                    
        </tr>';
}

//lấy toàn bộ sản phẩm trong giỏ hàng đã mua (có cùng mã đơn hàng)
function loadAll_giohang($madonhang)
{
    $sql = "select * from giohang where madonhang =" . $madonhang;
    $donhang = pdo_query($sql);
    return $donhang;
}

function getTrangThaiDonHang($status)
{
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
        case 4:
            $trangthai = "Đã hủy";
            break;
        default:
            $trangthai = "Không xác định";
            break;
    }
    return $trangthai;
}

function demSoLuongMatHang($madonhang)
{
    $sql = "select * from giohang where madonhang =" . $madonhang;
    $donhang = pdo_query($sql);
    return sizeof($donhang);
}
function update_donhang($madonhang, $trangthai)
{
    $sql = "UPDATE donhang SET trangthai =" . $trangthai . " WHERE madonhang =" . $madonhang;
    pdo_execute($sql);
}
function delete_donhang($madonhang)
{
    // Kiểm tra trạng thái của đơn hàng (Nếu ở trang thái 0: Đơn hàng vừa dc tạo, 4:Đơn hàng đã hủy
    //thì mới cho phép xóa)
    $sqlCheck = "SELECT COUNT(*) FROM donhang WHERE madonhang = ? AND (trangthai = 0 OR trangthai = 4)";

    try {
        $stmtCheck = pdo_get_connection()->prepare($sqlCheck);
        $stmtCheck->execute([$madonhang]);
        $result = $stmtCheck->fetchColumn();

        if ($result > 0) {
            // Xóa đơn hàng từ bảng giohang
            $sqlDeleteGioHang = "DELETE FROM giohang WHERE madonhang = ?";
            pdo_execute($sqlDeleteGioHang, $madonhang);

            // Xóa đơn hàng từ bảng donhang
            $sqlDeleteDonHang = "DELETE FROM donhang WHERE madonhang = ?";
            pdo_execute($sqlDeleteDonHang, $madonhang);

            return [
                "success" => true,
                "message" => "Xóa đơn hàng thành công!"
            ];
            
        } else {
            return [
                "success" => false,
                "message" => "Không thể xóa đơn hàng. Đơn hàng không tồn tại hoặc không ở trạng thái cho phép."
            ];
        }
    } catch (PDOException $e) {
        return [
            "success" => false,
            "message" => "Lỗi khi xóa đơn hàng: " . $e->getMessage()
        ];
    }
}
