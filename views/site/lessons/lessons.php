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
                                <h1 data-animation="bounceIn" data-delay="0.2s">Our courses</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Services</a></li> 
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
    <!-- Courses area start -->
    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Our featured courses</h2>
                    </div>
                </div>
            </div>
<!-- filter -->
            <div class='mb-5 d-flex justify-content-between align-items-center'>
                <button class="p-3 px-4 ml-4  bg-primary border-0 rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <i class="fa-solid fa-filter"></i>
                </button>
                <form class="d-flex gap-2" method="post" action='<?= LESSONS?>'>
                    <input name='input_search' class="px-3 rounded border-light py-2 me-2" type="search" placeholder="Search" aria-label="Search">
                    <div>
                        <button name='search_btn' class="p-3 rounded  border-0 bg-primary" type="submit">Search</button>
                    </div>                  
                </form>
            </div>
            <div class="offcanvas offcanvas-start bg-secondary bg-gradient" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header p-4">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                        <a href="home"><img src="assets/img/img_site/img/logo/logo.png" alt=""></a>
                    </h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <li class="mb-5">
                    <hr class='dropdown-divider'/>
                </li> 
                <div class="offcanvas-body">
                    <ul class='gap-5 row ml-3'>
                        <li><a href="<?= LESSONS?>?cate=all">Tất cả</a></li>
                        <?php foreach($categories as $value):?>
                        <li><a href="<?= LESSONS?>?cate=<?php echo $value['id']?>"><?php echo $value['name_category']?></a></li>

                        <?php endforeach?>

                    </ul>
                </div>
            </div>
            <div class="row">
               <?php foreach ($lessions as $value):?>
                <div class="col-lg-4">
                    <div class="properties properties2 mb-30">
                        <div class="properties__card">
                            <div class="properties__img overlay1">
                                <a href="<?= LESSONS?>/<?php echo $value['id']?>"><img src="assets/img/img_site/img/gallery/featured6.png" alt=""></a>
                            </div>
                            <div class="properties__caption">
                                <p>User Experience</p>
                                <h3><a href="<?= LESSONS?>/<?php echo $value['id']?>"><?php echo $value['name_course']?></a></h3>
                                <p>
                                    <?php echo $value['description_course'] ?>
                                </p>
                                <div class="properties__footer d-flex justify-content-between align-items-center">
                                    <div class="restaurant-name">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half"></i>
                                        </div>
                                        <p><span>(4.5)</span></p> 
                                        
                                    </div>
                                    <div class="price">

                                            <span class="<?php echo $value['discount'] != 0 ? 'text-decoration-line-through textPrice colorOldPrice' : '' ?>"><?php echo number_format($value['price_course'])?> $</span>

                                            <span><?php echo $value['discount'] != 0 ? total($value['price_course'],$value['discount']) : '' ?></span>
                                        </div>
                                </div>
                                <a href="<?= LESSONS?>/<?php echo $value['id']?>" class="border-btn border-btn2">Find out more</a>
                            </div>
                        </div>
                    </div>
                </div>
               <?php endforeach?>
            </div>
            <nav aria-label="Page navigation example">
                <?php pagination($data_cate[1],$data_cate[2],LESSONS)?>
            </nav>
        </div>
    </div>
</main>