<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">THÊM MỚI LOẠI HÀNG HÓA</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="index.php?act=adddm" method="post" class="bg-light p-4 rounded shadow">
                <!-- Mã Loại -->
                <div class="mb-3">
                    <label for="maloai" class="form-label">Mã loại</label>
                    <input type="text" id="maloai" name="maloai" class="form-control" disabled>
                </div>
                <!-- Tên Loại -->
                <div class="mb-3">
                    <label for="tenloai" class="form-label">Tên loại</label>
                    <input type="text" id="tenloai" name="tenloai" class="form-control" placeholder="Nhập tên loại hàng hóa">
                </div>
                <!-- Buttons -->
                <div class="mb-3 d-flex justify-content-between">
                    <input type="submit" name="themmoi" value="THÊM MỚI" class="btn btn-primary">
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
