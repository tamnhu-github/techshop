<?php
    include "view/header.php";
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
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