<!-- Main Content -->
<div class="container my-4">
    <div class="row">
        <!-- Main Product Section -->
        <div class="col-lg-9">
            <!-- Box: Chi Tiết Sản Phẩm -->
            <div class="mb-4">
                <h4 class="border-bottom pb-2 mb-3">THÔNG TIN ĐẶT HÀNG</h4>
                <div class="card d-flex">
                    <div class="card-body d-flex justify-content-right">
                        <div class="custom-margin">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="d-flex align-items-center">
                                        <label for="mkhientai" class="form-label mb-0 me-2">Tên người đặt hàng</label>
                                        <input type="password" class="form-control" name="mkhientai" required>
                                    </div>
                                </div>
                                <!-- Mật khẩu mới -->
                                <div class="col-md-4 mb-3">
                                    <div class="d-flex align-items-center">
                                        <label for="mkmoi" class="form-label mb-0 me-2">Số điện thoại</label>
                                        <input type="password" class="form-control" name="mkmoi" required>
                                    </div>
                                </div>
                                <!-- Mật khẩu xác nhận -->
                                <div class="col-md-4 mb-3">
                                    <div class="d-flex align-items-center">
                                        <label for="mkxacnhan" class="form-label mb-0 me-2">Địa chỉ</label>
                                        <input type="password" class="form-control" name="mkxacnhan">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="card-header">
                <h4 class="pb-2 mb-3 border-bottom">PHƯƠNG THỨC THANH TOÁN</h4>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="onlinePayment" name="paymentMethod" value="online">
                    <label class="form-check-label" for="onlinePayment">Thanh toán trực tuyến</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="codPayment" name="paymentMethod" value="cod">
                    <label class="form-check-label" for="codPayment">Thanh toán khi nhận hàng</label>
                </div>
            </div>




            <div class="mb-4">
                <h4 class="border-bottom pb-2 mb-3 mt-5">CHI TIẾT ĐƠN HÀNG</h4>
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

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
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
                                        
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="total-amount">
                    <h5>
                        <strong>
                            <i class="fas fa-wallet me-2"></i> TỔNG TIỀN: <?php echo number_format($tongtien); ?>
                            VND
                        </strong>
                    </h5>
                </div>
                <div class="action-buttons">
                    <a href="index.php?act=dathang" class="btn btn-warning btn-sm">Đặt hàng</a>
                </div>
            </div>
        </div>


        <!-- Right Sidebar -->
        <?php
        include "view/rightbox.php";
        ?>
    </div>
</div>