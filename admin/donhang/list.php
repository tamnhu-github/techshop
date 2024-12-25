<div class="row m-5">
    <div class="col-12">
        <form action="index.php?act=dsdh" method="post" class="row g-3">
            <!-- Ô nhập từ khóa -->
            <div class="col-md-6">
                <input type="text" name="key" class="form-control" placeholder="Nhập mã đơn hàng hoặc tên người đặt hàng"
                    value="<?= isset($key) ? htmlspecialchars($key) : '' ?>">
            </div>
            <!-- Tìm kiếm theo trạng thái -->
            <div class="col-md-2">
                <select name="trangthai" class="form-select">
                    <option value="">Tất cả</option>
                    <option value="0" <?= (isset($trangthai) && $trangthai == 0) ? 'selected' : '' ?>>Chờ xác nhận</option>
                    <option value="1" <?= (isset($trangthai) && $trangthai == 1) ? 'selected' : '' ?>>Đang xử lý</option>
                    <option value="2" <?= (isset($trangthai) && $trangthai == 2) ? 'selected' : '' ?>>Đang giao hàng</option>
                    <option value="3" <?= (isset($trangthai) && $trangthai == 2) ? 'selected' : '' ?>>Đã giao hàng</option>
                    <option value="2" <?= (isset($trangthai) && $trangthai == 2) ? 'selected' : '' ?>>Đã hủy</option>
                </select>
            </div>
            <!-- Tìm kiếm theo ngày tháng -->
            <div class="col-md-2">
                <input type="date" name="ngaydathang" class="form-control" value="<?= isset($ngaydathang) ? htmlspecialchars($ngaydathang) : '' ?>">
            </div>
            <!-- Nút tìm kiếm -->
            <div class="col-md-2">
                <input type="submit" class="btn btn-primary w-100" name="btnTim" value="Tìm kiếm">
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
                    <p>Có <strong><?= $totalItems ?></strong> đơn hàng trong tổng số <strong><?= $totalPages ?></strong> trang</p>
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
                            <?php foreach ($listdonhang as $dh): ?>
                                <?php
                                extract($dh);
                                $tennguoidathang = '';
                                foreach ($listkhachhang as $kh) {
                                    if ($iduser == $kh['id']) {
                                        $tennguoidathang = $kh['tennguoidung'];
                                        break; // Thoát khỏi vòng lặp khi tìm thấy
                                    }
                                }
                                $count = demSoLuongMatHang($dh['madonhang']);
                                $trangthai = getTrangThaiDonHang($dh['trangthai']);
                                $suadh = "index.php?act=ctdh&madonhang=" . $madonhang;
                                $xoadh = "index.php?act=xoadh&madonhang=" . $madonhang;
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><?= htmlspecialchars($madonhang) ?></td>
                                    <td><?= htmlspecialchars($tennguoidathang) ?></td>
                                    <td><?= htmlspecialchars($count) ?></td>
                                    <td><?= number_format($dh['tongdonhang'], 0, ',', '.') ?> VND</td>
                                    <td><?= htmlspecialchars($trangthai) ?></td>
                                    <td>
                                        <a href="<?= htmlspecialchars($suadh) ?>" class="btn btn-primary btn-sm">Sửa</a>
                                        <a href="<?= htmlspecialchars($xoadh) ?>" class="btn btn-danger btn-sm">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary">Chọn tất cả</button>
                <button type="button" class="btn btn-secondary">Bỏ chọn tất cả</button>
                <button type="button" class="btn btn-danger">Xóa các mục đã chọn</button>
                <div class="text-center mt-3">
    <ul class="pagination justify-content-center">
        <!-- Previous button -->
        <li class="page-item <?= ($currentPage == 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="<?= ($currentPage > 1) ? 'index.php?act=dsdh&page=' . ($currentPage - 1) . '&key=' . htmlspecialchars($key) . '&trangthai=' . htmlspecialchars($trangthai) . '&ngaydathang=' . htmlspecialchars($ngaydathang) : '#' ?>">
                &lt;
            </a>
        </li>

        <!-- Page numbers -->
        <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
            <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                <a class="page-link" href="index.php?act=dsdh&page=<?= $i ?>&key=<?= htmlspecialchars($key) ?>&trangthai=<?= htmlspecialchars($trangthai) ?>&ngaydathang=<?= htmlspecialchars($ngaydathang) ?>">
                    <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>

        <!-- Next button -->
        <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : '' ?>">
            <a class="page-link" href="<?= ($currentPage < $totalPages) ? 'index.php?act=dsdh&page=' . ($currentPage + 1) . '&key=' . htmlspecialchars($key) . '&trangthai=' . htmlspecialchars($trangthai) . '&ngaydathang=' . htmlspecialchars($ngaydathang) : '#' ?>">
                &gt;
            </a>
        </li>
    </ul>
</div>
            </div>
        </div>
    </div>
</div>