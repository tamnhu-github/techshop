<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShop</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="view/css/style.css">
</head>

<?php
    include "../../model/pdo.php";
    include "../../model/binhluan.php";
    include "../../model/taikhoan.php";
    session_start();
    if (isset($_SESSION['user']['id'])) {
        $iduser = $_SESSION['user']['id'];
    }
    $masanpham = $_REQUEST['masanpham'];
    $listbinhluan = loadAll_binhluan($masanpham);
    $listkhachhang = loadAll_khachhang();
?>

<body>

    <div class="card-body">
        <div class="card-body">
            <table class="table">
                <tbody>
                    <?php
                        foreach ($listbinhluan as $bl) {
                            extract($bl);
                            foreach ($listkhachhang as $kh) {
                                extract($kh);
                                if($iduser == $kh['id']) {
                                    $tennguoibinhluan = $kh['tennguoidung'];
                                }
                            }  
                            echo '
                            <tr>
                                <td class="col-3">' . htmlspecialchars($tennguoibinhluan) . '</td>
                                <td class="col-4">' . nl2br(htmlspecialchars($noidung)) . '</td>
                                <td>' . htmlspecialchars($ngaybinhluan) . '</td>
                            </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- message box -->
        <form class="mt-3 d-flex" action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name="masanpham" value="<?=$masanpham?>">
            <input type="text" class="form-control me-2" placeholder="Hãy viết gì đó về sản phẩm này..." name="noidung">
            <input type="submit" class="btn btn-primary" value="Gửi" name="gui"
                style="background-color: #0080FF"></input>
        </form>

        <?php
            
            if(isset($_POST['gui']) && ($_POST['gui'])) {
                $noidung = $_POST['noidung'];
                $masanpham = $_POST['masanpham'];
                $ngaybinhluan = date('h:i:sa d/m/Y');
                insert_binhluan($iduser, $masanpham, $noidung, $ngaybinhluan);
                header("Location: ".$_SERVER['HTTP_REFERER']);
            }
            
        ?>
    </div>
</body>

</html>