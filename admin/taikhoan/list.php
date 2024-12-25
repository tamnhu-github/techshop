<div class="row m-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">DANH SÁCH TÀI KHOẢN</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>MÃ TÀI KHOẢN</th>
                                <th>TÊN TÀI KHOẢN</th>
                                <th>EMAIL</th>
                                <th>SỐ ĐIỆN THOẠI</th>
                                <th>ĐỊA CHỈ</th>
                                <th>VAI TRÒ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    foreach ($listkhachhang as $kh) {
                        extract($kh);
                        $suakh = "index.php?act=suakh&id=".$id;
                        $xoakh = "index.php?act=xoakh&id=".$id."&vaitro=".$vaitro;
                        $vaitro_String = ($vaitro == 1) ? "Admin" : "Khách hàng";
                        echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$id.'</td>
                                <td>'.$tennguoidung.'</td>
                                <td>'.$email.'</td>
                                <td>'.$sodienthoai.'</td>
                                <td>'.$diachi.'</td>
                                <td>'.$vaitro_String.'</td>
                                <td>
                                <a href="'.$suakh.'" class="btn btn-primary btn-sm">Sửa</a>

                                <a href="'.$xoakh.'" class="btn btn-danger btn-sm">Xóa</a>

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
        <?php
                        if(isset($thongbao) && ($thongbao!="")) {
                            echo '<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    <strong>Thông báo: </strong>'.$thongbao.'
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        }
        ?>
        <?php
                        if(isset($success) && ($success!="")) {
                            echo '<div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                                    <strong>Thông báo: </strong>'.$success.'
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        }
        ?>
    </div>
</div>