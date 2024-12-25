<!-- Main Content -->
<form action="index.php?act=billconfirm" method="post">
    <input type="hidden" name="madonhang" value="<?= htmlspecialchars($madonhang) ?>">
    <div class="container my-4">
        <div class="row">

            <!-- Main Product Section -->
            <div class="col-lg-9">
                <h4 class="border-bottom pb-2 mb-3">THÔNG TIN ĐẶT HÀNG</h4>
                <div class="card mb-4">
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['user'])) {
                            $tennguoidathang = $_SESSION['user']['tennguoidung'];
                            $email = $_SESSION['user']['email'];
                            $sodienthoai = $_SESSION['user']['sodienthoai'];
                            $diachi = $_SESSION['user']['diachi'];
                        } else {
                            $tennguoidathang = "";
                            $email = "";
                            $sodienthoai = "";
                            $diachi = "";
                        }
                        ?>

                        <!-- Thông tin người đặt hàng -->
                        <div class="mb-3">
                            <label for="tennguoidathang" class="form-label fw-bold">Họ và tên người đặt hàng:</label>
                            <input type="text" class="form-control" name="tennguoidathang" value="<?= $tennguoidathang ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email:</label>
                            <input type="email" class="form-control" name="email" value="<?= $email ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="sodienthoai" class="form-label fw-bold">Số điện thoại:</label>
                            <input type="text" class="form-control" name="sodienthoai" value="<?= $sodienthoai ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="diachi" class="form-label fw-bold">Địa chỉ:</label>
                            <input type="text" class="form-control" name="diachi" value="<?= $diachi ?>" required>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <h4 class="pb-2 mb-3 border-bottom">PHƯƠNG THỨC THANH TOÁN</h4>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="pttt" value="2" required>
                        <label class="form-check-label" for="pttt">Thanh toán trực tuyến</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="pttt" value="1" required>
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
                                            viewCart_billconfirm($madonhang);
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
                                <i class="fas fa-wallet me-2"></i> TỔNG TIỀN:
                                <?php echo number_format(tinhtongtien()); ?>
                                VND
                            </strong>
                        </h5>
                    </div>
                    <div class="action-buttons-container" style="display: flex; gap: 10px; align-items: center;">
                        <div class="action-buttons">
                            <a href="index.php?act=viewcart" class="btn btn-warning btn-sm" style="background-color: gray; color: white;">Quay lại</a>
                        </div>
                        <div class="action-buttons">
                            <input type="submit" class="btn btn-warning btn-sm" name="confirm" value="Xác nhận đặt hàng">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <?php include "view/rightbox.php"; ?>
        </div>
    </div>
</form>

<script>
    function capnhatSL(productId, quantity) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "index.php?act=suaspcf", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                console.log("Cập nhật thành công!");
                // Có thể thêm mã để cập nhật lại tổng tiền ở đây nếu cần
            }
        };
        xhr.send("masanpham=" + productId + "&soluong=" + quantity);
    }
</script>