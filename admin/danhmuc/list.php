<div class="row m-5">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">DANH SÁCH LOẠI HÀNG</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th></th>
                <th>MÃ LOẠI</th>
                <th>TÊN LOẠI</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($listdanhmuc as $dm) {
                extract($dm);
                $suadm = "index.php?act=suadm&maloai=" . $maloai;
                $xoadm = "index.php?act=xoadm&maloai=" . $maloai;

                echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $maloai . '</td>
                                <td>' . $tenloai . '</td>
                                <td>
                                <a href="' . $suadm . '" class="btn btn-primary btn-sm">Sửa</a>

                                <a href="' . $xoadm . '" class="btn btn-danger btn-sm">Xóa</a>

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
        <a href="index.php?act=adddm" class="btn btn-success float-end">Thêm mới loại hàng</a>
        <div class="text-center mt-3">
          <ul class="pagination justify-content-center">
            <!-- Previous button -->
            <li class="page-item <?= ($currentPage == 1) ? 'disabled' : '' ?>">
              <a class="page-link" href="<?= ($currentPage > 1) ? 'index.php?act=dsdm&page=' . ($currentPage - 1) : '#' ?>">
                &lt;
              </a>
            </li>

            <!-- Page numbers -->
            <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
              <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                <a class="page-link" href="index.php?act=dsdm&page=<?= $i ?>">
                  <?= $i ?>
                </a>
              </li>
            <?php endfor; ?>

            <!-- Next button -->
            <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : '' ?>">
              <a class="page-link" href="<?= ($currentPage < $totalPages) ? 'index.php?act=dsdm&page=' . ($currentPage + 1) : '#' ?>">
                &gt;
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>