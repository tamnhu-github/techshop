
<?php 
    include "model/pdo.php";
    include "model/danhmuc.php";
    include "model/sanpham.php";
    include 'view/header.php';
    include 'global.php';
    
    $spnew = loadall_sanpham_home();
    $dsdm = loadAll_danhmuc();
    $dstop10 = loadall_sanpham_top10();

    if((isset($_GET['act']))&&($_GET['act']!="")){
        $act = $_GET['act'];
        switch ($act){
            case 'gioithieu':
                include "view/gioithieu.php";
                break;
            case 'lienhe':
                include "view/lienhe.php";
                break;
            default:
                include "view/home.php";
                break;
        }
    }else{
        include "view/home.php";
    }
    include 'view/footer.php';

?>

