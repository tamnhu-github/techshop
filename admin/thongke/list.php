<div class="row m-5">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">DANH SÁCH THỐNG KÊ</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>MÃ LOẠI HÀNG </th>
                <th>TÊN LOẠI HÀNG</th>
                <th>SỐ LƯỢNG</th>
                <th>GIÁ CAO NHẤT</th>
                <th>GIÁ THẤP NHẤT</th>
                <th>GIÁ TRUNG BÌNH</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($dstk as $tk) {
                        extract($tk);
                
                        echo '<tr>
                                <td>'.$maloai.'</td>
                                <td>'.$tenloai.'</td>
                                <td>'.$countsp.'</td>
                                <td>'.$maxgia.'</td>
                                <td>'.$mingia.'</td>
                                <td>'.$avggia.'</td>
                            </tr>';
                    }
                ?>
            </tbody>
          </table>
        </div>
        <div class="row mb10">
            <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a>
        </div>
      </div>
      
    </div>
  </div>
</div>