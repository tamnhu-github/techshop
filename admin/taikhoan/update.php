<?php
    if(is_array($tk)) {
        extract($tk);
    }
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">CẬP NHẬT THÔNG TIN TÀI KHOẢN</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="index.php?act=updatekh" method="post" class="bg-light p-4 rounded shadow">
                <input type="hidden" name="id" value="<?= (isset($id) && $id > 0 ) ? htmlspecialchars($id) : '' ?>">
                <div class="mb-3">
                    <label for="tennguoidung" class="form-label">Tên tài khoản </label>
                    <input type="text" name="tennguoidung"
                        value="<?= isset($tennguoidung) ? htmlspecialchars($tennguoidung) : '' ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email"
                        value="<?= isset($email) && $email !== null ? htmlspecialchars($email) : '' ?>"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label for="sodienthoai" class="form-label">Số điện thoại</label>
                    <input type="text" name="sodienthoai"
                        value="<?= isset($sodienthoai) && $sodienthoai !== null ? htmlspecialchars($sodienthoai) : '' ?>"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label for="diachi" class="form-label">Địa chỉ</label>
                    <input type="text" name="diachi"
                        value="<?= isset($diachi) && $diachi !== null ? htmlspecialchars($diachi) : '' ?>"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label for="vaitro" class="form-label">Vai trò</label>
                    <input type="number" name="vaitro" max="1"
                        value="<?= isset($vaitro) && $vaitro !== null ? htmlspecialchars($vaitro) : '' ?>"
                        class="form-control">
                </div>

                <!-- Buttons -->
                <div class="mb-3 d-flex justify-content-between">
                    <input type="submit" name="capnhat" value="CẬP NHẬT" class="btn btn-primary">
                    <input type="reset" value="NHẬP LẠI" class="btn btn-secondary">
                    <a href="index.php?act=dskh" class="btn btn-info">DANH SÁCH</a>
                </div>
                <!-- Thông Báo -->
                <?php if (isset($thongbao) && $thongbao != ""): ?>
                <div class="alert alert-success mt-3">
                    <?= $thongbao ?>
                </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>