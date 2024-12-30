<div class="row m-5">
    <div class="col-12">
        <form action="index.php?act=dskh" method="post" class="row g-3">
            <!-- Ô nhập từ khóa -->
            <div class="col-md-10">
                <input type="text" name="key" class="form-control" placeholder="Nhập từ khóa"
                    value="<?= isset($key) ? htmlspecialchars($key) : '' ?>">
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
                <h4 class="card-title">DANH SÁCH TÀI KHOẢN</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                    <p>Có <strong><?= $totalItems ?></strong> tài khoản trong tổng số <strong><?= $totalPages ?></strong> trang</p>
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
                                $suakh = "index.php?act=suakh&id=" . $id;
                                $xoakh = "index.php?act=xoakh&id=" . $id . "&vaitro=" . $vaitro;
                                $vaitro_String = ($vaitro == 1) ? "Admin" : "Khách hàng";
                                echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td>' . $tennguoidung . '</td>
                                <td>' . $email . '</td>
                                <td>' . $sodienthoai . '</td>
                                <td>' . $diachi . '</td>
                                <td>' . $vaitro_String . '</td>
                                <td>
                                <a href="' . $suakh . '" class="btn btn-primary btn-sm">Sửa</a>

                                <a href="' . $xoakh . '" class="btn btn-danger btn-sm">Xóa</a>

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
                <div class="text-center mt-3">
                    <ul class="pagination justify-content-center">
                        <!-- Previous button -->
                        <li class="page-item <?= ($currentPage == 1) ? 'disabled' : '' ?>">
                            <a class="page-link" href="<?= ($currentPage > 1) ? 'index.php?act=dskh&page=' . ($currentPage - 1) . '&key=' . htmlspecialchars($key) : '#' ?>">
                                &lt;
                            </a>
                        </li>

                        <!-- Page numbers -->
                        <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                            <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                                <a class="page-link" href="index.php?act=dskh&page=<?= $i ?>&key=<?= htmlspecialchars($key) ?>">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>

                        <!-- Next button -->
                        <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : '' ?>">
                            <a class="page-link" href="<?= ($currentPage < $totalPages) ? 'index.php?act=dskh&page=' . ($currentPage + 1) . '&key=' . htmlspecialchars($key) : '#' ?>">
                                &gt;
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    if (isset($_SESSION['thongbao'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                        <strong>Thông báo: </strong>' . $_SESSION['thongbao'] . '
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
            unset($_SESSION['thongbao']);
    }
    if (isset($_SESSION['success']) && $_SESSION['success'] != "") {
        echo '<div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                <strong>Thông báo: </strong>' . $_SESSION['success'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        unset($_SESSION['success']); // Xóa thông báo sau khi hiển thị
    }
    if (isset($_SESSION['error']) && $_SESSION['error'] != "") {
        echo '<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                <strong>Thông báo: </strong>' . $_SESSION['error'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        unset($_SESSION['error']); // Xóa thông báo sau khi hiển thị
    }
?>
</div>
</div>