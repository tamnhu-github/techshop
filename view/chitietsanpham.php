<!-- Main Content -->
<div class="container my-4">
    <div class="row">
        <!-- Main Product Section -->
        <div class="col-lg-9">
            <!-- Box: Chi Tiết Sản Phẩm -->
            <div class="mb-4">
                <?php
                        extract($sanpham);
                ?>
                <h4 class="border-bottom pb-2 mb-3">CHI TIẾT SẢN PHẨM</h4>
                <div class="card d-flex">
                    <div class="card-body d-flex justify-content-right">
                        <?php
                            $anh = $img_path.$anh;
                            $gia_format = number_format($gia, 0, ',', '.');
                            echo '<img src="' . $anh . '" alt="' . $tensanpham . '" class="img-fluid" style="max-width: 40%; height: auto;">';
                        ?>
                        <div class="custom-margin">
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <h5 class="fw-bold">Tên sản phẩm:</h5>
                                    <p><?=$tensanpham?></p>
                                </li>
                                <li class="mb-3">
                                    <h5 class="fw-bold">Giá bán lẻ: </h5>
                                    <p><?=$gia_format?> VND</p>

                                </li>
                                <li class="mb-3">
                                    <h5 class="fw-bold">Lượt xem:</h5>
                                    <p><?=$luotxem?></p>
                                </li>
                                <li class="mb-3">
                                    <h5 class="fw-bold">Mô tả sản phẩm:</h5>
                                    <p><?=$mota?></p>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>

            <!-- Box: Bình Luận -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script>
            $(document).ready(function() {
                $("#binhluan").load("view/binhluan/binhluanform.php", {
                    masanpham: <?= $masanpham ?>
                });
            });
            </script>
            <div class="card mb-4" id="binhluan">

            </div>


            <!-- Box: Sản Phẩm Cùng Loại -->
            <div class="mb-4">
                <h4 class="border-bottom pb-2 mb-3">SẢN PHẨM CÙNG LOẠI</h4>
                <div class="list-group">
                    <?php
                        foreach ($listcungloai as $sp) {
                            extract($sp);
                            $anh = $img_path.$anh;
                            $linkchitietsanpham = "index.php?act=chitietsanpham&masanpham=".$masanpham;
                            echo '<a href="' . $linkchitietsanpham . '" class="list-group-item list-group-item-action">
                                        <div class="d-flex align-items-center" style="min-height: 90px;">
                                            <img src="' . $anh . '" alt="Sản phẩm" class="me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                            <span class="text-dark">' . $tensanpham . '</span>
                                        </div>
                                    </a>';
                        }
                    ?>
                </div>

            </div>
        </div>

        <!-- Right Sidebar -->
        <?php
        include "view/rightbox.php";
        ?>
    </div>
</div>