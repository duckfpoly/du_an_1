<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header ">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="<?= BASE_URL ?>"><img src="<?= BASE_URL ?>/assets/img/img_site/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">                                                                                          
                                            <li class="active" ><a href="<?= HOME ?>">Trang chủ</a></li>
                                            <li><a href="<?= LESSONS ?>">Khóa học</a>
                                                <ul class="submenu">
                                                    <?php foreach (category_read() as $item => $value): ?>
                                                    <li><a href="<?= LESSONS ?>?cate=<?= $value['id'] ?>"><?= $value['name_category'] ?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </li>
                                            <li><a href="<?= ABOUT ?>">Giới thiệu</a></li>
                                            <li><a href="<?= CONTACT?>">Liên hệ</a></li>
                                            <!-- Button -->
                                            <?php if(isset($_SESSION['user'])){?>
<<<<<<< HEAD
                                                <li><a href="#">Tài khoản</a>
                                                <!-- <div>
                                                        <img class='avatar_user rounded-circle' src="assets/uploads/students/<?= $_SESSION['user']['image_student']?>" alt="">

                                                    </div> -->
=======

                                                <li><a href="#">
                                                        Xin chào,
                                                        <?php
                                                            if(isset(getSession('user')['name_teacher'])){
                                                                echo getSession('user')['name_teacher'];
                                                            }
                                                            else {
                                                                echo getSession('user')['name_student'];
                                                            }
                                                        ?>
                                                    </a>
>>>>>>> 907df46a46aa975621b9e31ebcfbd68f7df171e3
                                                    <ul class="submenu">
                                                        <?php
                                                            if(getSession('user')['role'] == 0){ ?>
                                                                <li><a href="<?= $host?>teacher_manager">Trang quản trị</a></li>
                                                           <?php }
                                                        ?>
                                                        <li><a href="#">Thông tin</a></li>
                                                        <li><a href="#">Đổi mật khẩu</a></li>
                                                        <li><a href="<?= LOGOUT ?>">Đăng xuất</a></li>
                                                    </ul>
                                            </li>
                                            
                                            <?php }else{?>
                                                <li class="button-header margin-left "><a href="<?= SIGUP ?>" class="btn">Đăng ký</a></li>
                                                <li class="button-header"><a href="<?= SIGIN?>" class="btn btn3">Đăng nhập</a></li>
                                            <?php }?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div> 
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>