<?php
function loadall_thongke_sanphamdanhmuc()
{
    $sql = "SELECT danhmuc.maloai AS maloai, 
                       danhmuc.tenloai AS tenloai, 
                       COUNT(sanpham.masanpham) AS countsp, 
                       MIN(sanpham.gia) AS mingia, 
                       MAX(sanpham.gia) AS maxgia, 
                       AVG(sanpham.gia) AS avggia 
                FROM sanpham 
                LEFT JOIN danhmuc ON danhmuc.maloai = sanpham.maloai 
                GROUP BY danhmuc.maloai 
                ORDER BY danhmuc.maloai DESC";
    $dstk = pdo_query($sql);
    return $dstk;
}

function loadall_thongke_donhang_ngay()
{
    $sql = "SELECT DATE(STR_TO_DATE(ngaydathang, '%h:%i:%s%p %d/%m/%Y')) AS ngay, 
                   COUNT(*) AS so_luong_don_hang
            FROM donhang
            GROUP BY DATE(STR_TO_DATE(ngaydathang, '%h:%i:%s%p %d/%m/%Y'));";

    $dstk = pdo_query($sql);
    return $dstk;
}

function loadall_thongke_sp_trend()
{
    $sql = "SELECT g.masanpham, g.tensanpham as tensanpham, SUM(g.soluong) AS tong_soluong
            FROM giohang g
            JOIN donhang d ON g.madonhang = d.madonhang
            GROUP BY g.masanpham, g.tensanpham
            ORDER BY tong_soluong DESC
            LIMIT 10; -- Lấy 10 sản phẩm được mua nhiều nhất";

    $dstk = pdo_query($sql);
    return $dstk;
}

function loadall_thongke_doanhthu_ngay()
{
    $sql = "SELECT DATE(STR_TO_DATE(ngaydathang, '%h:%i:%s%p %d/%m/%Y')) AS ngay, 
                   SUM(tongdonhang) AS doanh_thu
            FROM donhang
            GROUP BY DATE(STR_TO_DATE(ngaydathang, '%h:%i:%s%p %d/%m/%Y'));";

    $dstk = pdo_query($sql);
    return $dstk;
}


