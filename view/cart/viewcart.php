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
                                            viewCart($act);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <form action="index.php?act=dathang" method="post">
                        <input type="hidden" name="madonhang" value="<?= htmlspecialchars($madonhang) ?>">
                        <div class="action-buttons">
                            <a href="index.php?act=xoaspcart" class="btn btn-warning btn-sm me-2">Xóa toàn bộ giỏ hàng</a>
                            <input type="submit" class="btn btn-warning btn-sm" value="Tiếp tục mua hàng">
                        </div>
                    </form>
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
        <?php include "view/rightbox.php"; ?>
    </div>
</div>