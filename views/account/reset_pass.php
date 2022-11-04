<?php $host =  'http://localhost/course_ddh/'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= $host ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= $host ?>assets/img/favicon.png">
  <title>DDH COURSES - Đăng Nhập</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="<?= $host ?>assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= $host ?>assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= $host ?>assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="<?= $host ?>assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <style>
    .form-group.invalid .form-control {
      border-color: #f33a58;
    }
  </style>
</head>
<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="<?= $host ?>pages/dashboard.html">
        DDH COURSES
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="<?= $host ?>">
              <i class="fa fa-chart-pie opacity-6  me-1"></i>
              Trang chủ
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="<?= $host ?>sign_up">
              <i class="fas fa-user-circle opacity-6  me-1"></i>
              Đăng ký
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="<?= $host ?>sign_in">
              <i class="fas fa-key opacity-6  me-1"></i>
              Đăng nhập
            </a>
          </li>
        </ul>
        <ul class="navbar-nav d-lg-block d-none">
          <li class="nav-item">
            <a href="#" class="btn btn-sm mb-0 me-1 bg-gradient-light">Cần hỗ trợ ?</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Chúc mừng bạn</h1>
            <p class="text-lead text-white">Bây giờ hãy nhập mật khẩu mới và đăng nhập thôi nào</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Nhập mật khẩu mới</h5>
            </div>
            <div class="card-body">
              <form role="form" method="post" action="" id="form-1">
                <div class="mb-3 form-group">
                  <input type="password" class="form-control" id="password" placeholder="Mật khẩu mới">
                    <div class="form-message text-danger mt-1"></div>
                </div>
                <div class="mb-3 form-group">
                  <input type="password" class="form-control" id="confirm_password" placeholder="Nhập lại mật khẩu mới">
                    <div class="form-message text-danger mt-1"></div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Đặt lại mật khẩu</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="<?= $host ?>" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Trang chủ
          </a>
          <a href="<?= $host ?>about_us" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Giới thiệu về chúng tôi
          </a>
          <a href="<?= $host ?>courses" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Khóa học
          </a>
          <a href="<?= $host ?>blogs" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Blog
          </a>
          <a href="<?= $host ?>contact" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Liên hệ
          </a>
        </div>
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="#" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-facebook"></span>
          </a>
          <a href="#" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <a href="#" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-youtube"></span>
          </a>
          <a href="#" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> Soft by NDD Team.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="<?= $host ?>assets/js/core/popper.min.js"></script>
  <script src="<?= $host ?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?= $host ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= $host ?>assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= $host ?>assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script src="<?= $host ?>assets/js/plugins/validate.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      Validator({
          form: "#form-1",
          formGroupSelector: ".form-group",
          errorSelector: ".form-message",
          rules: [
            Validator.isRequired("#password", "Vui lòng nhập password"),
            Validator.isRequired("#confirm_password", "Vui lòng nhập password"),
            Validator.minLength('#password', 8),
            Validator.minLength('#confirm_password', 8),
            Validator.isConfirmed('#confirm_password', function() {
                  return document.querySelector('#password').value;
              }, 'Mật khẩu nhập lại không chính xác')
          ],
      });
    });
  </script>
</body>
</html>