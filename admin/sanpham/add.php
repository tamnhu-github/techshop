<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">THÊM MỚI SẢN PHẨM</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="index.php?act=addsp" method="post" class="bg-light p-4 rounded shadow" enctype="multipart/form-data">
                <!-- Mã sản phẩm -->
                <div class="mb-3">
                    <label for="masanpham" class="form-label">Mã sản phẩm</label>
                    <input type="text" id="masanpham" name="masanpham" class="form-control" disabled>
                </div>
                <!-- danh muc -->
                <div class="mb-3">
                    <label for="maloai" class="form-label">Danh mục</label>
                    <select name ="maloai" class="form-select">
                        <?php
                            foreach ($listdanhmuc as $dm) {
                                extract($dm);
                                echo '<option value="' . $maloai . '">' . $tenloai . '</option>';
                                    
                            }
                        ?>
                    </select> 
                    
                </div>
                <!-- Tên sản phẩm -->
                <div class="mb-3">
                    <label for="tensanpham" class="form-label">Tên sản phẩm</label>
                    <input type="text" id="tensanpham" name="tensanpham" class="form-control" placeholder="Nhập tên sản phẩm">
                </div>
                <!-- Ảnh -->
                <div class="mb-3">
                    <label for="anh" class="form-label">Ảnh minh họa</label>
                    <input type="file" id="anh" name="anh" class="form-control">
                </div>
                <!-- Giá -->
                <div class="mb-3">
                    <label for="gia" class="form-label">Giá bán</label>
                    <input type="text" id="gia" name="gia" class="form-control" placeholder="Nhập giá bán">
                </div>
                <!-- Mô tả -->
                <div class="mb-3">
                    <label for="mota" class="form-label">Mô tả</label>
                    <textarea name="mota" id="mota" cols="30" rows="10" class="form-control" placeholder="Nhập mô tả"></textarea>
                
                </div>
                <!-- Lượt xem -->
                <!-- <div class="mb-3">
                    <label for="luotxem" class="form-label">Tên sản phẩm</label>
                    <input type="number" id="luotxem" name="luotxem" class="form-control" placeholder="Nhập lượt xem sản phẩm">
                </div> -->
                <!-- Mã loại -->
                <!-- <div class="mb-3">
                    <label for="maloai" class="form-label">Mã loại</label>
                    <input type="maloai" id="maloai" name="maloai" class="form-control" placeholder="Nhập mã loại sản phẩm">
                </div> -->
                <!-- Buttons -->
                <div class="mb-3 d-flex justify-content-between">
                    <input type="submit" name="themmoi" value="THÊM MỚI" class="btn btn-primary">
                    <input type="reset" value="NHẬP LẠI" class="btn btn-secondary">
                    <a href="index.php?act=dssp" class="btn btn-info">DANH SÁCH</a>
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
