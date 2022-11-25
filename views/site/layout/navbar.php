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
                                <a href="home"><img src="<?php echo $host?>/assets/img/img_site/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">                                                                                          
                                            <li class="active" ><a href="<?= HOME?>">Home</a></li>
                                            <li><a href="<?= LESSONS?>">Lessons</a></li>
                                            <li><a href="<?= ABOUT?>">About</a></li>
                                            <li><a href="#">Blog</a>
                                                <ul class="submenu ">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog_details.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Element</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="<?= CONTACT?>">Contact</a></li>
                                            <!-- Button -->
                                            <?php if(isset($_SESSION['user'])){?>
                                                <li><a href="#">
                                                    <div>
                                                        <img class='avatar_user rounded-circle' src="assets/uploads/students/<?= $_SESSION['user']['image_student']?>" alt="">

                                                    </div>
                                                </a>
                                                    <ul class="submenu start">
                                                        <li><a href="#">Thông tin</a></li>
                                                        <li><a href="#">Đổi mật khẩu</a></li>
                                                        <li><a href="<?= LOGOUT?>">Đăng xuất</a></li>
                                                    </ul>
                                            </li>
                                            
                                            <?php }else{?>
                                                <li class="button-header margin-left "><a href="<?= SIGIN?>" class="btn">Join</a></li>
                                                <li class="button-header"><a href="<?= SIGIN?>" class="btn btn3">Log in</a></li>
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