<div class="row m-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">DANH SÁCH BÌNH LUẬN</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                    <p>Có <strong><?= $totalItems ?></strong> bình luận trong tổng số <strong><?= $totalPages ?></strong> trang</p>
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
                                    if ($masanpham == $sp['masanpham']) {
                                        $tensanpham = $sp['tensanpham'];
                                    }
                                }
                                foreach ($listkhachhang as $kh) {
                                    extract($kh);
                                    if ($iduser == $kh['id']) {
                                        $tennguoibinhluan = $kh['tennguoidung'];
                                    }
                                }

                                $xoabl = "index.php?act=xoabl&idmsg=" . $idmsg;

                                echo '<tr>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td>' . $idmsg . '</td>
                                            <td>' . $tennguoibinhluan . '</td>
                                            <td>' . $tensanpham . '</td>
                                            <td>' . $noidung . '</td>
                                            <td>' . $ngaybinhluan . '</td>
                                            <td>

                                            <a href="' . $xoabl . '" class="btn btn-danger btn-sm">Xóa</a>

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
                            <a class="page-link" href="<?= ($currentPage > 1) ? 'index.php?act=dsbl&page=' . ($currentPage - 1) : '#' ?>">
                                &lt;
                            </a>
                        </li>

                        <!-- Page numbers -->
                        <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                            <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                                <a class="page-link" href="index.php?act=dsbl&page=<?= $i ?>">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>

                        <!-- Next button -->
                        <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : '' ?>">
                            <a class="page-link" href="<?= ($currentPage < $totalPages) ? 'index.php?act=dsbl&page=' . ($currentPage + 1) : '#' ?>">
                                &gt;
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>