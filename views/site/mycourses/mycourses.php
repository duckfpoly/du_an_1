<main>
    <!--? slider Area Start-->
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Khóa học của bạn</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Khóa học</a></li>
                                    </ol>
                                </nav>
                                <!-- breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </section>


    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Các khóa học của tôi</h2>
                    </div>
                </div>
            </div>
            <div class="courses-actives">
                <!-- Single -->
                <!-- Single -->
                <?php if(count($data) > 0){?>
                <?php foreach ($data as $value):?>
                    <div class="properties pb-20">
                        <div class="properties__card">
                            <div class="properties__img overlay1">
                                <a href="<?= MYCOURSE?>/<?php echo $value['id_course']?>">
                                    <img src="assets/uploads/courses/<?php echo $value['image_course']?>" class="card-image" alt="">
                                </a>
                            </div>
                            <div class="properties__caption">
                                <h3 class="card-title mb-2">
                                    <a href="<?= MYCOURSE?>/<?php echo $value['id_course']?>">
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
                                <a href="<?= MYCOURSE?>/<?php echo $value['id_course']?>" class="border-btn border-btn2">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php }else{?>
                    <h3 class='fst-italic text-danger'>Bạn chưa mua khóa học nào</h3>
                <?php }?>    
                <!-- Single -->
            </div>
        </div>
    </div>
</main>    