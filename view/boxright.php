<div class="row mb">
    <div class="boxtitle">TÀI KHOẢN</div>
    <div class="boxcontent frmtaikhoan">
        <?php 
            if (isset($_SESSION['user'])){
                extract($_SESSION['user']);
            ?>
            <div class="row mb10">
                Xin chào <br>
                <?=$user ?>
            </div>
            <div class="row mb10">
                <li> <a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                <li> <a href="index.php?act=edittaikhoan">Cập nhật tài khoản</a></li>
                <li> <a href="admin/index.php">Đăng nhập Admin</a></li>
                <li> <a href="index.php?act=thoat">Thoát</a></li>

            </div>
            <?php
            } else{
        ?>
        <form action="../admin/index.php?act=dangnhap" method="post">
            <div class="row mb10">
                Tên đăng nhập<br>
                <input type="text" name="user" id="">
            </div>
            <div class="row mb10">
                Mật khẩu<br>
                <input type="password" name="pass" id="">
            </div>
            <div class="row mb10">
                <input type="checkbox" name="pass" id="">Ghi nhớ tài khoản?
            </div>
            <div class="row mb10">
                <input type="submit" value="Đăng nhập" name="dangnhap">
            </div>
        </form>
        <li>
            <a href="#">Quên mật khẩu</a>
        </li>
        <li>
            <a href="../admin/index.php?act=dangky">Đăng ký thành viên</a>
        </li>
        <?php } ?>
    </div>
</div>
<div class="row mb">
    <div class="boxtitle">DANH MỤC</div>
    <div class="boxcontent2 menudoc">
        <ul>
            <li>
                <a href="#">Đồng hồ</a>
            </li>
            <li>
                <a href="#">Laptop</a>
            </li>
            <li>
                <a href="#">Điện thoại</a>
            </li>
            <li>
                <a href="#">Ba lô</a>
            </li>
            <li>
                <a href="#">Laptop</a>
            </li>
            <li>
                <a href="#">Điện thoại</a>
            </li>
            <li>
                <a href="#">Ba lô</a>
            </li>
        </ul>
    </div>
    <div class="boxfooter searchbox">
        <form action="#" method="post">
            <input type="text" name="" id="">
        </form>
    </div>
</div>
<div class="row">
    <div class="boxtitle">TOP 10 YÊU THÍCH</div>
    <div class="row boxcontent">
        <div class="row mb10 top10">
            <img src="view/images/anh1.jpg" alt="">
            <a href="#">Hello everyone</a>
        </div>
        <div class="row mb10 top10">
            <img src="view/images/anh1.jpg" alt="">
            <a href="#">Hello everyone</a>
        </div>
        <div class="row mb10 top10">
            <img src="view/images/anh1.jpg" alt="">
            <a href="#">Hello everyone</a>
        </div>
        <div class="row mb10 top10">
            <img src="view/images/anh1.jpg" alt="">
            <a href="#">Hello everyone</a>
        </div>
        <div class="row mb10 top10">
            <img src="view/images/anh1.jpg" alt="">
            <a href="#">Hello everyone</a>
        </div>
        <div class="row mb10 top10">
            <img src="view/images/anh1.jpg" alt="">
            <a href="#">Hello everyone</a>
        </div>
        <div class="row mb10 top10">
            <img src="view/images/anh1.jpg" alt="">
            <a href="#">Hello everyone</a>
        </div>
        <div class="row mb10 top10">
            <img src="view/images/anh1.jpg" alt="">
            <a href="#">Hello everyone</a>
        </div>

    </div>
</div>