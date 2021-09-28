<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/modules/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/sendEmail.php';

$SERVER_NAME = isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '';
$parent = trim(strrchr(__DIR__, DIRECTORY_SEPARATOR), DIRECTORY_SEPARATOR);
//print_r($parent);
$ancestor = trim(strrchr(dirname(__DIR__), DIRECTORY_SEPARATOR), DIRECTORY_SEPARATOR);
// print_r($ancestor);

if ($con) {
    try {
        $stmt = $con->prepare('SELECT email FROM `subscriber` where activated=1'); // select all those email which are activated
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($mailArray);
        // print_r("Shalaallallalala");
        // print_r($mailArray); // cannot directly print it, it is an array and can only print it wile iterating
        // print_r($stmt->num_rows);

        if ($stmt->num_rows > 0) {
            $comicObject = getComic();
            $title = $comicObject['safe_title'];
            
            
            //print_r($comicObject);
            while ($stmt->fetch()) {
                $subject = "Here is a comic for you.";
                // $textContent = "<h1>".$title."</h1>";
                // $textContent .= "<img src='" . $comicObject['img'] . "' alt='some comic hehe'/>";
                // $textContent .= "To unsubscribe kindly visit <a href='http://" . $SERVER_NAME .'/'.$parent. '/unsubscribe.php?token=' . md5($mailArray) . ">here.</a>";
                $header = "Hello Subscriber! We brought you a comic.";
                $location = "http://" . $SERVER_NAME."/unsubscribe.php?token=" . md5($mailArray);
                $btnText = "Unsubscribe";
                $footer = "To stop getting these mails, click on the button.";
                $textContent = "<h1 
                style='display: block;
                margin:0 auto;
                color:indigo;'>".$title."</h1>
                <img src='" . $comicObject['img'] . "' alt='Comic Image'
                style='display: block;
                margin:0 auto;'/>";
                
                // sendMail($mailArray, $subject, $textContent, false, $attachment); //comic attachment does not open
                sendMail($mailArray, $subject, $header, $textContent, $footer, $location, $btnText);
                // print_r($mailArray);
                // $toEmail, $subject, $header, $textContent, $footer, $location, $btnText
            }
            // print_r("comic sent");
        }
    } catch (Exception $e) {
      ?>
        <script>
            resCode=404;
            window.location.replace("./error.php?error="+resCode);
        </script>
        <?php
        exit();
    }
}
