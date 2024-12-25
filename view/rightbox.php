<!-- Sidebar -->
<div class="col-lg-3">
    <!-- Login Form -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">TÀI KHOẢN</h5>
        </div>
        <div class="card-body">
            <?php
                if (isset($_SESSION['user']) && is_array(($_SESSION['user']))) {
                    extract(($_SESSION['user']));
                    
            ?>
            <h4>
                <i class="fas fa-user"></i> <?= $tennguoidung ?>
            </h4>
            <p><strong><i class="fas fa-phone-alt"></i> Số điện thoại:</strong> <?= $sodienthoai ?></p>
            <p><strong><i class="fas fa-home"></i> Địa chỉ:</strong> <?= $diachi ?></p>
            <p><strong><i class="fas fa-envelope"></i> Email:</strong> <?= $email ?></p>

            <div class="d-grid gap-2 mt-3">
                <a href="index.php?act=edit_taikhoan" class="btn btn-warning">Cập nhật tài khoản</a>
                <a href="index.php?act=doimatkhau" class="btn btn-secondary">Đổi mật khẩu</a>
                <?php
                    if($vaitro==1) {
                        echo '<a href="admin/index.php" class="btn btn-success">Đăng nhập Admin</a>';
                    }
                ?>

                <a href=" index.php?act=logout" class="btn btn-danger">Đăng xuất</a>
            </div>
            <?php
                }
                else 
                {
            ?>
            <form action="index.php?act=dangnhap" method="post">
                <div class="mb-3">
                    <label class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control" name="tennguoidung" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="matkhau" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input">
                    <label class="form-check-label">Ghi nhớ tài khoản?</label>
                </div>
                <input type="submit" class="btn btn-primary form-control" value="Đăng nhập"
                    style="background-color: #0080FF" name="dangnhap"></input>
            </form>
            <?php
                if (isset($_SESSION['thongbao']) && $_SESSION['thongbao'] != "") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Lỗi: </strong>' . $_SESSION['thongbao'] . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    unset($_SESSION['thongbao']); // Xóa thông báo sau khi hiển thị
                }
            ?>
            <div class="mt-3">
                <a href="index.php?act=quenmatkhau" class="d-block text-decoration-none">Quên mật khẩu</a>
                <a href="index.php?act=dangky" class="d-block text-decoration-none">Đăng ký thành viên</a>
            </div>
            <?php } ?>
        </div>
    </div>

    <!-- Categories -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">DANH MỤC</h5>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <?php
                            foreach ($listdanhmuc_home as $dm) {
                                extract($dm);
                                //load danh sach san pham theo danh muc
                                $linkdm = "index.php?act=dssp&maloai=".$maloai;
                                echo '<li class="list-group-item"><a href="'.$linkdm.'" class="text-decoration-none">'.$tenloai.'</a></li>';
                            }
                        ?>

            </ul>

            <!-- search box -->
            <form class="mt-3 d-flex" action="index.php?act=dssp" method="post">
                <input type="text" class="form-control me-2" placeholder="Tìm kiếm..." name="key">
                <input type="submit" class="btn btn-primary" value="Tìm" name="search"
                    style="background-color: #0080FF"></input>
            </form>
        </div>
    </div>

    <!-- Top 10 -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">TOP 10 YÊU THÍCH</h5>
        </div>
        <div class="card-body">
            <div class="list-group">
                <?php
                            foreach ($listtop10 as $item) {
                                extract($item);

                                // Chi tiết sản phẩm
                                $linksp = "index.php?act=chitietsanpham&masanpham=" . $masanpham;
                                $anh = $img_path . $anh;

                                echo '<a href="' . $linksp . '" class="list-group-item list-group-item-action">
                                        <div class="d-flex align-items-center">
                                            <img src="' . $anh . '" alt="Sản phẩm" class="me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                            <span class="text-dark">' . $tensanpham . '</span>
                                        </div>
                                    </a>';
                            }
                        ?>
            </div>
        </div>
    </div>

</div>