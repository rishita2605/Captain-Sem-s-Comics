<?php
  /***********Add email to database, send otp back to script.js***********/
  header('Content-type: application/json'); //returns json object
  require_once dirname(__DIR__).'/sendEmail.php';
  require_once './functions.php';
  require_once '../includes/db.php';
  ini_set("allow_url_fopen", true); // unnecesary (remove later)
  $parent = trim(strrchr(__DIR__, DIRECTORY_SEPARATOR), DIRECTORY_SEPARATOR);
  // print_r($parent);  
  $ancestor = trim(strrchr(dirname(__DIR__), DIRECTORY_SEPARATOR), DIRECTORY_SEPARATOR);
  // print_r($ancestor);
  $json = file_get_contents('php://input'); //getting data from json POST -- from the request
  //php://input - (read raw data from the request body)
  //file_get_contents() read a file into a string
  $data = json_decode($json, true); // takes a JSON string and converts it into a PHP variable that may be an array or an object.

  //if we don't put json_decode($json, true) then we get the following error while doing $data['email']
  //Cannot use object of type stdClass as array
  //we have to access it as - $data->email
  //the 2nd parameter is called - assoc
  //Specifies a Boolean value. When set to true, the returned object will be converted into an associative array

  $jsonarray = array(); // this is the output json object of our php file
  $email = $data['email'];
  $jsonarray['email']=$email;

  //checking if email is valid(server side validation)
  //shouldn't encounter this as client side validation already done but to be safe
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      http_response_code(400);
      $jsonarray['error'] = 'Invalid Email';
      returnJSON($jsonarray);
      exit();
  }
  
  $OTP = generateOTP();

  if ($con) {
      try {
          $activated=0;
          $stmt = $con->prepare('Select activated from subscriber where email = ?');
          $stmt->bind_param('s', $email);
          $stmt->execute();
          $stmt->store_result(); // storing result of the query
          $stmt->bind_result($activated); // binding it to activated variable
          $stmt->fetch();

          $rows=$stmt->num_rows; // getting the number of rows
          // to check if the email is already present in the db or not
          // if email is present, we'll have to run update query
          // else we'll have to run insert query

          if ($activated===1) {
              $jsonarray['error'] = 'Looks like you are already subscribed. Check your mail for the comics!';
              returnJSON($jsonarray);
              http_response_code(409);
              exit(); 
          }
          $hashedEmail = md5($email);
          if ($rows===0) {
              $stmt = $con->prepare('Insert into subscriber (email, otp, hashedEmail) values (?, ?, ?)');
              $stmt->bind_param('sis', $email, $OTP, $hashedEmail);
              $stmt->execute();
          } else {
              //getting otp again so updating just the OTP
              $stmt = $con->prepare('UPDATE `subscriber` SET `OTP`=? WHERE `email`=?');
              $stmt->bind_param('is', $OTP, $email);
              $stmt->execute();
          }

          //send mail for otp
          $SERVER_NAME = isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '';
          $jsonarray['server'] = $SERVER_NAME;
          $subject = 'OTP for Captain Seb\'s Comics';

          $header="Hey There! We brought your OTP";
          $textContent  = "<div>Your OTP for email validation for Captain Seb's Comics is 
          <h1 style='color:indigo;'> $OTP </h1></div>";
          
          $fromURL = 1; //if fromURL = 1, User has clicked on url from their mail
          $location= "http://" . $SERVER_NAME .'/'.$ancestor.'/subscribe.php?email=' . $email . '&otp=' . md5($OTP) .'&fromURL='.$fromURL;
          $footer = "Or you can click on this button";
          $btnText = "Verify OTP";
        //   sendMail($email, $subject, $textContent, false, ''); // contains attachment -> false

          sendMail($email, $subject, $header, $textContent, $footer, $location, $btnText);
      } catch (Exception $e) {
          ?>
        <script>
            resCode=500;
            window.location.replace("<?php echo dirname(__DIR__);?>./error.php?error="+resCode);
        </script>
        <?php
        exit();
      }
  }
    returnJSON($jsonarray);
