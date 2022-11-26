<?php
    if(isset($_POST['submit'])){
        $name;
        $captcha;
        if(isset($_POST['name'])){
            $name = $_POST['name'];
        }
        if(isset($_POST['g-recaptcha-response'])){
            $captcha = $_POST['g-recaptcha-response'];
        }
        if(!$captcha){
            echo '<h2>Hay xac nhan CAPTCHA</h2>';
        }else{
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lcj8zYjAAAAAGHQeGZaLMxrtZD_sGX6zj0e3cUK&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
            $data = json_decode($response);
            if($data->success == false){
                echo '<h2>SPAM!</h2>';
            }else{
                echo '<h2>'.$name.' Khong phai robot :)</h2>';
            }
        }
    }
?>
<html>
<head>
    <title>Google recapcha demo - LeVanToan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<h1>Google reCAPTHA Demo</h1>
<form id="comment_form" action="" method="post">
    <input type="text" placeholder="Tên của bạn" size="40" name="name"><br><br>
    <input type="submit" name="submit" value="Gửi"><br><br>
    <div class="g-recaptcha" data-sitekey="6Lcj8zYjAAAAAGHVzb_jOrfsspG4G1xxJa5wWDCO"></div>
</form>
</body>
</html>