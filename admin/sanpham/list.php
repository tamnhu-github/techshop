<div class="row m-5">
    <div class="col-12">
        <form action="index.php?act=dssp" method="post" class="row g-3">
            <!-- Ô nhập từ khóa -->
            <div class="col-md-6">
                <input type="text" name="key" class="form-control" placeholder="Nhập từ khóa"
                    value="<?= isset($key) ? htmlspecialchars($key) : '' ?>">
            </div>
            <!-- Danh mục -->
            <div class="col-md-4">
                <select name="maloai" class="form-select">
                    <option value="0">Tất cả</option>
                    <?php
                        foreach ($listdanhmuc as $dm) {
                            extract($dm);
                            echo '<option value="' . $danhmuc['maloai'] . '">' . $tenloai . '</option>';
                        }
                    ?>
                </select>
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
                <h4 class="card-title">DANH SÁCH SẢN PHẨM</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>MÃ SẢN PHẨM</th>
                                <th>ẢNH MINH HỌA</th>
                                <th>TÊN SẢN PHẨM</th>
                                <th>GIÁ</th>
                                <th>LƯỢT XEM</th>
                                <th>MÔ TẢ</th>
                                <th>MÃ LOẠI</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    foreach ($listsanpham as $sp) {
                        extract($sp);
                        $suasp = "index.php?act=suasp&masanpham=".$masanpham;
                        $xoasp = "index.php?act=xoasp&masanpham=".$masanpham;
                        $anhPath = "../upload/".$anh;
                        $mota = strlen($mota) > 70 ? substr($mota, 0, 70) . '...' : $mota;
                            if(is_file($anhPath)) {
                            $anh = "<img src='" . $anhPath . "' class='img-fluid mw-100' style='max-height:100px;'>";
                            }
                            else {
                            $anh = "No photo";

                            }
                            echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$masanpham.'</td>
                                <td>'.$anh.'</td>
                                <td>'.$tensanpham.'</td>
                                <td>'.number_format($gia).'</td>
                                <td>'.$luotxem.'</td>
                                <td>'.$mota.'</td>
                                <td>'.$maloai.'</td>
                                <td>
                                    <a href="'.$suasp.'" class="btn btn-primary btn-sm">Sửa</a>

                                    <a href="'.$xoasp.'" class="btn btn-danger btn-sm">Xóa</a>

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
                <a href="index.php?act=addsp" class="btn btn-success float-end">Thêm mới sản phẩm</a>
            </div>
        </div>
    </div>
</div>