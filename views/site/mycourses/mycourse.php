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
                                <h1 data-animation="bounceIn" data-delay="0.2s">Chi tiết khóa học của bạn</h1>
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


    <div class="container section-padding40 fix">
            <div class="row justify-content-start">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle  mb-55">
                        <h2>Chi tiết khóa học</h2>
                    </div>
                </div>
            </div>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Thứ</th>
                <th scope="col">Môn học</th>
                <th scope="col">Lớp</th>
                <th scope="col">Giảng viên</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td><?php echo $course['name_course']?></td>
                    <td><?php echo $course['name_class']?></td>
                    <td><?php echo $course['name_teacher']?></td>
                    </tr>
            </tbody>
        </table>

    </div>
</main>