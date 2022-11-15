<!-- Home -->

<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="courses.html">Courses</a></li>
                            <li>Course Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Course -->

<div class="course">
    <div class="container">
        <div class="row">

            <!-- Course -->
            <div class="col-lg-8">

                <div class="course_container">
                    <div class="course_title"><?php echo $detail['name_course']?></div>
                    <div class="course_info d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">

                        <!-- Course Info Item -->
                        <div class="course_info_item">
                            <div class="course_info_title">Teacher:</div>
                            <div class="course_info_text"><a href="#"><?php echo $detail['name_teacher']?></a></div>
                        </div>

                        <!-- Course Info Item -->
                        <div class="course_info_item">
                            <div class="course_info_title">Reviews:</div>
                            <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                        </div>

                        <!-- Course Info Item -->
                        <div class="course_info_item">
                            <div class="course_info_title">Categories:</div>
                            <div class="course_info_text"><a href="#">Languages</a></div>
                        </div>

                    </div>

                    <!-- Course Image -->
                    <div class="course_image"><img src="<?php echo $host?>/assets/uploads/courses/<?php echo $detail['image_course']?>" alt=""></div>

                    <!-- Course Tabs -->
                    <div class="course_tabs_container">
                        <div class="tabs d-flex flex-row align-items-center justify-content-start">
                            <div class="tab active">Mô tả</div>
                            <div class="tab">Chương trình học</div>
                            <div class="tab">Đánh giá</div>
                        </div>
                        <div class="tab_panels">

                            <!-- Description -->
                            <div class="tab_panel active">
                                <div class="tab_panel_title">Software Training</div>
                                <div class="tab_panel_content">
                                    <div class="tab_panel_text">
                                        <p><?php echo $detail['description_course']?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Curriculum -->
                            <div class="tab_panel tab_panel_2">
                                <div class="tab_panel_content">
                                    <div class="tab_panel_title">Software Training</div>
                                    <div class="tab_panel_content">
                                        <div class="tab_panel_text">
                                            <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                                        </div>

                                        <!-- Dropdowns -->
                                        <ul class="dropdowns">
                                            <li class="has_children">
                                                <div class="dropdown_item">
                                                    <div class="dropdown_item_title"><span>Lecture 1:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                    <div class="dropdown_item_text">
                                                        <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <div class="dropdown_item">
                                                            <div class="dropdown_item_title"><span>Lecture 1.1:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                            <div class="dropdown_item_text">
                                                                <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="dropdown_item">
                                                            <div class="dropdown_item_title"><span>Lecture 1.2:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                            <div class="dropdown_item_text">
                                                                <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="has_children">
                                                <div class="dropdown_item">
                                                    <div class="dropdown_item_title"><span>Lecture 2:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                    <div class="dropdown_item_text">
                                                        <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <div class="dropdown_item">
                                                            <div class="dropdown_item_title"><span>Lecture 2.1:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                            <div class="dropdown_item_text">
                                                                <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="dropdown_item">
                                                            <div class="dropdown_item_title"><span>Lecture 2.2:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                            <div class="dropdown_item_text">
                                                                <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="dropdown_item">
                                                    <div class="dropdown_item_title"><span>Lecture 3:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                    <div class="dropdown_item_text">
                                                        <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dropdown_item">
                                                    <div class="dropdown_item_title"><span>Lecture 4:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                    <div class="dropdown_item_text">
                                                        <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dropdown_item">
                                                    <div class="dropdown_item_title"><span>Lecture 5:</span> Lorem Ipsn gravida nibh vel velit auctor aliquet.</div>
                                                    <div class="dropdown_item_text">
                                                        <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews -->
                            <div class="tab_panel tab_panel_3">
                                <div class="tab_panel_title">Course Review</div>

                                <!-- Rating -->
                                <div class="review_rating_container">
                                    <div class="review_rating">
                                        <div class="review_rating_num">4.5</div>
                                        <div class="review_rating_stars">
                                            <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                                        </div>
                                        <div class="review_rating_text">(28 Ratings)</div>
                                    </div>
                                    <div class="review_rating_bars">
                                        <ul>
                                            <li><span>5 Star</span><div class="review_rating_bar"><div style="width:90%;"></div></div></li>
                                            <li><span>4 Star</span><div class="review_rating_bar"><div style="width:75%;"></div></div></li>
                                            <li><span>3 Star</span><div class="review_rating_bar"><div style="width:32%;"></div></div></li>
                                            <li><span>2 Star</span><div class="review_rating_bar"><div style="width:10%;"></div></div></li>
                                            <li><span>1 Star</span><div class="review_rating_bar"><div style="width:3%;"></div></div></li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Comments -->
                                <div class="comments_container">
                                        <li>
                                            <div class="comment_item d-flex flex-row align-items-start jutify-content-start">
                                                <div class="comment_image"><div><img src="images/comment_3.jpg" alt=""></div></div>
                                                <div class="comment_content">
                                                    <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="comment_author"><a href="#">Milley Cyrus</a></div>
                                                        <div class="comment_rating"><div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div></div>
                                                        <div class="comment_time ml-auto">1 day ago</div>
                                                    </div>
                                                    <div class="comment_text">
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some form, by injected humour.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- <div class="add_comment_container">
                                        <div class="add_comment_title">Add a review</div>
                                        <div class="add_comment_text">You must be <a href="#">logged</a> in to post a comment.</div>
                                    </div> -->
                                    <form action='' method='post' class="form-floating mt-5"> 
                                        <div class="page">
                                            <div class="page__demo">
                                                <div class="page__group">
                                                    <div class="rating">
                                                        <input type="radio" name="rating-star" class="rating__control screen-reader" id="rc1" value ='1'>
                                                        <input type="radio" name="rating-star" class="rating__control screen-reader" id="rc2" value ='2'>
                                                        <input type="radio" name="rating-star" class="rating__control screen-reader" id="rc3" value ='3'>
                                                        <input type="radio" name="rating-star" class="rating__control screen-reader" id="rc4" value ='4'>
                                                        <input type="radio" name="rating-star" class="rating__control screen-reader" id="rc5" value ='5'>
                                                        <label for="rc1" class="rating__item">
                                                        <svg class="rating__star">
                                                            <use xlink:href="#star"></use>
                                                        </svg>
                                                        <span class="screen-reader">1</span>
                                                        </label>
                                                        <label for="rc2" class="rating__item">
                                                        <svg class="rating__star">
                                                            <use xlink:href="#star"></use>
                                                        </svg>
                                                        <span class="screen-reader">2</span>
                                                        </label>
                                                        <label for="rc3" class="rating__item">
                                                        <svg class="rating__star">
                                                            <use xlink:href="#star"></use>
                                                        </svg>
                                                        <span class="screen-reader">3</span>
                                                        </label>
                                                        <label for="rc4" class="rating__item">
                                                        <svg class="rating__star">
                                                            <use xlink:href="#star"></use>
                                                        </svg>
                                                        <span class="screen-reader">4</span>
                                                        </label>
                                                        <label for="rc5" class="rating__item">
                                                        <svg class="rating__star">
                                                            <use xlink:href="#star"></use>
                                                        </svg>
                                                        <span class="screen-reader">5</span>
                                                        </label>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
                                            <symbol id="star" viewBox="0 0 26 28">
                                                <path d="M26 10.109c0 .281-.203.547-.406.75l-5.672 5.531 1.344 7.812c.016.109.016.203.016.313 0 .406-.187.781-.641.781a1.27 1.27 0 0 1-.625-.187L13 21.422l-7.016 3.687c-.203.109-.406.187-.625.187-.453 0-.656-.375-.656-.781 0-.109.016-.203.031-.313l1.344-7.812L.39 10.859c-.187-.203-.391-.469-.391-.75 0-.469.484-.656.875-.719l7.844-1.141 3.516-7.109c.141-.297.406-.641.766-.641s.625.344.766.641l3.516 7.109 7.844 1.141c.375.063.875.25.875.719z"/>
                                            </symbol>
                                        </svg>
                                        <textarea class="form-control fs-4"  placeholder="Bình luận"  style="height: 100px"></textarea>
                                        <button class="btn primary mt-5">Gửi</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Course Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">

                    <!-- Feature -->
                    <div class="sidebar_section">
                        <div class="sidebar_section_title">Course Feature</div>
                        <div class="sidebar_feature">
                            <div class="course_price">$180</div>

                            <!-- Features -->
                            <div class="feature_list">

                                <!-- Feature -->
                                <div class="feature d-flex flex-row align-items-center justify-content-start">
                                    <div class="feature_title"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Duration:</span></div>
                                    <div class="feature_text ml-auto">2 weeks</div>
                                </div>

                                <!-- Feature -->
                                <div class="feature d-flex flex-row align-items-center justify-content-start">
                                    <div class="feature_title"><i class="fa fa-file-text-o" aria-hidden="true"></i><span>Lectures:</span></div>
                                    <div class="feature_text ml-auto">10</div>
                                </div>

                                <!-- Feature -->
                                <div class="feature d-flex flex-row align-items-center justify-content-start">
                                    <div class="feature_title"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span>Lectures:</span></div>
                                    <div class="feature_text ml-auto">6</div>
                                </div>

                                <!-- Feature -->
                                <div class="feature d-flex flex-row align-items-center justify-content-start">
                                    <div class="feature_title"><i class="fa fa-list-alt" aria-hidden="true"></i><span>Lectures:</span></div>
                                    <div class="feature_text ml-auto">Yes</div>
                                </div>

                                <!-- Feature -->
                                <div class="feature d-flex flex-row align-items-center justify-content-start">
                                    <div class="feature_title"><i class="fa fa-users" aria-hidden="true"></i><span>Lectures:</span></div>
                                    <div class="feature_text ml-auto">35</div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Feature -->
                    <div class="sidebar_section">
                        <div class="sidebar_section_title">Teacher</div>
                        <div class="sidebar_teacher">
                            <div class="teacher_title_container d-flex flex-row align-items-center justify-content-start">
                                <div class="teacher_image"><img src="<?php $host?>/assets/uploads/teachers/<?php $detail['image_teacher']?>" alt=""></div>
                                <div class="teacher_title">
                                    <div class="teacher_name"><a href="#"><?php echo $detail['name_teacher']?></a></div>
                                    <div class="teacher_position">Marketing & Management</div>
                                </div>
                            </div>
                            <div class="teacher_meta_container">
                                <!-- Teacher Rating -->
                                <div class="teacher_meta d-flex flex-row align-items-center justify-content-start">
                                    <div class="teacher_meta_title">Average Rating:</div>
                                    <div class="teacher_meta_text ml-auto"><span>4.7</span><i class="fa fa-star" aria-hidden="true"></i></div>
                                </div>
                                <!-- Teacher Review -->
                                <div class="teacher_meta d-flex flex-row align-items-center justify-content-start">
                                    <div class="teacher_meta_title">Review:</div>
                                    <div class="teacher_meta_text ml-auto"><span>12k</span><i class="fa fa-comment" aria-hidden="true"></i></div>
                                </div>
                                <!-- Teacher Quizzes -->
                                <div class="teacher_meta d-flex flex-row align-items-center justify-content-start">
                                    <div class="teacher_meta_title">Quizzes:</div>
                                    <div class="teacher_meta_text ml-auto"><span>600</span><i class="fa fa-user" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <div class="teacher_info">
                                <p><?php echo $detail['about_teacher']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->

