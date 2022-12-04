<footer>
    <div class="footer-wrappper footer-bg">
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo mb-25">
                                    <a href="<?= BASE_URL ?>"><img src="<?= BASE_URL ?>assets/img/img_site/img/logo/logo2_footer.png" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>
                                            Địa chỉ: <a
                                                        href="https://www.google.com/maps/place/120+Ho%C3%A0ng+Qu%E1%BB%91c+Vi%E1%BB%87t,+C%E1%BB%95+Nhu%E1%BA%BF,+T%E1%BB%AB+Li%C3%AAm,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam/@21.0490871,105.7947648,15z/data=!4m5!3m4!1s0x3135ab30160f7fd9:0x4a1e6e1a119ecb78!8m2!3d21.0480426!4d105.7921484">
                                                        120,Hoàng Quốc Việt,<br>Cầu Giấy, Hà Nội
                                                    </a>
                                            <br><br>
                                            Mail: <a href="mailto:courses.app@gmail.com">courses.app@gmail.com</a> <br><br>
                                            Số điện thoại: <a href="tel:+84823565831">+84 823 565 831</a>
                                        </p>
                                    </div>
                                </div>
                                <!-- social -->
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Menu</h4>
                                <ul>
                                    <li><a href="<?= HOME ?>">Trang chủ</a></li>
                                    <li><a href="<?= LESSONS ?>">Khóa học</a></li>
                                    <li><a href="<?= ABOUT ?>">Giới thiệu</a></li>
                                    <li><a href="<?= CONTACT ?>">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Khóa học</h4>
                                <ul>
                                    <?php foreach(category_read() as $value):?>
                                        <li><a href="<?= LESSONS ?>?cate=<?php echo $value['id']?>"><?php echo $value['name_category']?></a></li>
                                    <?php endforeach?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Map</h4>
                                <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.61594618922!2d105.78995971542355!3d21.048047592494374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab30160f7fd9%3A0x4a1e6e1a119ecb78!2zMTIwIEhvw6BuZyBRdeG7kWMgVmnhu4d0LCBD4buVIE5odeG6vywgVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1669449119770!5m2!1svi!2s"
                                        width="100%"
                                        height="250px"
                                        style="border:0; border-radius: 10px"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p>
                                    Copyright &copy; <script>document.write(new Date().getFullYear());</script> By DDH Teams
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End-->
        </div>
    </footer> 
    <!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>