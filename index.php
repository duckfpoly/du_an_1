<?php include 'global.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= title_site() ?></title>
    <meta name="description" content="App Course">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= BASE_URL ?>assets/img/img_site/img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/css/css_site/course.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/css/css_site/course_responsive.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/css/css_site/animate.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/css_site/setup.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/css_site/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/css_site/slicknav.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/css_site/flaticon.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/css_site/progressbar_barfiller.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/css_site/gijgo.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/css_site/animate.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/css_site/magnific-popup.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/css_site/themify-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/css_site/slick.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/css_site/nice-select.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/css_site/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/toasts/toast.css"/>
    <link rel="stylesheet" href="css/mains.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/flex.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js">            </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
    <script src="<?= BASE_URL ?>assets/admin/js/items/load_div.js">                            </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.0/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <style>
        body::-webkit-scrollbar {
            width: 10px;
        }

        body::-webkit-scrollbar-thumb {
            /*background: linear-gradient(to bottom, #7A7FBA, #11C37C);*/
            /*background: -moz-linear-gradient(top, #c054ff 0%, #5274ff 100%);*/
            /*background: -webkit-linear-gradient(top, #c054ff 0%, #5274ff 100%);*/
            background: linear-gradient(to top, #c054ff 0%, #5274ff 100%);
             /*background: #B08EAD; */
            border-radius: 10px;
        }

        body::-webkit-scrollbar-track {
            /* background-color: #7A7FBA; */
            background: transparent
        }
    </style>
</head>
<body>
    <div id="toastt"></div>

    <?php include 'views/site/layout/navbar.php'?>
    <?php include 'routes/route_site.php'?>
    <?php include 'views/site/layout/footer.php'?>

    <script src="<?= BASE_URL ?>assets/js/course/jquery-3.2.1.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/course/course.js"></script>
    <!-- JS here -->
    <script src="<?= BASE_URL ?>assets/js/js/vendor/modernizr-3.5.0.min.js"></script>

    <!-- Jquery, Popper, Bootstrap -->
    <script src="<?= BASE_URL ?>assets/js/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/js/popper.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="<?= BASE_URL ?>assets/js/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="<?= BASE_URL ?>assets/js/js/owl.carousel.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/js/slick.min.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="<?= BASE_URL ?>assets/js/js/wow.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/js/animated.headline.js"></script>
    <script src="<?= BASE_URL ?>assets/js/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="<?= BASE_URL ?>assets/js/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="<?= BASE_URL ?>assets/js/js/jquery.nice-select.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/js/jquery.sticky.js"></script>
    <!-- Progress -->
    <script src="<?= BASE_URL ?>assets/js/js/jquery.barfiller.js"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="<?= BASE_URL ?>assets/js/js/jquery.counterup.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/js/waypoints.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/js/jquery.countdown.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="<?= BASE_URL ?>assets/js/js/contact.js"></script>
    <script src="<?= BASE_URL ?>assets/js/js/jquery.form.js"></script>
    <script src="<?= BASE_URL ?>assets/js/js/jquery.validate.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/js/mail-script.js"></script>
    <script src="<?= BASE_URL ?>assets/js/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="<?= BASE_URL ?>assets/js/js/plugins.js"></script>
    <script src="<?= BASE_URL ?>assets/js/js/main.js"></script>

    <!-- Tạo thông báo   -->
    <script src="<?= BASE_URL ?>assets/toasts/toast.js"></script>
    <script src="<?= BASE_URL ?>assets/admin/js/plugins/validate.js"></script>
    <!-- Đánh giá khóa học   -->
    <script> var host = "http://localhost/courses/";</script>
    <script src="<?= BASE_URL ?>assets/js/course/comment.js"></script>
    <script src="<?= BASE_URL ?>assets/js/profile/update_profile.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>

