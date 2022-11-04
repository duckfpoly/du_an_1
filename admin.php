<?php include_once 'global.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= $host ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= $host ?>assets/img/favicon.png">
  <title>DDH Manager - <?php title_tab('module', 'dashboard'); ?></title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= $host ?>assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= $host ?>assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="<?= $host ?>assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="<?= $host ?>assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <link rel="stylesheet" href="<?= $host ?>assets/css/items/style.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

  <link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
			integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/2.0.4/venobox.min.css" integrity="sha512-HFaR9dTfvVVIkca85XvaYOlbZqtyRp5f7cyfb3ycnQU60RM1qjmJKq7qZPLDI+nudOkFDuY5giiwQqfbP7M36g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="g-sidenav-show   bg-gray-100">
<!-- <body class="g-sidenav-show dark-version bg-gray-600"> -->
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <?php include_once 'views/admin/layouts/sidebar.php'; ?>
  <main class="main-content position-relative border-radius-lg ">
    <?php include_once 'views/admin/layouts/navbar.php'; ?>
    <?php include_once 'routes/route_admin.php'; ?>
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
  <!--   Core JS Files   -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="<?= $host ?>assets/js/core/popper.min.js"></script>
  <script src="<?= $host ?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?= $host ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= $host ?>assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?= $host ?>assets/js/plugins/chartjs.min.js"></script>
  <script src="<?= $host ?>assets/js/plugins/validate.js"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= $host ?>assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/2.0.4/venobox.min.js" integrity="sha512-KX9LF4BMXOG6qr9aGjFIPK1xysZAHWXpuZW6gnRi6oM+41qa8x4zaLPkckNxz5veoSWzmV5HZqPMMtknU+431g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?= $host ?>assets/js/items/main.js"></script>
</body>