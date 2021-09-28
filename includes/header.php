<?php 
include 'includes/db.php';
?>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<script>
  let a
  if (navigator.userAgent.match(/Android/i) ||
    navigator.userAgent.match(/webOS/i) ||
    navigator.userAgent.match(/iPhone/i) ||
    navigator.userAgent.match(/iPad/i) ||
    navigator.userAgent.match(/iPod/i) ||
    navigator.userAgent.match(/BlackBerry/i) ||
    navigator.userAgent.match(/Windows Phone/i)) {
    a = true;
  } else {
    a = false;
  }
  if (a == true) {
    window.alert("Not optimised for mobile devices yet, but hey good things take time and patience is the key")
    // window.location.assign("mobileEntry.html")
    // window.close()
  }
</script>
<link
  href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  rel="stylesheet">
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<link rel="icon"
  href="https://user-images.githubusercontent.com/64982040/135123453-3eb89a79-2772-4d3c-812a-8e982efdc540.png"
  type="image/icon type">
<!-- <link href="./includes/css/yellow.css" rel="stylesheet" /> -->
<title>Comic Mailer</title>