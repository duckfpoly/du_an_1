<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $host ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= $host ?>assets/img/favicon.png">
    <title>DDH ADMIN - Đăng Nhập</title>
    <link href="<?= $host ?>assets/admin/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <style>
        .form-group.invalid .form-control {
            border-color: #f33a58;
        }
    </style>
</head>
<body>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                        <p class="text-lead text-white"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Đăng nhập</h5>
                        </div>
                        <div class="card-body">
                            <form role="form" method="post" action="<?=$host?>login" id="form-1">
                                <div class="mb-3 form-group">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" >
                                    <div class="form-message text-danger mt-1"></div>
                                </div>
                                <div class="mb-3 form-group">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                    <div class="form-message text-danger mt-1"></div>
                                </div>
                                <?php if(isset($login)){ echo '<div class="alert alert-danger text-light mb-2 mt-3 fw-bold text-center"><small>'.$login.'</small></div>'; } ?>
                                <div class="text-center">
                                    <button type="submit" name="login" class="btn bg-gradient-dark w-100 my-4 mb-2">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer py-5">
        <div class="container">
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
    <script src="<?= $host ?>assets/admin/js/plugins/validate.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Validator({
                form: "#form-1",
                formGroupSelector: ".form-group",
                errorSelector: ".form-message",
                rules: [
                    Validator.isRequired("#username", "Vui lòng nhập username"),
                    Validator.minLength('#username', 5),
                    Validator.isRequired("#password", "Vui lòng nhập password"),
                    Validator.minLength('#password', 5),
                ],
            });
        });
    </script>
</body>
</html>