<?php ob_start();
    include_once 'global.php';
    checkSessionAdmin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DDH Manager - <?php title_tab('module', 'dashboard'); ?></title>
    <link rel="apple-touch-icon" sizes="76x76" href="<?= BASE_URL ?>assets/img/apple-icon.png"         />
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>assets/img/favicon.png"                     />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/admin/css/items/styles.css"                     />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/admin/css/nucleo-icons.css"                     />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/admin/css/nucleo-svg.css"                       />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/admin/css/nucleo-svg.css"                       />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/admin/css/argon-dashboard.css"                  />
<!--    <link rel="stylesheet" href="--><?//= BASE_URL ?><!--assets/preloader/prea.css"                             />-->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/toasts/toast.css"                               />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/2.0.4/venobox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous">            </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js">            </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
    <script src="<?= BASE_URL ?>assets/admin/js/items/load_div.js">                            </script>
    <script src="https://js.pusher.com/3.2/pusher.min.js"></script>
    <style>
        .btn {
            margin-bottom: 0 !important;
        }
        body::-webkit-scrollbar {
            width: 0px;
        }
    </style>
    <script> var admin = "<?= ADMIN ?>";</script>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/admin/js/items/notification.js"></script>
</head>
<body class="g-sidenav-show bg-gray-100">
    <div id="toastt"></div>
    <?php //include_once 'views/preloader.php'; ?>
    <div id="course_app">
        <div class="min-height-300 bg-secondary position-absolute w-100"></div>
            <?php include_once 'views/admin/layouts/sidebar.php';   ?>
        <main class="main-content position-relative border-radius-lg ">
            <?php include_once 'views/admin/layouts/navbar.php';    ?>
            <?php include_once 'routes/route_admin.php';            ?>
            <?php include_once 'views/admin/layouts/footer.php';    ?>
        </main>
    </div>
    <div class="fixed-plugin d-none">
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">DDH Configurator</h5>
                    <p>Change Theme</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <div class="card-body overflow-auto">
                <hr class="horizontal dark ">
                <div class="mb-5 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/2.0.4/venobox.min.js">          </script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">                </script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js">            </script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js">  </script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js">  </script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js">        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">              </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js">         </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">           </script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js">             </script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js">             </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js">    </script>
    <script src="<?= BASE_URL ?>assets/admin/js/core/popper.min.js">                            </script>
    <script src="<?= BASE_URL ?>assets/admin/js/core/bootstrap.min.js">                         </script>
    <script src="<?= BASE_URL ?>assets/admin/js/plugins/perfect-scrollbar.min.js">                 </script>
    <script src="<?= BASE_URL ?>assets/admin/js/plugins/smooth-scrollbar.min.js">                  </script>
    <script src="<?= BASE_URL ?>assets/admin/js/plugins/chartjs.min.js">                           </script>
    <script src="<?= BASE_URL ?>assets/admin/js/plugins/validate.js">                              </script>
    <script src="<?= BASE_URL ?>assets/admin/js/argon-dashboard.js">                               </script>
    <script src="<?= BASE_URL ?>assets/admin/js/items/mainss.js">                                   </script>
    <script src="<?= BASE_URL ?>assets/admin/js/items/courses.js">                                 </script>
    <!--    <script src="--><?//= BASE_URL ?><!--assets/preloader/preloader.js">                   </script>-->
    <script src="<?= BASE_URL ?>assets/toasts/toast.js">                                           </script>
    <script src="<?= BASE_URL ?>assets/admin/js/items/detec_connect.js">                           </script>
    <script async defer src="https://buttons.github.io/buttons.js">                             </script>
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
</body>
</html>
<?php ob_end_flush(); ?>