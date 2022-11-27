<main>
        <!--? slider Area Start-->
        <section class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-12">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInLeft" data-delay="0.2s">Courses Learning</h1>
                                    <p data-animation="fadeInLeft" data-delay="0.4s">Xây dựng kỹ năng lập trình với các khóa học</p>
                                    <a href="<?= SIGUP?>" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Join Now</a>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
        </section>
        <!-- ? services-area -->
        <div class="services-area">
            <div class="container">
                <div class="row justify-content-sm-center">
                    <div class="col-lg-4 col-md-6 col-sm-8" data-aos="flip-up">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="assets/img/img_site/img/icon/icon1.svg" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>Học từ con số 0</h3>
                                <p>Học bài bản cho người bắt đầu.
                                    Bất kì ai cũng có thể tham gia học tập</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8" data-aos="zoom-in">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="assets/img/img_site/img/icon/icon2.svg" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>Tận tâm từng giờ học</h3>
                                <p>Giảng viên nhiệt tình, theo sát học viên suốt quá trình. Giải đáp vướng mắc cho học viên 1-1, 24/7</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8" data-aos="flip-down">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="assets/img/img_site/img/icon/icon3.svg" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>Cam kết việc làm</h3>
                                <p>Hướng dẫn học viên viết CV, kĩ năng phỏng vấn. Cam kết 100% công việc tại các công ty đối tác sau tốt nghiệp</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Courses area start -->
        <div class="courses-area section-padding40 fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2>Các khóa học nổi bật</h2>
                        </div>
                    </div>
                </div>
                <div class="courses-actives">
                    <!-- Single -->
                    <!-- Single -->
                    <?php foreach ($data as $value):?>
                        <div class="properties pb-20">
                            <div class="properties__card">
                                <div class="properties__img overlay1">
                                    <a href="<?= LESSONS?>/<?php echo $value['id']?>">
                                        <img src="assets/uploads/courses/<?php echo $value['image_course']?>" class="card-image" alt="">
                                    </a>
                                </div>
                                <div class="properties__caption">
                                    <h3 class="card-title mb-2">
                                        <a href="<?= LESSONS?>/<?php echo $value['id']?>">
                                            <?php echo $value['name_course']?>
                                        </a>
                                    </h3>
                                    <p class="mb-3"><?= $value['name_teacher'] ?></p>
                                    <p class="card-title mb-3">
                                        <?php echo $value['description_course']?>
                                    </p>
                                    <div class="card-bottomm  properties__footer d-flex justify-content-between align-items-center">
                                        <?php
                                            $id = $value['id'];
                                            // đánh giá sao trung bình
                                            if(empty(get_avg_rate_course($id))){
                                                $avg_rate = 0;
                                            }
                                            else {
                                                $avg_rate = get_avg_rate_course($id);
                                            }
                                            // số đánh giá
                                            $count_rate = get_count_rate_course($id);
                                        ?>
                                        <div class="restaurant-name">
                                            <div class="Stars" style="--rating: <?= $avg_rate ?>"></div>
                                            <p><span><?= $avg_rate ?></span>&nbsp;(<?= $count_rate ?>)</p>
                                        </div>
                                        <div class="price gap-4">
                                            <span class="<?php echo $value['discount'] != 0 ? 'text-decoration-line-through textPrice colorOldPrice' : '' ?>"><?php echo number_format($value['price_course'])?> $</span>
                                            <span><?php echo $value['discount'] != 0 ? total($value['price_course'],$value['discount']) : '' ?></span>
                                        </div>
                                    </div>
                                    <a href="<?= LESSONS?>/<?php echo $value['id']?>" class="border-btn border-btn2">Tìm hiểu thêm</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- Single -->
                </div>
            </div>
        </div>
        <!-- Courses area End -->




        <!--? About Area-1 Start -->
        <section class="about-area1 fix pt-10 mb-5 d-none">
            <div class="support-wrapper align-items-center">
                <div class="left-content1">
                    <div class="about-icon">
                        <img src="assets/img/img_site/img/icon/about.svg" alt="">
                    </div>
                    <!-- section tittle -->
                    <div class="section-tittle section-tittle2 mb-55">
                        <div class="front-text">
                            <h2 class="">Những điều đặc biệt tại Courses App giúp bạn thành công</h2>
<!--                            <p>The automated process all your website tasks. Discover tools and -->
<!--                                techniques to engage effectively with vulnerable children and young -->
<!--                            people.</p>-->
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="assets/img/img_site/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Thời gian đào tạo nhanh</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="assets/img/img_site/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Học thực chiến dự án</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="assets/img/img_site/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Hỗ trợ học phí tối đa</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="assets/img/img_site/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Hỗ trợ học phí tối đa</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="assets/img/img_site/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Cam kết công việc</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="assets/img/img_site/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Học 1-1 vs giảng viên</p>
                        </div>
                    </div>
                </div>
                <div class="right-content1">
                    <!-- img -->
                    <div class="right-img">
                        <img src="assets/img/img_site/img/gallery/about.png" alt="">
                        <div class="video-icon" >
                            <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=up68UAfH0d0"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Area End -->
        <!--? top subjects Area Start -->
        <div class="topic-area section-padding40 d-none">
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2>Explore top subjects</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center gap-5">
                    <?php foreach ($categories as $value):?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="assets/img/img_site/img/gallery/topic7.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#"><?php echo $value['name_category']?></a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="section-tittle text-center mt-20">
                            <a href="courses.html" class="border-btn">View More Subjects</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- top subjects End -->
        <!--? About Area-3 Start -->
        <section class="about-area3 fix">
            <div class="support-wrapper align-items-center">
                <div class="right-content3">
                    <!-- img -->
                    <div class="right-img" data-aos="fade-up">
                        <img src="assets/img/img_site/img/gallery/about3.png" alt="">
                    </div>
                </div>
                <div class="left-content3" data-aos="fade-left">
                    <!-- section tittle -->
                    <div class="section-tittle section-tittle2 mb-20">
                        <div class="front-text">
                            <h2 class="">Những điều đặc biệt tại ... giúp bạn thành công</h2>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="assets/img/img_site/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Thời gian đào tạo nhanh</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="assets/img/img_site/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Hỗ trợ học phí tối đa</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="assets/img/img_site/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Cam kết công việc</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Area End -->
        <!--? Team -->
        <section class="team-area section-padding40 fix d-none">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2>Community experts</h2>
                        </div>
                    </div>
                </div>
                <div class="team-active">

                    <div class="single-cat text-center">
                        <div class="cat-icon">
                            <img src="assets/img/img_site/img/gallery/team1.png" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Mr. Urela</a></h5>
                            <p>The automated process all your website tasks.</p>
                        </div>
                    </div>
            </div>
        </section>
        <!-- Services End -->
        <!--? About Area-2 Start -->
        <section class="about-area2 fix pb-padding d-none">
            <div class="support-wrapper align-items-center">
                <div class="right-content2">
                    <!-- img -->
                    <div class="right-img">
                        <img src="assets/img/img_site/img/gallery/about2.png" alt="">
                    </div>
                </div>
                <div class="left-content2">
                    <!-- section tittle -->
                    <div class="section-tittle section-tittle2 mb-20">
                        <div class="front-text">
                            <h2 class="">Take the next step
                                toward your personal
                                and professional goals
                            with us.</h2>
                            <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.</p>
                            <a href="#" class="btn">Join now for Free</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Area End -->
    </main>

<style>
    :root {
        --star-size: 30px;
        --star-color: #fff;
        --star-background: #fc0;
    }
    .Stars {
        --percent: calc(var(--rating) / 5 * 100%);
        display: inline-block;
        font-size: var(--star-size);
        font-family: Times;
        line-height: 1;
    }
    .Stars::before {
        content: "★★★★★";
        letter-spacing: 3px;
        background: linear-gradient(90deg, var(--star-background) var(--percent), var(--star-color) var(--percent));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>