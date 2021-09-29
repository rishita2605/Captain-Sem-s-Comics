<?php
// require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
//dirname() returns the parent directory, so using ‘dirname(__DIR__)’ will return the parent directory of ‘__DIR__’.
//connecting to database
//when we use remote server, include those creds here
// $server = "localhost";
// $username = "root";
// $password = "";
// $database = "test";

//create a connection object
$con = mysqli_connect(getenv('DB_SERVER'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'), getenv('DB_NAME'));

//Die if connection not succesful
if (!$con) {
    // die("Database Failed to connect".mysqli_connect_error());?>
      <script>
          resCode=500;
          window.location.replace("./error.php?error="+resCode);
      </script>
      <?php
      exit();
}
// echo "Database Connected";
?>