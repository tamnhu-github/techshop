<div class="row m-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">DANH SÁCH BÌNH LUẬN</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>MÃ BÌNH LUẬN</th>
                                <th>NGƯỜI BÌNH LUẬN</th>
                                <th>TÊN SẢN PHẨM</th>
                                <th>NỘI DUNG</th>
                                <th>NGÀY BÌNH LUẬN</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($listbinhluan as $bl) {
                                    extract($bl);
                                    foreach ($listsanpham as $sp) {
                                        extract($sp);
                                        if($masanpham == $sp['masanpham']) {
                                            $tensanpham = $sp['tensanpham'];
                                        }
                                    }
                                    foreach ($listkhachhang as $kh) {
                                        extract($kh);
                                        if($iduser == $kh['id']) {
                                            $tennguoibinhluan = $kh['tennguoidung'];
                                        }
                                    }
                                
                                    $xoabl = "index.php?act=xoabl&idmsg=".$idmsg;

                                    echo '<tr>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td>'.$idmsg.'</td>
                                            <td>'.$tennguoibinhluan.'</td>
                                            <td>'.$tensanpham.'</td>
                                            <td>'.$noidung.'</td>
                                            <td>'.$ngaybinhluan.'</td>
                                            <td>

                                            <a href="'.$xoabl.'" class="btn btn-danger btn-sm">Xóa</a>

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

            </div>
        </div>
    </div>
</div>