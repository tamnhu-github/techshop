<div class="container text-center m-3">
    <h1>SỐ LIỆU THỐNG KÊ</h1>
    <div class="row mt-4">
        <div class="col-md-6">
            <!-- Biểu đồ tròn -->
            <div id="danhmucchart" style="width:100%;"></div>
        </div>
        <div class="col-md-6">
            <!-- Biểu đồ thanh -->
            <div id="donhangchart" style="width:100%;"></div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <!-- Biểu đồ tròn -->
            <div id="sanphamtrendchart" style="width:100%;"></div>
        </div>
        <div class="col-md-6">
            <!-- Biểu đồ line graph -->
            <div id="doanhthuchart" style="width:100%;"></div>
        </div>
    </div>
</div>

<script>
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawDanhMucChart);

    function drawDanhMucChart() {
        console.log("Drawing danh mục chart...");
        const data = google.visualization.arrayToDataTable([
            ['Danh mục', 'Số lượng sản phẩm'],
            <?php
            $tongdm = count($dstk);
            $i = 1;
            foreach ($dstk as $tk) {
                extract($tk);
                $dauphay = ($i == $tongdm) ? "" : ",";
                echo "['" . addslashes($tk['tenloai']) . "', " . (int)$tk['countsp'] . "]" . $dauphay;
                $i++;
            }
            ?>
        ]);

        const options = {
            'title': 'Thống kê sản phẩm theo danh mục',
            'width': 800,
            'height': 600
        };

        const chart = new google.visualization.PieChart(document.getElementById('danhmucchart'));
        chart.draw(data, options);
    }
</script>

<?php
$ngayArray = [];
$soLuongArray = [];

foreach ($dstk_ngay as $tk) {
    $ngayArray[] = $tk['ngay'];
    $soLuongArray[] = (int)$tk['so_luong_don_hang'];
}
?>

<script>
    const xArray = <?php echo json_encode($ngayArray); ?>;
    const yArray = <?php echo json_encode($soLuongArray); ?>;

    const data = [{
        x: xArray,
        y: yArray,
        type: "bar"
    }];

    const layout = {
        title: "Số lượng đơn hàng theo ngày"
    };

    Plotly.newPlot("donhangchart", data, layout);
</script>

<!-- Biểu đồ thống kê 10 sản phẩm bán chạy nhất -->
<script>
    function drawSanPhamTrendChart() {
        console.log("Drawing sản phẩm trend chart...");
        const data = google.visualization.arrayToDataTable([
            ['Sản phẩm', 'Số lượng'],
            <?php
            $tongdm = count($dstk_trend);
            $i = 1;
            foreach ($dstk_trend as $tk) {
                $dauphay = ($i == $tongdm) ? "" : ",";
                echo "['" . addslashes($tk['tensanpham']) . "', " . (int)$tk['tong_soluong'] . "]" . $dauphay;
                $i++;
            }
            ?>
        ]);

        const options = {
            'title': 'TOP 10 sản phẩm bán chạy nhất',
            'width': 800,
            'height': 600
        };

        const chart = new google.visualization.PieChart(document.getElementById('sanphamtrendchart'));
        chart.draw(data, options);
    }

    google.charts.setOnLoadCallback(drawSanPhamTrendChart);
</script>

<!-- Thống kê doanh thu theo ngày -->
<?php
$ngayArray = [];
$doanhthuArray = [];

foreach ($dstk_doanhthu as $tk) {
    $ngayArray[] = $tk['ngay'];
    $doanhthuArray[] = (int)$tk['doanh_thu'];
}
?>
<script>
    const xArray1 = <?php echo json_encode($ngayArray); ?>;
    const yArray1 = <?php echo json_encode($doanhthuArray); ?>;

    const data1 = [{
        x: xArray1,
        y: yArray1,
        mode: "lines+markers",
        type: "scatter"
    }];

    const layout1 = {
        xaxis: {
            title: "Ngày",
            tickformat: "%d/%m/%Y"
        },
        yaxis: {
            title: "Doanh thu",
            rangemode: "tozero"
        },
        title: "Tổng doanh thu theo ngày"
    };

    Plotly.newPlot("doanhthuchart", data1, layout1);
</script>