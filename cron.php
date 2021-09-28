<?php
require_once 'config.php';
require_once __DIR__.'/modules/functions.php';
require 'vendor/autoload.php';
function sendMail($toEmail, $subject, $textContent, $htmlContent){

    $email = new \SendGrid\Mail\Mail(); 
    $email->setFrom(FROM_EMAIL, FROM_NAME);
    $email->setSubject("Cron Job Task Scheduler - 1 day");
    // to email (Need to fetch from db)
    $email->addTo(strval("rishitaraha26@gmail.com"), "User");

    // $email->addContent("text/plain", strval($textContent));
    $email->addContent(
        "text/html", "CRON JOB RUNNINGGGG IM SO HAPPPPYYY"
    );
    $sendgrid = new \SendGrid( SENDGRID_API_KEY );
    try {
        $response = $sendgrid->send( $email );
        // print $response->statusCode() . "\n";
        // print_r( $response->headers() );
        // print $response->body() . "\n";
        http_response_code($response->statusCode()); // check if this causes any problem
    } catch (Exception $e) {
        // echo 'Caught exception: '. $e->getMessage() ."\n";
        $jsonarray['error'] = 'Aw Snap! Something went wrong with the mailing services. Please try again after sometime';
        return($jsonarray);
        http_response_code(500);
        exit();
    }
}

// sendMail('', '', '', '');