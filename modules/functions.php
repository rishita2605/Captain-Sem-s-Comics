<?php
header('Content-type: application/json'); //returns json object
function returnJSON($text){
  echo json_encode($text); // php files echo instead of return 
  // so here we are converting the data into json object, and echoing it (basically returning it) 
}

function generateOTP(){
  return random_int(100000, 999999);
}

function getComic(){
  $url = 'https://c.xkcd.com/random/comic/'; //directly using https://c.xkcd.com/random/comic/info.0.json -- shows error
  // so we need to put the number in place of random and then send a request
  $random = random_int(1, 1000);
  try{

    // get_headers — Fetches all the headers sent by the server in response to an HTTP request
    $headers=get_headers($url, 1); // 2nd param - 1, so returns an associative array, and we can directly access using $headers['Location]
    //but $headers['Location] --> returns an array with 2 elements, both of them are same afais
    // print_r($headers['Location'][0]);
    $url = $headers['Location'][0].'info.0.json';
    //print_r($url);
    $result = json_decode(file_get_contents($url), true); 
    // file_get_contents() function in PHP is an inbuilt function which is used to read a file into a string.
    $category = 'location';
    array_push($result, array($category => $url));
    print_r($result);
  }catch(Exception $e){
    ?>
    <script>
        var resCode=500;
        window.location.replace("./error.php?error="+resCode);
    </script>
    <?php
    exit();
  }

  return $result;
  
}
