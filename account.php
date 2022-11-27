<?php
    include 'global.php';
    if(isset($_SESSION['user'])){
        location(BASE_URL);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>assets/img/favicon.png">
    <title>DDH COURSES - <?= strtoupper($_GET['a']) ?></title>
    <script src="https://kit.fontawesome.com/42d5adcbca.js"></script>
    <link href="<?= BASE_URL ?>assets/admin/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <style>
        .form-group.invalid .form-control {
            border-color: #f33a58;
        }
    </style>
    <script src='https://www.google.com/recaptcha/api.js?hl=vi'></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>
    <?php
        include 'views/account/layout/navbar.php';
        include 'routes/route_account.php';
        include 'views/account/layout/footer.php';
    ?>
    <script src="<?= BASE_URL ?>assets/admin/js/core/bootstrap.min.js"></script>
    <script src="<?= BASE_URL ?>assets/admin/js/plugins/validate.js"></script>
</body>
</html>