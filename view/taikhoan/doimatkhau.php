<!-- Main Content -->
<div class="container my-4">
    <div class="row">
        <div class="col-lg-9">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">ĐỔI MẬT KHẨU</h5>
                </div>
                <div class="card-body">
                    <?php
                        if (isset($_SESSION['user']) && is_array(($_SESSION['user']))) {
                            extract(($_SESSION['user']));
                        
                    ?>
                    <form action="index.php?act=doimatkhau" method="post" class="p-4 border rounded shadow-sm">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="hidden" name="tennguoidung" value="<?=$tennguoidung?>">
                        <div class="mb-3">
                            <label for="mkhientai" class="form-label">Mật khẩu hiện tại:</label>
                            <input type="password" class="form-control" name="mkhientai" required>
                        </div>
                        <div class="mb-3">
                            <label for="mkmoi class=" form-label">Mật khẩu mới:</label>
                            <input type="password" class="form-control" name="mkmoi" required>
                        </div>
                        <div class="mb-3">
                            <label for="mkxacnhan" class="form-label">Mật khẩu xác nhận:</label>
                            <input type="password" class="form-control" name="mkxacnhan">
                        </div>
                        <div class="d-flex gap-2 justify-content-center">
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary flex-fill" name="capnhat" value="Cập nhật"
                                    style="background-color: #007bff; border-color: #007bff; color: white; padding: 10px 20px; font-size: 16px; border-radius: 5px; text-align: center; width: 100%; cursor: pointer;">
                            </div>
                            <div class="mb-3">
                                <input type="reset" class="btn btn-secondary flex-fill" value="Nhập Lại"
                                    style="background-color: #6c757d; border-color: #6c757d; color: white; padding: 10px 20px; font-size: 16px; border-radius: 5px; text-align: center; width: 100%; cursor: pointer;">
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                    <?php
                        if(isset($thongbao) && ($thongbao!="")) {
                            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <strong>Thông báo: </strong>'.$thongbao.'
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
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