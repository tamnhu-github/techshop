<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Admin Dashboard</title>
</head>
<style>
.nav-item {
    margin-right: 10px;
    /* Khoảng cách giữa các mục */
}

.nav-link {
    transition: all 0.3s ease;
    /* Thêm hiệu ứng hover */
}

/* Hover hiệu ứng */
.nav-link:hover {
    background-color: #757575;
    color: white;
    border-radius: 5px;
}
</style>

<body>
    <div class="container-fluid">
        <!-- Header -->
        <header class="bg-dark text-white text-center py-3 mb-4">
            <h1 class="m-0">Admin</h1>
        </header>

        <!-- Menu -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 shadow">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=dsdm">Danh mục</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=dssp">Hàng hoá</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=dskh">Khách hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=dsbl">Bình luận</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=thongke">Thống kê</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</body>

</html>