<?php include 'global.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
<!--    <title>--><?//= title_site() ?><!--</title>-->
    <meta name="description" content="App Course">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $host ?>assets/img/img_site/img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $host ?>assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?= $host ?>assets/css/css_site/course.css">
    <link rel="stylesheet" type="text/css" href="<?= $host ?>assets/css/css_site/course_responsive.css">
    <link rel="stylesheet" type="text/css" href="<?= $host ?>assets/css/css_site/animate.css">
    <link rel="stylesheet" href="<?= $host ?>assets/css/css_site/setup.css">
<!--    <link rel="stylesheet" href="--><?//= $host ?><!--assets/css/css_site/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?= $host ?>assets/css/css_site/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= $host ?>assets/css/css_site/slicknav.css">
    <link rel="stylesheet" href="<?= $host ?>assets/css/css_site/flaticon.css">
    <link rel="stylesheet" href="<?= $host ?>assets/css/css_site/progressbar_barfiller.css">
    <link rel="stylesheet" href="<?= $host ?>assets/css/css_site/gijgo.css">
    <link rel="stylesheet" href="<?= $host ?>assets/css/css_site/animate.min.css">
<!--    <link rel="stylesheet" href="--><?//= $host ?><!--assets/css/css_site/animated-headline.css">-->
    <link rel="stylesheet" href="<?= $host ?>assets/css/css_site/magnific-popup.css">
    <link rel="stylesheet" href="<?= $host ?>assets/css/css_site/themify-icons.css">
    <link rel="stylesheet" href="<?= $host ?>assets/css/css_site/slick.css">
    <link rel="stylesheet" href="<?= $host ?>assets/css/css_site/nice-select.css">
    <link rel="stylesheet" href="<?= $host ?>assets/css/css_site/style.css">
    <link rel="stylesheet" href="<?= $host ?>assets/toasts/toast.css"/>
    <link rel="stylesheet" href="css/mains.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js">            </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
    <script src="<?= $host ?>assets/admin/js/items/load_div.js">                            </script>
</head>
<body>
    <div id="toastt"></div>

    <?php include 'views/site/layout/navbar.php'?>
    <?php include 'routes/route_site.php'?>
    <?php include 'views/site/layout/footer.php'?>

    <script src="<?= $host ?>assets/js/course/jquery-3.2.1.min.js"></script>
    <script src="<?= $host ?>assets/js/course/course.js"></script>
    <!-- JS here -->
    <script src="<?= $host ?>assets/js/js/vendor/modernizr-3.5.0.min.js"></script>

    <!-- Jquery, Popper, Bootstrap -->
    <script src="<?= $host ?>assets/js/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= $host ?>assets/js/js/popper.min.js"></script>
    <script src="<?= $host ?>assets/js/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="<?= $host ?>assets/js/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="<?= $host ?>assets/js/js/owl.carousel.min.js"></script>
    <script src="<?= $host ?>assets/js/js/slick.min.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="<?= $host ?>assets/js/js/wow.min.js"></script>
    <script src="<?= $host ?>assets/js/js/animated.headline.js"></script>
    <script src="<?= $host ?>assets/js/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="<?= $host ?>assets/js/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="<?= $host ?>assets/js/js/jquery.nice-select.min.js"></script>
    <script src="<?= $host ?>assets/js/js/jquery.sticky.js"></script>
    <!-- Progress -->
    <script src="<?= $host ?>assets/js/js/jquery.barfiller.js"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="<?= $host ?>assets/js/js/jquery.counterup.min.js"></script>
    <script src="<?= $host ?>assets/js/js/waypoints.min.js"></script>
    <script src="<?= $host ?>assets/js/js/jquery.countdown.min.js"></script>
    <script src="<?= $host ?>assets/js/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="<?= $host ?>assets/js/js/contact.js"></script>
    <script src="<?= $host ?>assets/js/js/jquery.form.js"></script>
    <script src="<?= $host ?>assets/js/js/jquery.validate.min.js"></script>
    <script src="<?= $host ?>assets/js/js/mail-script.js"></script>
    <script src="<?= $host ?>assets/js/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="<?= $host ?>assets/js/js/plugins.js"></script>
    <script src="<?= $host ?>assets/js/js/main.js"></script>

    <!-- Tạo thông báo   -->
    <script src="<?= $host ?>assets/toasts/toast.js"></script>
    <script src="<?= $host ?>assets/admin/js/plugins/validate.js"></script>
    <!-- Đánh giá khóa học   -->
    <script> var host = "http://localhost/courses/";</script>
    <script src="<?= $host ?>assets/js/course/comment.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

