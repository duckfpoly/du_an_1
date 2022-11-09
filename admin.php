<?php
    include_once 'global.php';
    checkSessionAdmin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $host ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= $host ?>assets/img/favicon.png">
    <title>DDH Manager - <?php title_tab('module', 'dashboard'); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= $host ?>assets/admin/css/items/styles.css">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= $host ?>assets/admin/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= $host ?>assets/admin/css/nucleo-svg.css" rel="stylesheet" />
    <link href="<?= $host ?>assets/admin/css/nucleo-svg.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/2.0.4/venobox.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="<?= $host ?>assets/admin/js/items/content_load.js"></script>
    <link href="<?= $host ?>assets/admin/css/argon-dashboard.css" rel="stylesheet" />
    <link href="<?= $host ?>assets/preloader/prea.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <style>
        .btn {
            margin-bottom: 0 !important;
        }
    </style>
    <script>
        function return_page(){
            history.back();
        }
    </script>
</head>
<body class="g-sidenav-show bg-gray-100">
    <?php include_once 'views/preloader.php'; ?>
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
        <?php include_once 'views/admin/layouts/sidebar.php'; ?>
    <main class="main-content position-relative border-radius-lg ">
        <?php include_once 'views/admin/layouts/navbar.php'; ?>
        <?php include_once 'routes/route_admin.php'; ?>
        <?php include_once 'views/admin/layouts/footer.php'; ?>
    </main>
    <div class="fixed-plugin">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/2.0.4/venobox.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="<?= $host ?>assets/admin/js/items/mains.js"></script>
    <script src="<?= $host ?>assets/admin/js/items/courses.js"></script>
    <script src="<?= $host ?>assets/preloader/pre_load.js"></script>
    <script src="<?= $host ?>assets/admin/js/core/popper.min.js"></script>
    <script src="<?= $host ?>assets/admin/js/core/bootstrap.min.js"></script>
    <script src="<?= $host ?>assets/admin/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= $host ?>assets/admin/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="<?= $host ?>assets/admin/js/plugins/chartjs.min.js"></script>
    <script src="<?= $host ?>assets/admin/js/plugins/validate.js"></script>
    <script src="<?= $host ?>assets/admin/js/argon-dashboard.js"></script>
</body>