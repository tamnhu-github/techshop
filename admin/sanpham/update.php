<?php
    if(is_array($sanpham)) {
        extract($sanpham);
    }
    $anhPath = "../upload/".$anh;
    if(is_file($anhPath)) {
        $anh = "<img src='" . $anhPath . "' class='img-fluid form-control' style='width:50%;'>";
    }
    else {
        $anh = "No photo";
    }
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">CẬP NHẬT SẢN PHẨM</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
        <form action="index.php?act=updatesp" method="post" class="bg-light p-4 rounded shadow" enctype="multipart/form-data">
                <input type="hidden" name="masanpham" value="<?=$masanpham?>">
                <!-- Mã sản phẩm -->
                <!-- <div class="mb-3">
                    <label for="masanpham" class="form-label">Mã sản phẩm</label>
                    <input type="text" id="masanpham" name="masanpham" class="form-control" disabled>
                </div> -->
                <!-- Tên sản phẩm -->
                <div class="mb-3">
                    <label for="tensanpham" class="form-label">Tên sản phẩm</label>
                    <input type="text" id="tensanpham" name="tensanpham" value="<?=$tensanpham?>" class="form-control" placeholder="Nhập tên sản phẩm">
                </div>
                <!-- Ảnh -->
                <div class="mb-3">
                    <label for="anh" class="form-label">Ảnh minh họa</label>
                    <?=$anh?>
                    <input type="file" id="anh" name="anh" class="form-control">
                </div>
                <!-- Giá -->
                <div class="mb-3">
                    <label for="gia" class="form-label">Giá bán</label>
                    <input type="text" id="gia" name="gia" value="<?=$gia?>" class="form-control" placeholder="Nhập giá bán">
                </div>
                <!-- Mô tả -->
                <div class="mb-3">
                    <label for="mota" class="form-label">Mô tả</label>
                    <textarea name="mota" id="mota" cols="30" rows="10" class="form-control"><?=$mota?></textarea>
                
                </div>
                <!-- Lượt xem -->
                <!-- <div class="mb-3">
                    <label for="luotxem" class="form-label">Tên sản phẩm</label>
                    <input type="number" id="luotxem" name="luotxem" class="form-control" placeholder="Nhập lượt xem sản phẩm">
                </div> -->
                <!-- Mã loại -->
                <div class="mb-3">
                    <label for="maloai" class="form-label">Tên loại:</label>
                    <select name="maloai" class="form-select" disabled>
                        <option value="0">Tất cả</option>
                        <?php
                            foreach ($listdanhmuc as $dm) {
                                extract($dm);
                                if($dm['maloai'] == $sanpham['maloai'])
                                    echo '<option value="' . $maloai . '"selected>' . $tenloai . '</option>';
                                else echo '<option value="' . $maloai . '">' . $tenloai . '</option>';
                            }  
                        ?>
                    </select>
                </div>
                <!-- Buttons -->
                <div class="mb-3 d-flex justify-content-between">
                    <input type="submit" name="capnhat" value="CẬP NHẬT" class="btn btn-primary">
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
