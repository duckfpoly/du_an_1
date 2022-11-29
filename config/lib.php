<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require_once 'vendor/autoload.php';
    $client         = new Google\Client();
    $google_oauth   = new Google\Service\Oauth2($client);
    $client->setClientId("860322000129-aa3jsl9jc2upei7jjitjeknhol9p552f.apps.googleusercontent.com");
    $client->setClientSecret("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");
    $client->addScope("email");
    $client->addScope("profile");
?>