<?php
// require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/functions.php';
require 'vendor/autoload.php'; // If you're using Composer (recommended)

function sendMail($toEmail, $subject, $header, $textContent, $footer, $location, $btnText, $attachment)
{
  $email = new \SendGrid\Mail\Mail();
  $email->setFrom(getenv('FROM_EMAIL'), getenv('FROM_NAME'));
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
    color: #E8CAFB;'>" . $header . "</div> </div>
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
      color: #E8CAFB;'>" . $footer . "
      </div>
      <a style='display: block; margin: auto 0;'
      href='" . $location . "' target='_blank'>
      <button style='background: linear-gradient(45deg, #2E1E65, #11082F);
      border: none;
      padding: 0.7em 1em;
      font-size: 1.4em;
      color: white;
      border-radius: 2em;
      margin: auto 5px;'>
        " . $btnText . "
      </button>
      </a>
    </div>
    ";
  $emailContent = $headerContent . $textContent . $footerContent;
  $email->addContent(
    "text/html",
    $emailContent
  );

  //for sending attachment
  if (isset($attachment)) {
    // print_r(isset($attachment));
    // print_r($attachment);
    $file_encoded = base64_encode(file_get_contents($attachment));
    $email->addAttachment(
      $file_encoded,
      "image/png",
      "comic image",
      "attachment"
    );
  }

  $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
  try {
    $response = $sendgrid->send($email);
    http_response_code($response->statusCode()); // check if this causes any problem
  } catch (Exception $e) {
?>
    <script>
      resCode = 500;
      window.location.replace("./error.php?error=" + resCode);
    </script>
<?php
    exit();
  }
}
