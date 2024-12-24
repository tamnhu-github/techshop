<!-- Main Content -->
<div class="container my-4">
    <?php               
        if(isset($donhang) && is_array($donhang)) {
            extract($donhang);
        }
    ?>
    <div class="row">
        <!-- Main Product Section -->
        <div class="col-lg-9">

            <div class="card-header">
                <h4 class="pb-2 mb-3 border-bottom text-right">THÔNG TIN ĐƠN HÀNG</h4>
                <div class="order-info">
                    <div class="form-group mb-3">
                        <label for="madonhang" class="form-label fw-bold">Mã đơn hàng</label>
                        <input type="text" id="madonhang" class="form-control" name="madonhang"
                            value="<?=$donhang['madonhang']?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="ngaydathang" class="form-label fw-bold">Thời gian đặt hàng</label>
                        <input type="text" id="ngaydathang" class="form-control" name="ngaydathang"
                            value="<?=$donhang['ngaydathang']?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pttt" class="form-label fw-bold">Phương thức thanh toán</label>
                        <input type="text" id="pttt" class="form-control" name="pttt"
                            value="<?= $donhang['pttt'] == 1 ? 'Thanh toán khi nhận hàng' : ($donhang['pttt'] == 2 ? 'Thanh toán trực tuyến' : 'Phương thức không xác định') ?>"
                            readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="trangthai" class="form-label fw-bold">Trạng thái</label>
                        <input type="text" id="trangthai" class="form-control" name="trangthai" value="<?php 
                                switch ($donhang['trangthai']) {
                                    case 0:
                                        echo 'Chờ xác nhận';
                                        break;
                                    case 1:
                                        echo 'Đang xử lý';
                                        break;
                                    case 2:
                                        echo 'Đang giao hàng';
                                        break;
                                    case 3:
                                        echo 'Đã giao hàng';
                                        break;
                                    default:
                                        echo 'Trạng thái không xác định';
                                }
                            ?>" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tongdonhang" class="form-label fw-bold">Tổng tiền đơn hàng</label>
                        <input type="text" id="tongdonhang" class="form-control" name="tongdonhang"
                            value="<?= number_format($donhang['tongdonhang'], 0, ',', '.') ?> VND" readonly>
                    </div>

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
                                            donhang_chitiet($chitietdonhang);  
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>



        <!-- Right Sidebar -->
        <?php
        include "view/rightbox.php";
        ?>
    </div>
</div>