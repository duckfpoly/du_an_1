<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/css_site/customRadio.css">
<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="<?= BASE_URL ?>">Trang chủ</a></li>
                            <li><a href="<?= LESSONS ?>">Khóa học</a></li>
                            <li><?php echo $detail['name_course'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="course">
    <div class="container">
        <div class="row">
            <!-- Course -->
            <div class="col-lg-8">
                <div class="course_container">
                    <div class="course_title"><?php echo $detail['name_course'] ?></div>
                    <div class="course_info d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">

                        <!-- Course Info Item -->
<!--                        <div class="course_info_item">-->
<!--                            <div class="course_info_title">Giảng viên:</div>-->
<!--                            <div class="course_info_text"><a href="#">--><?php //echo $detail['name_teacher']?><!--</a></div>-->
<!--                        </div>-->

                        <!-- Course Info Item -->
                        <div class="course_info_item">
                            <div class="course_info_title">Đánh giá:</div>
                            <div class="rating_r rating_r_4">
                                <div class="Stars" style="--rating: <?= $avg_rate ?>;"></div>
                            </div>
                        </div>
                        <!-- Course Info Item -->
                        <div class="course_info_item">
                            <div class="course_info_title">Danh mục:</div>
                            <div class="course_info_text"><a href="#"><?= $detail['name_category'] ?></a></div>
                        </div>
                        <!-- Course Info Item -->
                        <div class="course_info_item">
                            <div class="course_info_title">Tổng học viên:</div>
                            <div class="course_info_text"><a href="#"><?= $total_std_course ?></a></div>
                        </div>
                    </div>
                    <!-- Course Image -->
                    <div class="course_image d-flex justify-content-center align-items-center"><img src="<?php echo BASE_URL ?>/assets/uploads/courses/<?php echo $detail['image_course']?>" alt="image course" width="50%" height="50%"></div>
                    <!-- Course Tabs -->
                    <div class="course_tabs_container">
                        <div class="tabs d-flex flex-row align-items-center justify-content-start">
                            <div class="tab active">Lớp học</div>
                            <div class="tab ">Mô tả</div>
                            <div class="tab">Chương trình học</div>
                            <div class="tab">Đánh giá (<span id="count_rate_1"><?= $count_rate ?></span>)</div>
                        </div>
                        <div class="tab_panels">
                            <!-- Lớp -->
                            <div class="tab_panel active">
                                <?php if(!empty($class)){ ?>
                                <div class="tab_panel_title mb-4">Danh sách lớp thuộc khóa học</div>
                                <div class="tab_panel_content">
                                    <div class="tab_panel_text table-responsive ">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>Tên lớp</th>
                                                    <th>Giảng viên</th>
                                                    <th>Khai giảng</th>
                                                    <th>Thời gian</th>
                                                    <th>Chỗ</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                           <tbody>
                                                <?php
                                                    $check_std_course = '';
                                                    $check_order_course = '';
                                                    foreach ($class as $let => $items):
                                                ?>
                                                <?php   $time_start = strtotime($items['time_start']);
                                                        $time_now   = strtotime(date("Y-m-d"));
                                                        if($time_now < $time_start) {
                                                ?>
                                                    <tr>
                                                        <form action="<?= PAYMENT ?>" method="post">
                                                            <input type="hidden" name="id_class" value="<?= $items['id'] ?>">
                                                            <td><?= $items['name_class'] ?> + <?= $items['id'] ?></td>
                                                            <td><?= $items['name_teacher'] ?></td>
                                                            <td><?= format_date($items['time_start']) ?></td>
                                                            <td><?= $items['time_learn'] == 0 ? '7h30 - 11h30' : '14h - 18h' ?></td>
                                                            <td><?= count_std_class($items['id']) ?>/<?= $items['slot'] ?></td>
                                                            <?php
                                                                if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 1){
                                                                    $check_std_course = check_std_course($id,$_SESSION['user']['id']);
                                                                    $check_order_course = check_order_course($id,$_SESSION['user']['id']);
                                                                    if(count_std_class($items['id']) != $items['slot']) {
                                                                        if(!isset($check_std_course)){
                                                                            if(!isset($check_order_course)){
                                                                                echo '<td><button type="submit" class="btn">Đăng ký</button></td>';
                                                                            }
                                                                        }
                                                                    }
                                                                    else {
                                                                        echo '<td>Đã đủ học viên</td>';
                                                                    }
                                                                }
                                                            ?>
                                                        </form>
                                                    </tr>
                                                <?php } endforeach;  ?>
                                           </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php if(!isset($_SESSION['user'])){ ?>
                                    Vui lòng <a href="<?= SIGIN ?>" class="text-danger">đăng nhập</a> để đăng ký lớp học
                                <?php } ?>
                                <?php } else { echo 'Chưa có lớp học' ;} ?>
                                <div class="mt-3">
                                    <?= isset($check_std_course)    ? $check_std_course : ''; ?>
                                    <?= isset($check_order_course)  ? $check_order_course : ''; ?>
                                </div>
                            </div>
                            <!-- Mô tả -->
                            <div class="tab_panel">
                                <div class="tab_panel_title">Mô tả về khóa học</div>
                                <div class="tab_panel_content">
                                    <div class="tab_panel_text">
                                        <p><?php echo $detail['description_course']?></p>
                                        <p><?php echo $detail['quote']?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Chương trình học -->
                            <div class="tab_panel tab_panel_2">
                                <div class="tab_panel_content">
                                    <?php if(!empty($lesson_course)){  ?>

                                    <div class="tab_panel_title">Nội dung chương trình</div>
                                    <div class="tab_panel_content">
                                        <!-- Dropdowns -->
                                        <ul class="dropdowns">
                                            <?php foreach ($lesson_course as $key => $values){ $detail_lesson = get_detail_lesson_course($values['id']) ?>
                                                <?php if(!empty($detail_lesson)){ ?>
                                                    <li class="has_children">
                                                        <div class="dropdown_item">
                                                            <div class="dropdown_item_title"><span>Bài <?= $key +=1 ?>:</span> <?= $values['lession'] ?></div>
                                                        </div>
                                                        <ul>
                                                            <?php foreach ($detail_lesson as $key => $item_detail){ ?>
                                                            <li>
                                                                <div class="dropdown_item">
                                                                    <div class="dropdown_item_title"><span>Bài 1.<?= $key+=1 ?>:</span> <?= $item_detail['content'] ?></div>
                                                                </div>
                                                            </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </li>
                                                <?php } else { ?>
                                                    <li>
                                                        <div class="dropdown_item">
                                                            <div class="dropdown_item_title"><span>Bài <?= $key +=1 ?>:</span> <?= $values['lession'] ?></div>
                                                        </div>
                                                    </li>
                                                <?php } ?>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <?php } else {  echo 'Chưa có chương trình học'; } ?>
                                </div>
                            </div>
                            <!-- Đánh giá -->
                            <div class="tab_panel tab_panel_3">
                                <div class="tab_panel_title">Đánh giá khóa học</div>
                                <!-- Rating -->
                                <div class="review_rating_container flex justify-content-center algin-items-center flex-wrap">
                                    <div class="review_rating " >
                                        <div class="review_rating_num"><?= round($avg_rate) ?> </div>
                                        <div class="review_rating_stars">
                                            <div class="rating_r rating_r_4">
                                                <div class="Stars" style="--rating: <?= $avg_rate ?>;"></div>
                                            </div>
                                        </div>
                                        <div class="review_rating_text">( <span id="count_rate_2"><?= $count_rate ?></span> đánh giá)</div>
                                    </div>
                                    <div class="review_rating_bars d-none">
                                        <ul>
                                            <?php for ($i = 1 ; $i <= 5; $i++){  ?>
                                                <li>
                                                    <span><?= $i ?> <i class="fa fa-star" style="color: orange;"></i></span>
                                                    <div class="review_rating_bar" style="border-radius: 20px; margin-left: 5px;margin-right: 5px;">
                                                        <div style="border-radius: 20px; width:<?= empty(get_count_rate($id,$i)['count_rate']) ? cal_percent(0,$count_rate) : cal_percent(get_count_rate($id,$i)['count_rate'],$count_rate) ?>%;"></div>
                                                    </div>
                                                    <span><?= empty(get_count_rate($id,$i)['count_rate']) ? cal_percent(0,$count_rate) : cal_percent(get_count_rate($id,$i)['count_rate'],$count_rate) ?>%</span>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="comments_container">
                                    <ul class="comments_list" id="rate_list"></ul>
                                    <ul class="comments_list pb-5">
                                        <?php if(!empty($rate_course)){ ?>
                                        <?php foreach ($rate_course as $key => $values): ?>
                                            <li class="cmt-item">
                                                <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                                    <div class="comment_image">
                                                        <img src="<?= BASE_URL ?>assets/uploads/students/<?= $values['image_student'] ?>" alt="Image User">
                                                    </div>
                                                    <div class="comment_content">
                                                        <div class="comment_title_container ">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="d-flex">
                                                                    <div class="comment_author"><a href="#"><?= $values['name_student'] ?></a></div>
                                                                    <div class="Stars" style="--rating: <?= $values['rate'] ?>;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="comment_text"><p><?= $values['content_rate'] ?></p></div>
                                                        <div class="comment_extras d-flex flex-row align-items-center justify-content-start">
                                                            <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span>0</span></a></div>&emsp;
                                                            <div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-down" aria-hidden="true"></i><span>0</span></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                        <?php }else { ?>
                                             <div class="add_comment_text" id="no_review"><h3>Chưa có đánh giá về khóa học !</h3></div>
                                        <?php } ?>
                                    </ul>
                                    <div class="text-center ">
                                        <a href="#" class="text-dark" id="loadMore">Xem thêm</a>
                                        <a href="#" class="d-none text-dark" id="loadLess">Ẩn bớt</a>
                                    </div>
                                    <div class="add_comment_container pt-5">
                                        <?php if( isset($_SESSION['user']) && getSession('user')['role'] == 1 ){ ?>
                                            <div class="add_comment_title">Đánh giá của bạn về khóa học</div>
                                            <form action="<?= LESSONS.'/'.$id ?>" method="post" onsubmit="return false">
                                                <input type="hidden" name="image_student"   id="image_student"      value="<?= getSession('user')['image_student'] ?>">
                                                <input type="hidden" name="name_student"    id="name_student"       value="<?= getSession('user')['name_student'] ?>">
                                                <input type="hidden" name="id_course"       id="id_course"          value="<?= $_GET['id'] ?>">
                                                <input type="hidden" name="id_student"      id="id_student"         value="<?= getSession('user')['id'] ?>">
                                                <div class="rate">
                                                    <input type="radio" id="star5" name="rate" value="5">
                                                    <label for="star5">5 stars</label>
                                                    <input type="radio" id="star4" name="rate" value="4">
                                                    <label for="star4">4 stars</label>
                                                    <input type="radio" id="star3" name="rate" value="3">
                                                    <label for="star3">3 stars</label>
                                                    <input type="radio" id="star2" name="rate" value="2">
                                                    <label for="star2">2 stars</label>
                                                    <input type="radio" id="star1" name="rate" value="1">
                                                    <label for="star1">1 star</label>
                                                </div>
                                                <textarea name="content_rate" cols="30" rows="5" id="content_rate" class="form-control mt-2 fs-3" placeholder="Viết đánh giá ..."></textarea>
                                                <button class="btn btn-secondary mt-3" onclick="save()">Gửi</button>
                                            </form>
                                        <?php } else { ?>
                                            <div class="add_comment_text"><h3>Vui lòng đăng nhập để đánh giá! <a id="login" href="<?= BASE_URL ?>account/sign_in">Đăng nhập ngay</a></h3></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_section_title">Chi tiết khóa học</div>
                        <div class="sidebar_feature">
                            <div class="course_price"><?= total($detail['price_course'],$detail['discount'])?> <small>( 1 tháng )</small> </div>
                            <!-- Features -->
                            <div class="feature_list">
                                <div class="feature d-flex flex-row align-items-center justify-content-start">
                                    <div class="feature_title"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Thời gian đào tạo:&nbsp;</span></div>
                                    <div class="feature_text ml-auto">6 tháng</div>
                                </div>
                                <div class="feature d-flex flex-row align-items-center justify-content-start">
                                    <div class="feature_title"><i class="fa fa-users" aria-hidden="true"></i><span>Địa điểm học:&nbsp;</span></div>
                                    <div class="feature_text ml-auto">120, Hoàng Quốc Việt</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_section_title">Khóa học liên quan</div>
                        <div class="sidebar_latest">
                            <?php foreach ($course_same_cate as $key => $values): ?>
                            <div class="same_course mb-4">
                                <div class=" latest d-flex flex-row align-items-start justify-content-start ">
                                    <div class="latest_image">
                                        <div>
                                            <a href="<?= LESSONS ?>/<?= $values['id'] ?>">
                                                <img class="rounded" src="<?php echo BASE_URL ?>/assets/uploads/courses/<?= $values['image_course'] ?>" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="latest_content">
                                        <div class="latest_title"><a href="<?= LESSONS ?>/<?= $values['id'] ?>"><?= $values['name_course'] ?></a></div>
                                        <div class="latest_price"><?= total($values['price_course'],$values['discount'])  ?></div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <div class="text-center ">
                                <a href="#" class="text-dark" id="loadMoreCourseOther">Xem thêm</a>
                                <a href="#" class="d-none text-dark" id="loadLessCourseOther">Ẩn bớt</a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_section_title">Danh mục khóa học</div>
                        <div class="sidebar_latest">
                            <?php foreach ($categories as $key => $values): ?>
                                <!-- Latest Course -->
                                <div class="latest d-flex flex-row align-items-start justify-content-start <?= $values['id'] == 1 ? 'd-none' : '' ?>">
                                    <div class="latest_content">
                                        <div class="latest_title"><a href="<?= LESSONS ?>/?cate=<?= $values['id'] ?>"><?= $values['name_category'] ?></a></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <section class="amazing_feature">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12" data-aos="flip-up">
                    <div class="single_feature">
                        <div class="feature_icon"><i class="far fa-heart"></i></div>
                        <h3>500 +</h3>
                        <p>Số giờ học (8h/buổi + 5 buổi/tuần + 65 buổi). Học như đi làm</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12" data-aos="zoom-in">
                    <div class="single_feature">
                        <div class="feature_icon"><i class="fa fa-magic"></i></div>
                        <h3>300+</h3>
                        <p>Bài tập thực hành, phân chia căn bản, nâng cao, chuyên sâu</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12" data-aos="flip-down">
                    <div class="single_feature">
                        <div class="feature_icon"><i class="fas fa-location-arrow"></i></div>
                        <h3>3+</h3>
                        <p>Số dự án bạn sẽ làm được bao gồm dự án cá nhân, nhóm</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <secion id="mainWrapper">
        <div class="feat bg-gray pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="section-head col-sm-12">
                        <h4>Học viên sẽ nhận được gì?</h4>
                    </div>
                    <div class="col-lg-4 col-sm-6" data-aos="zoom-out-right">
                        <div class="item"> <span class="icon feature_box_col_one"><i class="fa fa-globe"></i></span>
                            <h6>80% Thời gian thực hành</h6>
                            <p>Hầu hết thời gian học viên sẽ được luyện tập trực tiếp 1-1 cùng với trợ giảng nâng cao kỹ năng vận dụng kiến thức khi làm dự án</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6" data-aos="zoom-out-up">
                        <div class="item"> <span class="icon feature_box_col_three"><i class="fa fa-hourglass-half"></i></span>
                            <h6>Thực chiến 3 dự án</h6>
                            <p>Mỗi Module học tập học viên sẽ được làm một dự án. Học viên có tối đa 5 dự án thêm vào CV là điểm cộng rất lớn khi xin việc.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6" data-aos="zoom-out-left">
                        <div class="item"> <span class="icon feature_box_col_four"><i class="fa fa-database"></i></span>
                            <h6>Cam kết công việc sau tốt nghiệp</h6>
                            <p>Hoàn thành đồ án, học viên được cấp chứng chỉ và hướng dẫn viết CV, kỹ năng phỏng vấn và hỗ trợ tìm môi trường làm việc lý tưởng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </secion>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="py-4">
                    <h2 class="text-capitalize font-weight-bold my-3">Những điều <span  style="color: #9B5DE5">Đặc Biệt</span> của khóa học</h2>
                    <p class="text-secondary" style="line-height: 2;">Phương pháp học tập tạo sự khác biệt dẫn đến thành công</p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 px-4 my-2">
                        <i class="fa-solid fa-code"></i>
                        <div class="mt-3">
                            <h5 class="mb-2" style="font-weight: 600;"><a href="#" style="color: #9B5DE5">Code chuẩn chỉnh</a></h5>
                            <p class="text-secondary">Code sẽ được review cải tiến chuẩn mức yêu cầu như đi làm</p>
                        </div>
                    </div>
                    <div class="col-md-6 px-4 my-2">
                        <i class="fa-solid fa-handshake-angle"></i>
                        <div class="mt-3">
                            <h5 class="mb-2" style="font-weight: 600;"><a href="#" style="color: #9B5DE5">Support học viên 24/7</a></h5>
                            <p class="text-secondary">Nhóm Zalo học tập, giải đáp mọi thắc mắc ngay tức thì</p>
                        </div>
                    </div>
                    <div class="col-md-6 px-4 my-2">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <div class="mt-3">
                            <h5 class="mb-2" style="font-weight: 600;"><a href="#" style="color: #9B5DE5">Kỹ năng Search</a></h5>
                            <p class="text-secondary">Không thể thiếu với lập trình viên, search sao cho chuẩn, ra vấn đề</p>
                        </div>
                    </div>
                    <div class="col-md-6 px-4 my-2">
                        <i class="fa-solid fa-clock"></i>
                        <div class="mt-3">
                            <h5 class="mb-2" style="font-weight: 600;"><a href="#" style="color: #9B5DE5">Thực chiến dự án</a></h5>
                            <p class="text-secondary">Thực hành, thực hành và thực hành. Hơn 300+ bài tập lớn nhỏ</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="section-head col-sm-12 p-3" style="margin-top: 100px">
        <h4>Các sản phẩm của học viên</h4>
    </div>
    <div class="swiper mySwiper container mb-5">
        <div class="swiper-wrapper container">
            <div class="swiper-slide">
                <figure class="snip0016">
                    <img src="https://mlcumuvdzi0w.i.optimole.com/cb:UbYe.da8/w:500/h:357/q:mauto/f:avif/https://nodemy.vn/wp-content/uploads/2022/09/K13-CShop.png" alt="sample41"/>
                    <figcaption>
                        <h2>CShop Ecommerce</h2>
                        <p>Dự án thương mại điện tử,
                            phát triển bởi K13 với ReactJS NodeJS,
                            giai đoạn 1 hoàn thành các chức năng cho phép tạo các gian hàng ảo của mình. <br>
                            <button class="btn btn-outline-danger mt-3" href="http://thexstore.tk/">Xem dự án</button>
                        </p>
                        <a href="http://thexstore.tk/"></a>
                    </figcaption>
                </figure>
            </div>
            <div class="swiper-slide">
                <figure class="snip0016">
                    <img src="https://mlcumuvdzi0w.i.optimole.com/cb:UbYe.da8/w:500/h:366/q:mauto/f:avif/https://nodemy.vn/wp-content/uploads/2022/09/K14-shop-my-pham.png" alt="sample41"/>
                    <figcaption>
                        <h2>Store Mỹ Phẩm</h2>
                        <p>Ý tưởng K11 xây dựng một của hàng thể thao online. Tiền đề cho kế hoạch bán hàng online của nhóm. Công nghệ: ReactJS & NodeJS<br>
                            <button class="btn btn-outline-danger mt-3" href="http://thexstore.tk/">Xem dự án</button>
                        </p>
                        <a href="http://thexstore.tk/"></a>
                    </figcaption>
                </figure>
            </div>
            <div class="swiper-slide">
                <figure class="snip0016">
                    <img src="https://mlcumuvdzi0w.i.optimole.com/cb:UbYe.da8/w:500/h:289/q:mauto/f:avif/https://nodemy.vn/wp-content/uploads/2022/09/K14-shop-nu.png" alt="sample41"/>
                    <figcaption>
                        <h2>Shop Thời Trang Nữ</h2>
                        <p>Một Shop có UI/UX đẹp sẽ giúp kích thích khách mua hàng. Với ReactJS & NodeJS Team 2 K14 hoàn thành project web bán hàng đơn giản và tinh tế<br>
                            <button class="btn btn-outline-danger mt-3" href="http://thexstore.tk/">Xem dự án</button>
                        </p>
                        <a href="http://thexstore.tk/"></a>
                    </figcaption>
                </figure>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<script src="<?= BASE_URL ?>assets/js/course/comment.js"></script>
<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/course_details.css">
<script>
    var lenght = 2;
    load_more_2(".cmt-item", "#loadMore", "#loadLess", lenght);
    load_less_scroll(".cmt-item", "#loadLess", "#loadMore", lenght, 900);

    load_more_2(".same_course", "#loadMoreCourseOther", "#loadLessCourseOther", lenght);
    load_less_2(".same_course", "#loadLessCourseOther", "#loadMoreCourseOther", lenght);
</script>
<script>
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true
        },
        // pagination: {
        //     el: ".swiper-pagination"
        // },
        autoplay: {
            delay: 5000
        }
    });
</script>
<style>
    .tab.active,
    .tab:hover
    {
        background: linear-gradient(to top, #c054ff 0%, #5274ff 100%);
        color: #FFFFFF;
    }
    .review_rating_bar > div {
        background: linear-gradient(to right, #c054ff 0%, #5274ff 100%);

    }
</style>
