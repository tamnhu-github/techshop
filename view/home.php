 <!-- Main Content -->
 <div class="container my-4">
     <div class="row">
         <!-- Main Product Grid -->
         <div class="col-lg-9">
             <!-- Banner -->
             <div class="mb-4">
                 <div class="slideshow-container">

                     <div class="mySlides fade">
                         <!-- <div class="numbertext">1 / 3</div> -->
                         <img src="view/images/banner11.jpg" style="width:100%">
                         <!-- <div class="text">Caption Text</div> -->
                     </div>

                     <div class="mySlides fade">
                         <!-- <div class="numbertext">2 / 3</div> -->
                         <img src="view/images/banner10.jpg" style="width:100%">
                         <!-- <div class="text">Caption Two</div> -->
                     </div>

                     <div class="mySlides fade">
                         <!-- <div class="numbertext">3 / 3</div> -->
                         <img src="view/images/banner2.jpg" style="width:100%">
                         <!-- <div class="text">Caption Three</div> -->
                     </div>

                 </div>
                 <br>

                 <div style="text-align:center">
                     <span class="dot"></span>
                     <span class="dot"></span>
                     <span class="dot"></span>
                 </div>
                 <br>
             </div>

             <!-- Products Grid -->
             <div class="row row-cols-1 row-cols-md-3 g-4">
                 <?php
                    foreach ($sanphamnew as $sp) {
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
         <?php
            include "view/rightbox.php";
         ?>
     </div>
 </div>