<?php
  /***********After the user enters otp, we check if it is the same as the one in db ***********/
  header('Content-type: application/json'); //returns json object
  require_once dirname(__DIR__).'/sendEmail.php';
  require_once './functions.php';
  require_once '../includes/db.php';

  $json = file_get_contents('php://input'); //getting data from json POST -- from the request
  $data = json_decode($json, true);
  $jsonarray = array(); // this is the output json object of our php file

  $email = $data['email'];
  $jsonarray['email']=$email;

  $otp = $data['otp'];
  //$jsonarray['otp'] = $otp; ///for debugging

  //checking if email is valid(server side validation)
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      http_response_code(422);
      $jsonarray['error'] = 'Invalid Email';
      returnJSON($jsonarray);
      exit();
  }

  if ($otp<100000 || $otp>999999) {
      http_response_code(202);
      $jsonarray['error'] = 'Invalid OTP!';
      returnJSON($jsonarray);
      exit();
  }

  if ($con) {
      try {
          $stmt = $con->prepare('SELECT `otp`,`activated` FROM `subscriber` WHERE `email`=?'); //checking if the email is already activated
          $stmt->bind_param('s', $email);
          $stmt->execute();
          $stmt->store_result();
          $stmt->bind_result($dbotp, $activated);
          $stmt->fetch();
          //if number of rows=0, no record of this email exists
          $rows=$stmt->num_rows;

          $dbotp = intval($dbotp);
          $otp = intval($otp);
          
          // $jsonarray['dbotp'] = $dbotp;
          // $jsonarray['otp'] = $otp;
          // $jsonarray['otpmatch'] = $dbotp===$otp;
          

          if ($activated===1) {
              //email already registered
              http_response_code(201);
              $jsonarray['error'] = 'Email already registered. Try again with another email address';
              returnJSON($jsonarray);
              exit();
          } elseif ($rows === 0) {
              http_response_code(404);
              $jsonarray['error'] = 'Email does not exist in our database.';
              returnJSON($jsonarray);
              exit();
          } else {
              //activate user
              if ($otp!==$dbotp) {
                  http_response_code(202);
                  $jsonarray['error'] = 'OTP doesn\'t match';
                  returnJSON($jsonarray);
                  exit();
              }

              $stmt = $con->prepare('UPDATE `subscriber` SET activated = 1 WHERE email = ?');
              $stmt->bind_param('s', $email);
              $stmt->execute();
              $stmt->close();
              http_response_code(200);
              returnJSON($jsonarray);
              exit();
          }
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
