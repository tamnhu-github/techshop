<div class="container my-4">
    <div class="row">
        <div class="col-lg-9">
            <div class="mb-4">
                <h4 class="border-bottom pb-2 mb-3">ĐƠN HÀNG CỦA BẠN</h4>
                <div class="card d-flex">
                    <div class="card-body d-flex justify-content-right">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>MÃ ĐƠN HÀNG</th>
                                            <th>NGÀY ĐẶT HÀNG</th>
                                            <th>SỐ LƯỢNG</th>
                                            <th>TỔNG TIỀN</th>
                                            <th>TRẠNG THÁI</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                if (is_array($listbill)) {
                                                   // echo 'Giá trị user ID: ' . ($_SESSION['user']['id'] ?? 'Không có giá trị');
                                                    foreach ($listbill as $bill) {
                                                        extract($bill);
                                                        $xembill = "index.php?act=xembill&madonhang=".$bill['madonhang'];
                                                        $trangthai = getTrangThaiDonHang($bill['trangthai']);
                                                        $count = demSoLuongMatHang($bill['madonhang']);
                                                        echo '<tr>
                                                                <td>'.$bill['madonhang'].'</td>
                                                                <td>'.$ngaydathang.'</td>
                                                                <td>'.$count.'</td>
                                                                <td>'.number_format($bill['tongdonhang'], 0, ',', '.').' VND</td>
                                                                <td>'.$trangthai.'</td>
                                                                <td>
                                                                    <a href="'.$xembill.'" class="btn btn-primary btn-sm">Xem</a>
                                                                </td>
                                                            </tr>';
                                                    }
                                                }
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