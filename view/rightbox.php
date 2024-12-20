<!-- Sidebar -->
<div class="col-lg-3">
    <!-- Login Form -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">TÀI KHOẢN</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input">
                    <label class="form-check-label">Ghi nhớ tài khoản?</label>
                </div>
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </form>
            <div class="mt-3">
                <a href="#" class="d-block text-decoration-none">Quên mật khẩu</a>
                <a href="#" class="d-block text-decoration-none">Đăng ký thành viên</a>
            </div>
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
            <form class="mt-3">
                <input type="text" class="form-control" placeholder="Tìm kiếm...">
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