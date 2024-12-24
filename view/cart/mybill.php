<!-- Main Content -->
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
                                            <th>SỐ LƯỢNG MẶT HÀNG</th>
                                            <th>TỔNG TIỀN</th>
                                            <th>TRẠNG THÁI ĐƠN HÀNG</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(is_array($listbill)) {
                                            foreach ($listbill as $bill) {
                                                extract($bill);
                                                $xembill = "index.php?act=xembill&madonhang=".$bill['madonhang'];
                                                $trangthai = getTrangThaiDonHang($bill['trangthai']);
                                                $count = demSoLuongMatHang($bill['madonhang']);
                                                    echo '<tr>
                                                                <td>'.$bill['madonhang'].'</td>
                                                                <td>'.$ngaydathang.'</td>
                                                                <td>'.$count.'</td>
                                                                <td>'.$bill['tongdonhang'].'</td>
                                                                <td>'.$trangthai.' VND</td>
                                                                <td>
                                                                    <a href="'.$xembill.'" class="btn btn-primary btn-sm">Xem chi tiết</a>

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