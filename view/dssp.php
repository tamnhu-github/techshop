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
                                            <img src="' . $anh . '" class="card-img-top" alt="" style="min-height: 200px; object-fit: cover;">
                                            <div class="card-body p-2">
                                                <h5 class="card-title mb-1">' . $tensanpham . '</h5>
                                                <p class="card-text small text-truncate">' . $gia_dinh_dang . '</p>
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