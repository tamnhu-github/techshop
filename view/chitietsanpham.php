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
                                    <div>
                                        <h5 class="fw-bold">Mô tả sản phẩm:</h5>
                                        <p><?=$mota?></p>
                                    </div>
                                </li>
                                <li class="mb-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <form action="index.php?act=addtocart" method="post">
                                            <input type="hidden" name="masanpham" value="<?=$masanpham?>">
                                            <input type="hidden" name="tensanpham" value="<?=$tensanpham?>">
                                            <input type="hidden" name="anh" value="<?=$anh?>">
                                            <input type="hidden" name="gia" value="<?=$gia?>">
                                            <input type="submit" name="addtocart" class="btn btn-primary"
                                                value="Thêm vào giỏ hàng">
                                        </form>
                                    </div>
                                </li>

                            </ul>
                        </div>


                    </div>
                </div>
            </div>

            <!-- Box: Bình Luận-->
            <div class="card-header">
                <h4 class="pb-2 mb-3 border-bottom">BÌNH LUẬN</h4>
            </div>
            <div class="comment-box mb-4">
                <iframe src="view/binhluan/binhluanform.php?masanpham=<?= $masanpham ?>" frameborder="0" width="100%"
                    height="200px"></iframe>
            </div>


            <!-- Box: Sản Phẩm Cùng Loại -->
            <div class="mb-4">
                <h4 class="border-bottom pb-2 mb-3 mt-5">SẢN PHẨM CÙNG LOẠI</h4>
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