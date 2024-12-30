<!-- Main Content -->
<div class="container my-4">
    <?php
    if (isset($listdonhang) && is_array($listdonhang)) {
        extract($listdonhang);
    }
    ?>
    <div class="row">
        <!-- Main Product Section -->
        <div class="col-lg-12">
            <!-- Header -->
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="pb-2 mb-3 border-bottom">THÔNG TIN ĐƠN HÀNG</h4>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                            <?= $trangthai == 0 ? 'Chờ xác nhận' : ($trangthai == 1 ? 'Đang xử lý' : ($trangthai == 2 ? 'Đang giao hàng' : ($trangthai == 3 ? 'Đã giao hàng' : 'Đã hủy'))) ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="javascript:void(0);" onclick="document.getElementById('trangthai').value = 1; updateButtonText()">Duyệt đơn hàng</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" onclick="document.getElementById('trangthai').value = 2; updateButtonText()">Chuyển giao hàng</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" onclick="document.getElementById('trangthai').value = 3; updateButtonText()">Xác nhận hoàn tất</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" onclick="document.getElementById('trangthai').value = 4; updateButtonText()">Hủy đơn hàng</a>
                            </li>
                        </ul>
                        <a href="index.php?act=xoadh&madonhang=<?= $madonhang ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')">
                            Xóa đơn hàng
                        </a>
                        
                        <a href="index.php?act=suadh&madonhang=<?= $madonhang ?>&trangthai=<?= $trangthai ?>" class="btn btn-sm btn-success">Cập nhật</button>
                        <a href="index.php?act=dsdh" class="btn btn-sm btn-white">Trở về</a>
                    </div>
                </div>

                <div class="order-info">
                    <div class="form-group mb-3">
                        <label for="madonhang" class="form-label fw-bold">Mã đơn hàng</label>
                        <input type="text" id="madonhang" class="form-control" value="<?= $madonhang ?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="ngaydathang" class="form-label fw-bold">Thời gian đặt hàng</label>
                        <input type="text" id="ngaydathang" class="form-control" value="<?= $ngaydathang ?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pttt" class="form-label fw-bold">Phương thức thanh toán</label>
                        <input type="text" id="pttt" class="form-control" value="<?= $pttt == 1 ? 'Thanh toán khi nhận hàng' : ($pttt == 2 ? 'Thanh toán trực tuyến' : 'Không xác định') ?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="trangthai" class="form-label fw-bold">Trạng thái</label>
                        <select id="trangthai" class="form-select" name="trangthai" style="text-decoration: none; color: black;">
                            <option value="0" <?= $trangthai == 0 ? 'selected' : '' ?>>Chờ xác nhận</option>
                            <option value="1" <?= $trangthai == 1 ? 'selected' : '' ?>>Đang xử lý</option>
                            <option value="2" <?= $trangthai == 2 ? 'selected' : '' ?>>Đang giao hàng</option>
                            <option value="3" <?= $trangthai == 3 ? 'selected' : '' ?>>Đã giao hàng</option>
                            <option value="4" <?= $trangthai == 4 ? 'selected' : '' ?>>Đã hủy</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tongdonhang" class="form-label fw-bold">Tổng tiền đơn hàng</label>
                        <input type="text" id="tongdonhang" class="form-control" value="<?= number_format($tongdonhang, 0, ',', '.') ?> VND" readonly>
                    </div>
                    
                </div>
            </div>

            <div class="mb-4">
                <h4 class="border-bottom pb-2 mb-3 mt-5">CHI TIẾT ĐƠN HÀNG</h4>
                <div class="card">
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
                                    <?php donhang_chitiet($chitietdonhang); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>

<script>
function updateButtonText() {
    const statusSelect = document.getElementById('trangthai');
    const selectedStatus = statusSelect.value;
    const statusText = statusSelect.options[statusSelect.selectedIndex].text;
    document.querySelector('.dropdown-toggle').innerText = statusText;
    const updateLink = document.querySelector('.btn-success');
    updateLink.href = `index.php?act=suadh&madonhang=${document.getElementById('madonhang').value}&trangthai=${selectedStatus}`;
}

</script>