<?php
    if(is_array($dm)) {
        extract($dm);
    }
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">CẬP NHẬT LOẠI HÀNG HÓA</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="index.php?act=updatedm" method="post" class="bg-light p-4 rounded shadow">
                <input type="hidden" name="maloai" value="<?= (isset($maloai) && $maloai > 0 ) ? htmlspecialchars($maloai) : '' ?>">
            <!-- Mã Loại -->
                <div class="mb-3">
                    <label for="maloai" class="form-label">Mã loại</label>
                    <input 
                        type="text" 
                        name="maloai" 
                        id="maloai" 
                        value="<?= isset($maloai) ? htmlspecialchars($maloai) : '' ?>" 
                        class="form-control" 
                        disabled>
                </div>

                <!-- Tên Loại -->
                <div class="mb-3">
                    <label for="tenloai" class="form-label">Tên loại</label>
                    <input 
                        type="text" 
                        id="tenloai" 
                        name="tenloai" 
                        value="<?= isset($tenloai) && $tenloai !== null ? htmlspecialchars($tenloai) : '' ?>" 
                        class="form-control" 
                        placeholder="Nhập tên loại hàng hóa">
                </div>

                <!-- Buttons -->
                <div class="mb-3 d-flex justify-content-between">
                    <input type="submit" name="capnhat" value="CẬP NHẬT" class="btn btn-primary">
                    <input type="reset" value="NHẬP LẠI" class="btn btn-secondary">
                    <a href="index.php?act=dsdm" class="btn btn-info">DANH SÁCH</a>
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
