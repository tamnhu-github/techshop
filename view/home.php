<div class="row mb">
    <div class="boxtrai mr">
        <div class="row">
            <div class="banner mb">
                <!-- Slideshow container -->
                <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="view/images/anh1.jpg" style="width:100%">
                <div class="text">Caption Text</div>
                </div>

                <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="/view/images/anh1.jpg" style="width:100%">
                <div class="text">Caption Two</div>
                </div>

                <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="/view/images/anh1.jpg" style="width:100%">
                <div class="text">Caption Three</div>
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>

                <!-- The dots/circles -->
                <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                </div>

            </div>
        </div>
        <!-- <div class="row">
            <div class="boxsp mr">
               <div class="row img"><img src="/view/images/anh1.jpg" alt=""></div>
                <p>$30</p>
                <a href="#">Đồng hồ</a>
            </div>
            <div class="boxsp mr">
               <div class="row img"><img src="/view/images/anh1.jpg" alt=""></div>
                <p>$30</p>
                <a href="#">Đồng hồ</a>
            </div>
            <div class="boxsp mr">
               <div class="row img"><img src="/view/images/anh1.jpg" alt=""></div>
                <p>$30</p>
                <a href="#">Đồng hồ</a>
            </div>
            <div class="boxsp mr">
               <div class="row img"><img src="/view/images/anh1.jpg" alt=""></div>
                <p>$30</p>
                <a href="#">Đồng hồ</a>
            </div>
            <div class="boxsp mr">
               <div class="row img"><img src="/view/images/anh1.jpg" alt=""></div>
                <p>$30</p>
                <a href="#">Đồng hồ</a>
            </div>
            <div class="boxsp mr">
               <div class="row img"><img src="/view/images/anh1.jpg" alt=""></div>
                <p>$30</p>
                <a href="#">Đồng hồ</a>
            </div>
            <div class="boxsp mr">
               <div class="row img"><img src="/view/images/anh1.jpg" alt=""></div>
                <p>$30</p>
                <a href="#">Đồng hồ</a>
            </div>
            <div class="boxsp mr">
               <div class="row img"><img src="/view/images/anh1.jpg" alt=""></div>
                <p>$30</p>
                <a href="#">Đồng hồ</a>
            </div>
            <div class="boxsp mr">
               <div class="row img"><img src="/view/images/anh1.jpg" alt=""></div>
                <p>$30</p>
                <a href="#">Đồng hồ</a>
            </div>
            <div class="boxsp mr">
               <div class="row img"><img src="/view/images/anh1.jpg" alt=""></div>
                <p>$30</p>
                <a href="#">Đồng hồ</a>
            </div>
            <div class="boxsp mr">
               <div class="row img"><img src="/view/images/anh1.jpg" alt=""></div>
                <p>$30</p>
                <a href="#">Đồng hồ</a>
            </div>
            <div class="boxsp mr">
               <div class="row img"><img src="/view/images/anh1.jpg" alt=""></div>
                <p>$30</p>
                <a href="#">Đồng hồ</a>
            </div>
        </div> -->
        <div class="row">
            <?php 
                $i = 0;
                foreach ($spnew as $sp) {
                    extract($sp);
                    $anh = $img_path.$anh;
                    if(($i == 2) || ($i == 5) || ($i == 8)){
                        $mr = "";
                    }else{
                        $mr = "mr";
                    }
                    echo '
                        <div class="boxsp '.$mr.'">
                        <div class="row img"><img src="'.$anh.'" alt="Ảnh sản phẩm"></div>
                            <p>'.$gia.'</p>
                            <a href="#">'.$tensanpham.'</a>
                        </div>
                    ';
                    $i += 1;
                    
                }
            ?>
        </div>
    </div>
    <div class="boxphai">
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
                    <!-- <li>
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
                    </li> -->
                    <?php 
                        foreach ($dsdm as $dm) {
                            extract($dm);
                            $linkdm = "index.php?act=sanpham&iddm=".$maloai;
                            echo '
                                <li>
                                    <a href="'.$linkdm.'">'.$tenloai.'</a>
                                </li>
                            ';
                        }
                    ?>
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
                <!-- <div class="row mb10 top10">
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
                </div> -->

                <?php 
                    foreach ($dstop10 as $spsp) {
                        extract($sp);
                        $linksp = "index.php?act=sanphamct&idsp=".$masanpham;
                        $anh = $img_path.$anh;
                        echo '
                            <div class="row mb10 top10">
                                <img src="'.$anh.'" alt="Ảnh sản phẩm">
                                <a href="'.$linksp.'">'.$tensanpham.'</a>
                            </div>
                        ';

                    }
                ?>

            </div>
        </div>
        

    </div>
</div>

