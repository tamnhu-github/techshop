<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShop</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="view/css/style.css">

</head>

<body>
    <!-- Header -->
    <header class="bg-dark text-white">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">TECHSHOP</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?act=gioithieu">Giới thiệu</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?act=lienhe">Liên hệ</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?act=gopy">Góp ý</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?act=hoidap">Hỏi đáp</a></li>
                        </ul>
                        <div class="d-flex ms-auto">
                            <a href="index.php?act=mybill" class="btn btn-outline-light me-2">
                                <i class="fas fa-box"></i> Đơn hàng của tôi
                            </a>

                            <a href="index.php?act=viewcart" class="btn btn-outline-light position-relative">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?php echo isset($soLuongGioHang) ? $soLuongGioHang : 0; ?>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>