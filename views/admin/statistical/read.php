<style>h5 {margin-top: 5px;}</style>
<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header border-bottom ">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Thống kê</h6>
                        <div >
                            <form action="<?= STATISTICAL ?>" class="d-flex align-items-center justify-content-center">
                                <span>Từ:</span>&nbsp;<input type="date" class="form-control" name="date_start" required value="<?= isset($_GET['date_start']) ? $_GET['date_start'] : "" ?>">
                                <div>&emsp;</div>
                                <span>Đến:</span>&nbsp;<input type="date" class="form-control" name="date_end" required value="<?= isset($_GET['date_end']) ? $_GET['date_end'] : "" ?>">
                                <div>&emsp;</div>
                                <?php
                                    if(isset($_GET['date_start']) && isset($_GET['date_end']) ){
                                        echo '&emsp;<a class="btn btn-outline-primary" href="'.STATISTICAL.'">X</a>';
                                    }else {
                                        echo '&emsp;<button class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass"></i></button>';
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="p-3">
                        <!--   Doanh thu    -->
                        <div class="mb-5" id="doanh_thu">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h6>Doanh thu</h6>
                                <form action="<?= STATISTICAL ?>">
                                        <select onchange="this.form.submit()" class="form-control" name="filter_pay">
                                            <option value="" <?= isset($_GET['filter_pay']) ? "" : "filter_pay" ?> selected>Lọc</option>
                                            <?php $status = isset($_GET['filter_pay']) ? $_GET['filter_pay'] : "" ?>
                                            <option value="0" <?= $status == 0 ? 'selected' : "" ?>>Tháng này</option>
                                            <option value="1" <?= $status == 1 ? 'selected' : "" ?>>Tháng trước</option>
                                            <option value="2" <?= $status == 2 ? 'selected' : "" ?>>Năm trước</option>
                                        </select>
                                    </form>
                            </div>
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Tổng tiền đăng ký</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?= number_format($turn_over, 0, '', ',') ?> VNĐ
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Thực nhận</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?= number_format($actually_received, 0, '', ',') ?> VNĐ
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Chưa thanh toán</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?= number_format($unpaids, 0, '', ',') ?> VNĐ
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Thanh toán lỗi</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?= number_format($des_pay, 0, '', ',') ?> VNĐ
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header pb-0 pt-3 bg-transparent mb-5">
                            <h6 class="text-capitalize">Tổng quan về doanh thu - Năm <?= isset($_GET['filter_pay']) && $_GET['filter_pay'] == 2 ? getdate()['year'] - 1 : getdate()['year'] ?>   </h6>
                            <p class="text-sm mb-0 d-none">
                                <i class="fa fa-arrow-up text-success"></i>
                                <span class="font-weight-bold"><?= cal_percent(count_pay_now_year(),count_pay_old_year()) ?>% so với</span> in <?= getdate()['year'] - 1; ?>
                            </p>
                        </div>
                        <div class="chart mb-5">
                            <canvas id="chart-line-pay" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body ">
                    <div class="p-3">
                        <!--    Học viên    -->
                        <div class="mb-5" id="student">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h6>Học viên</h6>
                                <form action="<?= STATISTICAL ?>">
                                    <select onchange="this.form.submit()" class="form-control" name="filter_std">
                                        <option value="" <?= isset($_GET['filter_std']) ? "" : "filter_std" ?> selected>Lọc</option>
                                        <?php $status = isset($_GET['filter_std']) ? $_GET['filter_std'] : "" ?>
                                        <option value="0" <?= $status == 0 ? 'selected' : "" ?>>Tháng này</option>
                                        <option value="1" <?= $status == 1 ? 'selected' : "" ?>>Tháng trước</option>
                                        <option value="2" <?= $status == 2 ? 'selected' : "" ?>>Năm trước</option>
                                    </select>
                                </form>
                            </div>
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Tổng tài khoản đã tạo</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?=  $total_std  ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Đăng ký học</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?= $join_class ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Chờ thanh toán</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?= $wait_join ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Đăng ký bị hủy</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?= $no_join ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header pb-0 pt-3 bg-transparent mb-5">
                            <h6 class="text-capitalize">Tổng quan về học viên - Năm <?= $date = getdate()['year']; ?>   </h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-arrow-up text-success"></i>
                                <span class="font-weight-bold"><?= cal_percent(now_year(),old_year()) ?>% more</span> in <?= $date = getdate()['year'] - 1; ?>
                            </p>
                        </div>
                        <div class="chart mb-5">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body ">
                    <div class="p-3">
                        <!--    Khóa học    -->
                        <div id="courses">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h6>Khóa học</h6>
                            </div>
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Tổng khóa học</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?=  $count_course  ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Khóa học đang mở</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?= $count_course_open ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Khóa học đã khóa</p>
                                                        <h5 class="font-weight-bolder">
                                                            <?= $count_course_close ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 mb-5"></div>
                        <canvas id="myChart" style="width:100%;max-width:100vw"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // biểu đồ doanh thu
    if (document.getElementById("chart-line-pay")) {
        var ctx1 = document.getElementById("chart-line-pay").getContext("2d");
        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
        gradientStroke1.addColorStop(1, "rgba(94, 114, 228, 0.2)");
        gradientStroke1.addColorStop(0.2, "rgba(94, 114, 228, 0.0)");
        gradientStroke1.addColorStop(0, "rgba(94, 114, 228, 0)");
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [
                    {
                        // Tên để thống kê
                        label: "Doanh thu",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#5e72e4",
                        backgroundColor: gradientStroke1,
                        borderWidth: 3,
                        fill: true,
                        // giá trị thống kê
                        data: [
                        <?php $date = getdate();
                            $year = $date['year'];
                            for($i = 1; $i<=12; $i++){
                            if(isset($_GET['filter_pay']) && $_GET['filter_pay'] == 2){
                                if(empty(count_pay_with_month($i,$year - 1))){
                                    echo '0,';
                                }else {
                                    echo count_pay_with_month($i,$year - 1).',';
                                }
                            }
                            else {
                                if(empty(count_pay_with_month($i,$year))){
                                    echo '0,';
                                }else {
                                    echo count_pay_with_month($i,$year).',';
                                }
                            }
                        } ?>
                        ],
                        maxBarThickness: 6,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                interaction: {
                    intersect: false,
                    mode: "index",
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: "#fbfbfb",
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: "normal",
                                lineHeight: 2,
                            },
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5],
                        },
                        ticks: {
                            display: true,
                            color: "#ccc",
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: "normal",
                                lineHeight: 2,
                            },
                        },
                    },
                },
            },
        });
    }
    // biểu đồ học viên
    if (document.getElementById("chart-line")) {
        var ctx1 = document.getElementById("chart-line").getContext("2d");
        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
        gradientStroke1.addColorStop(1, "rgba(94, 114, 228, 0.2)");
        gradientStroke1.addColorStop(0.2, "rgba(94, 114, 228, 0.0)");
        gradientStroke1.addColorStop(0, "rgba(94, 114, 228, 0)");
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [
                    {
                        // Tên để thống kê
                        label: "Students",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#5e72e4",
                        backgroundColor: gradientStroke1,
                        borderWidth: 3,
                        fill: true,
                        // giá trị thống kê
                        data: [
                            <?php $date = getdate();
                            $year = $date['year'];
                            for($i = 1; $i<=12; $i++){
                                if(isset($_GET['filter_std']) && $_GET['filter_std'] == 2){
                                    if(empty(count_std_with_month($i,$year - 1))){
                                        echo '0,';
                                    }else {
                                        echo count_std_with_month($i,$year - 1).',';
                                    }
                                }
                                else {
                                    if(empty(count_std_with_month($i,$year))){
                                        echo '0,';
                                    }else {
                                        echo count_std_with_month($i,$year).',';
                                    }
                                }
                            } ?>

                        ],
                        maxBarThickness: 6,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                interaction: {
                    intersect: false,
                    mode: "index",
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: "#fbfbfb",
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: "normal",
                                lineHeight: 2,
                            },
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5],
                        },
                        ticks: {
                            display: true,
                            color: "#ccc",
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: "normal",
                                lineHeight: 2,
                            },
                        },
                    },
                },
            },
        });
    }
    // biểu đồ khóa học
    if(document.getElementById("myChart")){
        var xValues = [
            <?php foreach (courses_read() as $key => $items):  ?>
            "<?= $items['name_course'] ?>",
            <?php endforeach;  ?>
        ];
        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [
                    {
                        label: "Giá tiền (x1000)",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#5e72e4",
                        backgroundColor: gradientStroke1,
                        borderWidth: 1,
                        fill: true,
                        data: [
                            <?php foreach (courses_read() as $key => $items):  ?>
                            <?= $items['price_course'] / 1000 ?>,
                            <?php endforeach;  ?>
                        ],
                        borderColor: "red",
                        fill: false
                    },
                    {
                        label: "Số đánh giá",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#5e72e4",
                        backgroundColor: gradientStroke1,
                        borderWidth: 1  ,
                        fill: true,
                        data: [
                            <?php foreach (courses_read() as $key => $items):  ?>
                            <?= countratecourse($items['id']) * 100 ?>,
                            <?php endforeach;  ?>
                        ],
                        borderColor: "green",
                        fill: false
                    },
                    {
                        label: "Lớp thuộc khóa học",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#5e72e4",
                        backgroundColor: gradientStroke1,
                        borderWidth: 1,
                        fill: true,
                        data: [
                            <?php foreach (courses_read() as $key => $items):  ?>
                            <?= countclasscourse($items['id']) * 100 ?>,
                            <?php endforeach;  ?>
                        ],
                        borderColor: "blue",
                        fill: false
                    }
                ]
            },
            options: {
                legend: {display: false}
            }
        });
    }
</script>
