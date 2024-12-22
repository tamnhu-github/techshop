<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">
                ĐĂNG KÝ THÀNH VIÊN
            </div>
            <div class="row boxcontent frmtaikhoan">
                <form action="index.php?act=dangky" method="post">
                    <div class="row mb10">
                        Email
                        <input type="email" name="email">
                    </div>
                    <div class="row mb10">
                        Tên đăng nhập
                        <input type="text" name="user">
                    </div>
                    <div class="row mb10">
                        Mật khẩu
                        <input type="pass" name="pass">
                    </div>
                    <div class="row mb10">
                        <input type="submit" value="Đăng ký" name="dangky">
                        <input type="reset" value="Nhập lại">
                    </div>
                </form>
                <h2 class="thongbao">
                    <?php
                    
                    if(isset($thongbao)&&($thongbao!="")){
                        echo $thongbao;
                    }
                    
                ?>
                </h2>
            </div>
        </div>
    </div>
    <div class="boxphai">
        <?php include "../view/boxright.php" ?>

        <!-- Main Content -->
        <div class="container my-4">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">ĐĂNG KÝ THÀNH VIÊN</h5>
                        </div>
                        <div class="card-body">
                            <form action="index.php?act=dangky" method="post" class="p-4 border rounded shadow-sm">
                                <div class="mb-3">
                                    <label for="tennguoidung" class="form-label">Tên người dùng:</label>
                                    <input type="text" class="form-control" name="tennguoidung"
                                        placeholder="Nhập tên người dùng" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Nhập email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="sodienthoai" class="form-label">Số điện thoại:</label>
                                    <input type="text" class="form-control" id="sodienthoai" name="sodienthoai"
                                        placeholder="Nhập số điện thoại">
                                </div>
                                <div class="mb-3">
                                    <label for="diachi" class="form-label">Địa chỉ:</label>
                                    <input type="text" class="form-control" id="diachi" name="diachi"
                                        placeholder="Nhập địa chỉ">
                                </div>
                                <div class="mb-3">
                                    <label for="matkhau" class="form-label">Mật khẩu:</label>
                                    <input type="password" class="form-control" id="matkhau" name="matkhau"
                                        placeholder="Nhập mật khẩu" required>
                                </div>
                                <div class="d-flex gap-2 justify-content-center">
                                    <div class="mb-3">
                                        <input type="submit" class="btn btn-primary flex-fill" name="dangky"
                                            value="Đăng Ký"
                                            style="background-color: #007bff; border-color: #007bff; color: white; padding: 10px 20px; font-size: 16px; border-radius: 5px; text-align: center; width: 100%; cursor: pointer;">
                                    </div>
                                    <div class="mb-3">
                                        <input type="reset" class="btn btn-secondary flex-fill" value="Nhập Lại"
                                            style="background-color: #6c757d; border-color: #6c757d; color: white; padding: 10px 20px; font-size: 16px; border-radius: 5px; text-align: center; width: 100%; cursor: pointer;">
                                    </div>
                                </div>
                            </form>
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