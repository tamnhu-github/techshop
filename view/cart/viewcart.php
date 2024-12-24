<!-- Main Content -->
<div class="container my-4">
    <div class="row">
        <div class="col-lg-9">
            <div class="mb-4">
                <h4 class="border-bottom pb-2 mb-3">GIỎ HÀNG CỦA BẠN</h4>
                <div class="card d-flex">
                    <div class="card-body d-flex justify-content-right">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>

                                            <th>ẢNH</th>
                                            <th>TÊN SẢN PHẨM</th>
                                            <th>GIÁ</th>
                                            <th>SỐ LƯỢNG</th>
                                            <th>THÀNH TIỀN</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $tongtien = 0;
                                            foreach ($_SESSION['mycart'] as $cart) {
                                                $suasp = "index.php?act=suasp&masanpham=".$cart[0];
                                                $xoasp = "index.php?act=xoaspcart&masanpham=".$cart[0];
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
                                                        <td>
                                                            <a href="'.$suasp.'" class="btn btn-primary btn-sm">Sửa</a>

                                                            <a href="'.$xoasp.'" class="btn btn-danger btn-sm">Xóa</a>

                                                        </td>
                                                    </tr>';
                                            }
                                        
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="total-amount">
                        <h5>
                            <strong>
                                <i class="fas fa-wallet me-2"></i> TỔNG TIỀN:
                                <?php echo number_format(tinhtongtien()); ?>
                                VND
                            </strong>
                        </h5>
                    </div>
                    <div class="action-buttons">
                        <a href="index.php?act=xoaspcart" class="btn btn-warning btn-sm me-2">Xóa toàn bộ giỏ hàng</a>
                        <a href="index.php?act=dathang" class="btn btn-warning btn-sm">Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
            <?php if (isset($thongbao)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: 10px 0;">
                <?php echo htmlspecialchars($thongbao); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>



        </div>


        <!-- Right Sidebar -->
        <?php
        include "view/rightbox.php";
        ?>
    </div>
</div>