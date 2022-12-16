<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Danh mục khóa học</p>
                    <h5 class="font-weight-bolder">
                      <?= $count_categories ?>
                    </h5>
                    <p class="mb-0 d-none">
                      <span class="text-success text-sm font-weight-bolder">+55%</span>
                      since yesterday
                    </p>
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Khóa học</p>
                    <h5 class="font-weight-bolder">
                        <?= $count_courses ?>
                    </h5>
                    <p class="mb-0 d-none">
                      <span class="text-success text-sm font-weight-bolder">+3%</span>
                      since last week
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Giảng viên</p>
                    <h5 class="font-weight-bolder">
                        <?= $count_teachers ?>
                    </h5>
                    <p class="mb-0 d-none">
                      <span class="text-danger text-sm font-weight-bolder">-2%</span>
                      since last quarter
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Học viên</p>
                    <h5 class="font-weight-bolder">
                      <?= $count_students ?>
                    </h5>
                    <p class="mb-0 d-none">
                      <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4 d-none">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Tổng quan về học viên - Năm <?= $date = getdate()['year']; ?>   </h6>
              <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold"><?= cal_percent(now_year(),old_year()) ?>% more</span> in <?= $date = getdate()['year'] - 1; ?>
              </p>
            </div>
            <div class="card-body p-4">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
<!--        <div class="col-lg-5">-->
<!--          <div class="card card-carousel overflow-hidden h-100 p-0">-->
<!--            <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">-->
<!--              <div class="carousel-inner border-radius-lg h-100">-->
<!--                <div class="carousel-item h-100 active" style="background-image: url('./assets/img/carousel-1.jpg');-->
<!--      background-size: cover;">-->
<!--                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">-->
<!--                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">-->
<!--                      <i class="ni ni-camera-compact text-dark opacity-10"></i>-->
<!--                    </div>-->
<!--                    <h5 class="text-white mb-1">Get started with Argon</h5>-->
<!--                    <p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>-->
<!--                  </div>-->
<!--                </div>-->
<!--                <div class="carousel-item h-100" style="background-image: url('./assets/img/carousel-2.jpg');-->
<!--      background-size: cover;">-->
<!--                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">-->
<!--                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">-->
<!--                      <i class="ni ni-bulb-61 text-dark opacity-10"></i>-->
<!--                    </div>-->
<!--                    <h5 class="text-white mb-1">Faster way to create web pages</h5>-->
<!--                    <p>That’s my skill. I’m not really specifically talented at anything except for the ability to learn.</p>-->
<!--                  </div>-->
<!--                </div>-->
<!--                <div class="carousel-item h-100" style="background-image: url('./assets/img/carousel-3.jpg');-->
<!--      background-size: cover;">-->
<!--                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">-->
<!--                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">-->
<!--                      <i class="ni ni-trophy text-dark opacity-10"></i>-->
<!--                    </div>-->
<!--                    <h5 class="text-white mb-1">Share with us your design tips!</h5>-->
<!--                    <p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--              <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">-->
<!--                <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
<!--                <span class="visually-hidden">Previous</span>-->
<!--              </button>-->
<!--              <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">-->
<!--                <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
<!--                <span class="visually-hidden">Next</span>-->
<!--              </button>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Khuyến mãi khóa học</h6>
              </div>
            </div>
              <div class="card-body">
                  <div class="course_sale">
                    <?php foreach ($code_sale as $key => $values){ ?>
                        <div class="d-flex align-items-center justify-content-between m-4 course-item-sale">
                                <div class="w-20">
                                    <div class="d-flex px-2 py-1 align-items-center">
<!--                                        <div>-->
<!--                                            <img src="assets/uploads/courses/course_4.jpg" alt="Country flag" width="23px" height="17px">-->
<!--                                        </div>-->
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-2">Mã khuyến mại</p>
                                            <h6 class="text-sm mb-0"><?= $values['sale_code'] ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-2">Giảm</p>
                                        <h6 class="text-sm mb-0"><?= $values['percent_discount'] ?>%</h6>
                                    </div>
                                </div>
                                <div>
                                    <div class="col text-center">
                                        <p class="text-xs font-weight-bold mb-2">Ngày kết thúc</p>
                                        <h6 class="text-sm mb-0"><?= format_date($values['time']) ?></h6>
                                    </div>
                                </div>
                            </div>
                    <?php } ?>
                      <div class="text-center">
                          <a href="#" id="loadMoreCourse">Xem thêm</a>
                          <a href="#" class="d-none" id="loadLessCourse">Ẩn bớt</a>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Danh mục khóa học</h6>
            </div>
            <div class="card-body p-3">
                <div class="category_group">
                    <?php foreach ($read_categories as $key => $values){ ?>
                        <div class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg cate_item mb-4">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm"><?= $values['name_category'] ?></h6>
                                    <span class="text-xs"><?= count_course_with_cate($values['id']) ?> khóa học <span class="font-weight-bold d-none">346+ sold</span></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button onclick="window.location='<?= CATEGORIES.'?s='.$values['name_category'] ?>'" class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="text-center">
                        <a href="#" class="animate__animated animate__fadeInUp" id="loadMore">Xem thêm</a>
                        <a href="#" class="d-none animate__animated animate__fadeInUp" id="loadLess">Ẩn bớt</a>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
</div>
<script>
    var lenght = 2;
    load_more(".cate_item", "#loadMore", "#loadLess", lenght);
    load_less(".cate_item", "#loadLess", "#loadMore", lenght);

    load_more(".course-item-sale", "#loadMoreCourse", "#loadLessCourse", lenght);
    load_less(".course-item-sale", "#loadLessCourse", "#loadMoreCourse", lenght);
</script>
<script>
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
                            <?php for($i = 1; $i<=12; $i++){
                            echo count_with_month($i).',';
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
</script>
