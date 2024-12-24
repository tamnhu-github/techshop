<!-- Main Content -->
<div class="container my-4">
    <div class="row">
        <!-- Main Product Section -->
        <div class="col-lg-9">
            <div class="mb-4">
                <?php
                    if (is_array($danhmuc)) {
                        extract($danhmuc);
                    } else {
                        $tenloai = 'Tất cả';
                    }
                ?>
                <div class="mb-4">
                    <h4 class="border-bottom pb-2 mb-3 text-uppercase text-dark fw-bold">Danh Sách Sản Phẩm</h4>
                    <h3 class="text-muted fw-normal"><?=$tenloai?></h3>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php
                        foreach ($listsanpham as $sp) {
                            extract($sp);
                            $anh = $img_path . $anh;
                            $linkchitietsanpham = "index.php?act=chitietsanpham&masanpham=".$masanpham;
                            $gia_dinh_dang = number_format($gia, 0, ',', '.') . ' VND';
                            echo '<div class="col">
                                <a href="'.$linkchitietsanpham.'" class="text-decoration-none text-dark">
                                    <div class="card h-100 shadow-sm transition-card" style="min-height: 450px;">
                                        <img src="' . $anh . '" class="card-img-top" alt="">
                                        <div class="card-body">
                                            <h5 class="card-title">' . $tensanpham. '</h5>
                                            <p class="card-text">' . $gia_dinh_dang . '</p>
                                        </div>
                                        <div class="card-footer bg-transparent border-0 p-3">
                                            <form action="index.php?act=addtocart" method="post" class="d-grid">
                                                <input type="hidden" name="masanpham" value="'.$masanpham.'">
                                                <input type="hidden" name="tensanpham" value="'.$tensanpham.'">
                                                <input type="hidden" name="anh" value="'.$anh.'">
                                                <input type="hidden" name="gia" value="'.$gia.'">
                                                <input type="submit" name="addtocart" class="btn btn-primary" value="Thêm vào giỏ hàng">
                                                    
                                                </input>
                                            </form>
                                        </div>
                                    </div>
                                </a>

                            </div>';
                        }
                    ?>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <?php include "view/rightbox.php"; ?>
    </div>
</div>