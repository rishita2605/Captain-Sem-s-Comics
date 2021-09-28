<?php
require_once 'config.php';
require_once __DIR__.'/modules/functions.php';
require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

// function eMail($toEmail, $subject, $textContent, $containsAttachment, $attachment)
// {
//     $email = new \SendGrid\Mail\Mail();
//     $email->setFrom(FROM_EMAIL, FROM_NAME);
//     $email->setSubject($subject);
//     // to email (Need to fetch from db)
//     $email->addTo(strval($toEmail), "User");

//     // $email->addContent("text/plain", strval($textContent));
//     $email->addContent(
//         "text/html",
//         $textContent
//     );

//     if ($containsAttachment===true) {
//         $email->addAttachment(
//             $attachment['encoded_image'],
//             "application/pdf",
//             $attachment['title'],
//             "attachment"
//         );
//     }

//     $sendgrid = new \SendGrid(SENDGRID_API_KEY);
//     try {
//         $response = $sendgrid->send($email);
//         // print $response->statusCode() . "\n";
//         // print_r( $response->headers() );
//         // print $response->body() . "\n";
//         http_response_code($response->statusCode()); // check if this causes any problem
//     } catch (Exception $e) {
//         // echo 'Caught exception: '. $e->getMessage() ."\n";
//         $jsonarray['error'] = 'Aw Snap! Something went wrong with the mailing services. Please try again after sometime';
//         return($jsonarray);
//         http_response_code(500);
//         exit();
//     }
// }

function sendMail($toEmail, $subject, $header, $textContent, $footer, $location, $btnText)
{
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom(FROM_EMAIL, FROM_NAME);
    $email->setSubject($subject);
    // to email (Need to fetch from db)
    $email->addTo(strval($toEmail), "User");

    // $email->addContent("text/plain", strval($textContent));
    $headerContent = "
    <div class='header' style='background: linear-gradient(45deg, indigo, #8A87C1);
    height: max-content;
    width: 100%;
    display: flex;
    margin-bottom: 2vh;'>
    <img src='https://user-images.githubusercontent.com/64982040/135077771-892176ff-f0c5-4c31-98b9-5a535af541bb.png'
      style='height: 10em; width: 10em;' />
    <div class='header-text' style='font-size: 1.4em;
    font-weight: 500;
    display: block;
    margin: auto 5px;
    color: #E8CAFB;'>".$header."</div> </div>
    ";
    

    $footerContent = "
    <div class='footer' style='background: linear-gradient(45deg, indigo, #8A87C1);
    height: max-content;
    width: 100%;
    display: flex;
    margin-top: 2vh;'>
      <img src='https://user-images.githubusercontent.com/64982040/135077771-892176ff-f0c5-4c31-98b9-5a535af541bb.png'
        style='height: 10em; width: 10em;' />
      <div class='footer-text' style='font-size: 1.4em;
      font-weight: 500;
      display: block;
      margin: auto 5px;
      color: #E8CAFB;'>".$footer."
      </div>
      <a style='display: block; margin: auto 0;'
      href='".$location."' target='_blank'>
      <button style='background: linear-gradient(45deg, #2E1E65, #11082F);
      border: none;
      padding: 0.7em 1em;
      font-size: 1.4em;
      color: white;
      border-radius: 2em;
      margin: auto 5px;'>
        ".$btnText."
      </button>
      </a>
    </div>
    ";
    $emailContent = $headerContent.$textContent.$footerContent;
    $email->addContent(
        "text/html",
        $emailContent
    );


    $sendgrid = new \SendGrid(SENDGRID_API_KEY);
    try {
        $response = $sendgrid->send($email);
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
