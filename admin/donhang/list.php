<div class="row m-5">
    <div class="col-12">
        <form action="index.php?act=dsdh" method="post" class="row g-3">
            <!-- Ô nhập từ khóa -->
            <div class="col-md-10">
                <input type="text" name="key" class="form-control" placeholder="Nhập mã đơn hàng hoặc tên người đặt hàng"
                    value="<?= isset($key) ? htmlspecialchars($key) : '' ?>">
            </div>
            <!-- Nút tìm kiếm -->
            <div class="col-md-2">
                <input type="submit" class="btn btn-primary w-100" name="btnTim" value="Tìm kiếm"></input>
            </div>
        </form>
    </div>
</div>


<div class="row m-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">DANH SÁCH ĐƠN HÀNG</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>MÃ ĐƠN HÀNG</th>
                                <th>KHÁCH HÀNG</th>
                                <th>SỐ LƯỢNG</th>
                                <th>TỔNG TIỀN</th>
                                <th>TRẠNG THÁI ĐƠN HÀNG</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($listdonhang as $dh) {
                                    extract($dh);
                                    foreach ($listkhachhang as $kh) {
                                        extract($kh);
                                        if($iduser == $kh['id']) {
                                            $tennguoidathang = $kh['tennguoidung'];
                                        }
                                    }
                                    $count = demSoLuongMatHang($dh['madonhang']);
                                    $trangthai = getTrangThaiDonHang($dh['trangthai']);
                                    $suadh = "index.php?act=suadh&madonhang=".$madonhang;
                                    $xoadh = "index.php?act=xoadh&madonhang=".$madonhang;
                                        echo '<tr>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td>'.$madonhang.'</td>
                                            <td>'.$tennguoidathang.'</td>
                                            <td>'.$count.'</td>
                                            <td>'.number_format($dh['tongdonhang'], 0, ',', '.').' VND</td>
                                            <td>'.$trangthai.'</td>
                                            <td>
                                                <a href="'.$suadh.'" class="btn btn-primary btn-sm">Sửa</a>

                                                <a href="'.$xoadh.'" class="btn btn-danger btn-sm">Xóa</a>

                                            </td>
                                        </tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary">Chọn tất cả</button>
                <button type="button" class="btn btn-secondary">Bỏ chọn tất cả</button>
                <button type="button" class="btn btn-danger">Xóa các mục đã chọn</button>
            </div>
        </div>
    </div>
</div>