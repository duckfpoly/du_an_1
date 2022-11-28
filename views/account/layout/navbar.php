<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="<?= BASE_URL ?>">
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
                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="<?= BASE_URL ?>">
                        <i class="fa fa-chart-pie opacity-6  me-1"></i>
                        Trang chủ
                    </a>
                </li>
                <?php if(isset($_GET['a'])){
                    if($_GET['a'] == 'sign_in') {
                ?>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="<?= SIGUP ?>">
                            <i class="fas fa-user-circle opacity-6  me-1"></i>
                            Đăng ký
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="<?= TEACHER_SIGNIN ?>">
                            <i class="fas fa-user-circle opacity-6  me-1"></i>
                            Đăng nhập ( giảng viên )
                        </a>
                    </li>
                <?php } elseif ($_GET['a'] == 'sign_up'){ ?>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="<?= SIGIN ?>">
                            <i class="fas fa-key opacity-6  me-1"></i>
                            Đăng nhập
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="<?= TEACHER_SIGNIN ?>">
                            <i class="fas fa-user-circle opacity-6  me-1"></i>
                            Đăng nhập ( giảng viên )
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="<?= SIGIN ?>">
                            <i class="fas fa-key opacity-6  me-1"></i>
                            Đăng nhập
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="<?= SIGUP ?>">
                            <i class="fas fa-user-circle opacity-6  me-1"></i>
                            Đăng ký
                        </a>
                    </li>
                <?php } } ?>
            </ul>
            <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                    <a href="<?= CONTACT ?>" class="btn btn-sm mb-0 me-1 bg-gradient-light">Cần hỗ trợ ?</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
