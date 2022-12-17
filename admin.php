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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/2.0.4/venobox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous">            </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js">            </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
    <script src="<?= BASE_URL ?>assets/admin/js/items/load_div.js">                            </script>
<!--    <script src="https://js.pusher.com/3.2/pusher.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.0/axios.min.js"></script>
    <script src="<?= BASE_URL ?>assets/admin/js/plugins/chartjs.min.js">                           </script>
    <script src="<?= BASE_URL ?>assets/toasts/toast.js">                                           </script>
    <script src="<?= BASE_URL ?>assets/noti/noti.js">                                           </script>
    <script src="<?= BASE_URL ?>assets/toasts/toast.js">                                           </script>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/toasts/toast.css"                               />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/noti/noti.css"                               />
    <style>
        .btn {
            margin-bottom: 0 !important;
        }
        body::-webkit-scrollbar {
            width: 0px;
        }
    </style>
    <script> var admin = "<?= ADMIN ?>";</script>
    <script src="https://www.jsviews.com/download/jsrender.min.js"></script>
    <!--    <script type="text/javascript" src="--><?//= BASE_URL ?><!--assets/admin/js/items/notification.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/plugin/utc.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.5/plugin/relativeTime.min.js"></script>
</head>
<body class="g-sidenav-show bg-gray-100">
    <div id="toastt"></div>
    <div id="noti"></div>
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
    <script src="<?= BASE_URL ?>assets/admin/js/plugins/validate.js">                              </script>
    <script src="<?= BASE_URL ?>assets/admin/js/argon-dashboard.js">                               </script>
    <script src="<?= BASE_URL ?>assets/admin/js/items/mainss.js">                                   </script>
    <script src="<?= BASE_URL ?>assets/admin/js/items/courses.js">                                 </script>
    <!--    <script src="--><?//= BASE_URL ?><!--assets/preloader/preloader.js">                   </script>-->
    <script src="<?= BASE_URL ?>assets/admin/js/items/detec_connect.js">                           </script>
    <script async defer src="https://buttons.github.io/buttons.js">                             </script>
</body>
</html>
<?php ob_end_flush(); ?>