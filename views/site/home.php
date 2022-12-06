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
                                    <h1 data-animation="fadeInLeft" data-delay="0.2s">Trung tâm HDO</h1>
                                    <p data-animation="fadeInLeft" data-delay="0.4s">Xây dựng kỹ năng lập trình với các khóa học</p>
                                    <a href="<?= SIGUP?>" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Join Now</a>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
        </section>
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
                                            <div class="rating">
                                                <?= $avg_rate = empty(get_avg_rate_course($value['id'])) ? 0 : get_avg_rate_course($value['id']); ?>&nbsp;<i class="fas fa-star"></i>
                                            </div>
                                            <div class="Stars d-none" style="--rating: <?= $avg_rate ?>"></div>
                                            <p class="d-none"><span><?= $avg_rate ?></span>&nbsp;(<?= $count_rate ?>)</p>
                                        </div>
                                        <div class="price gap-4">
                                            <span><?= total($value['price_course'],$value['discount']) ?></span>
                                            <span class="d-none <?php echo $value['discount'] != 0 ? 'text-decoration-line-through textPrice colorOldPrice' : '' ?>"><?php echo number_format($value['price_course'])?></span>
                                            <span class="d-none"><?php echo $value['discount'] != 0 ? total($value['price_course'],$value['discount']) : '' ?></span>
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
        <section class="about-area3 fix">
            <div class="support-wrapper align-items-center">
                <div class="right-content3">
                    <!-- img -->
                    <div class="right-img" data-aos="fade-up">
                        <img class="p-3" src="assets/img/img_site/img/gallery/about3.png" alt="">
                    </div>
                </div>
                <div class="left-content3" data-aos="fade-left">
                    <!-- section tittle -->
                    <div class="section-tittle section-tittle2 mb-20">
                        <div class="front-text">
                            <h1 class="text-white fw-bold">Học lập trình để đi làm</h1>
                        </div>
                    </div>
                    <div class="single-features d-none">
                        <div class="features-icon">
                            <img src="assets/img/img_site/img/icon/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Thời gian đào tạo nhanh</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="c-section">
        <h5 class="c-section__title"><span>BẮT ĐẦU KHÔNG KHÓ</span></h5>
        <ul class="c-services">
            <li class="c-services__item">
                <h3>BẮT ĐẦU TỪ SỐ 0</h3>
                <p>Chương trình được thiết kế dành cho người không biết gì về ngành CNTT và lập trình. Bắt đầu với những việc nhỏ nhất như gõ bàn phím, cài đặt phần mềm, tìm kiếm thông tin</p>
            </li>
            <li class="c-services__item">
                <h3>TRẢI NGHIỆM DỄ ĐẾN KHÓ</h3>
                <p>Các trải nghiệm của học viên được thiết kế cẩn thận để giúp người mới dễ dàng bắt được nhịp. Chương trình của tháng đầu tiên đã được cải tiến qua 6 phiên bản trong 2 năm</p>
            </li>
            <li class="c-services__item">
                <h3>HỌC BẰNG TIẾNG VIỆT</h3>
                <p>Toàn bộ tài liệu học tập đều là tiếng Việt giúp dễ học, dễ hiểu. Các từ vựng tiếng Anh chuyên ngành được đan xen phù hợp để trang bị dần cho học viên khả năng tra cứu tài liệu</p>
            </li>
            <li class="c-services__item">
                <h3>HỌC ĐƯỢC</h3>
                <p>Chương trình được thiết kế cô đọng, cá nhân hóa, bám sát theo năng lực học từng học viên. Đảm bảo bất cứ ai, ở trình độ nào cũng có thể học được, hiểu được, thực hành được, tiến bộ được</p>
            </li>
            <li class="c-services__item">
                <h3>LÀM ĐƯỢC</h3>
                <p>Mỗi lớp học đều có các huấn luyện viên, tutor, hỗ trợ 1-1 toàn thời gian, đảm bảo học viên hoàn thành được các thử thách, đạt được mục tiêu học tập và đủ năng lực để làm việc tại doanh nghiệp</p>
            </li>
            <li class="c-services__item">
                <h3>CÓ VIỆC NGAY</h3>
                <p>Cam kết hoàn 100% học phí nếu học viên không tìm được việc trong vòng 45 ngày kể từ khi tốt nghiệp. Cam kết này được cụ thể hoá bằng một hợp đồng đào tạo ngay từ đầu</p>
            </li>
        </ul>
    </section>
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