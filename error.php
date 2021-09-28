<?php
  $error=404;
  $errorText="";
  if (isset($_GET['error'])) {
      $error = $_GET['error'];
  }

  switch($error){
    case 400:
      $errorText = "Bad Request. The server could not understand your request!";
      break;
    case 401:
      $errorText = "You must authenticate itself to get the requested resource.";
      break;
    case 403:
      $errorText = "Forbidden.";
      break;
    case 500:
      $errorText = "Internal Server Error. Our server has encountered a situation it doesn't know how to handle.";
      break;
    case 503:
      $errorText = "Service Unavailable";
      break;
    default:
      $errorText = "The server can not find the requested resource.";
      break;
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    require_once __DIR__ . '\includes\header.php';
  ?>

  <link href="./includes/css/error.css" rel="stylesheet" />
  <title>Error</title>
</head>

<body>
  <div class="left">
    <div class="ghost">
      <svg width="851" height="922" viewBox="0 0 851 922" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="red-ghost">
          <g id="red-fire">
            <g id="SPOOKY SKULL">
              <g id="Vector" filter="url(#filter0_f)">
                <path d="M65 224.678H732L612.582 618.776L242.104 682.678L65 224.678Z" fill="url(#paint0_linear)" />
              </g>
              <g id="Ellipse 7" filter="url(#filter1_f)">
                <ellipse cx="399.096" cy="578.72" rx="223.901" ry="223.958" fill="url(#paint1_linear)" />
              </g>
              <g id="Ellipse 8" opacity="0.4" filter="url(#filter2_f)">
                <ellipse cx="399.095" cy="578.72" rx="205.242" ry="205.217" fill="url(#paint2_linear)" />
              </g>
              <g id="0-flame" opacity="0.3" filter="url(#filter3_f)">
                <path
                  d="M382.485 113C397.503 305.332 318.546 436.755 301.481 252.154C187.027 313.297 221.574 495.726 134.693 424.625C150.541 572.692 257.359 624.795 198.166 613.687C300.14 711.546 458.081 717.365 523.732 639.606C510.991 639.606 509.741 638.813 509.741 624.795C611.594 605.158 660.918 535.843 659.841 488.568C654.278 501.801 648.192 524.357 620.844 527.994C586.66 532.539 652.574 375.532 608.968 343.106C523.732 433.241 523.732 200.85 382.485 113Z"
                  fill="url(#paint3_linear)" />
              </g>
              <g id="1-flame" filter="url(#filter4_f)">
                <path
                  d="M455.903 236.224C529.037 260.353 530.63 456.372 572.232 353.368C600.491 437.964 545.876 569.307 619.356 502.435C605.952 641.695 515.61 690.7 565.674 680.252C479.428 772.292 345.85 777.764 290.325 704.63C301.1 704.63 302.158 703.884 302.158 690.7C216.015 672.231 174.299 607.038 175.21 562.574C179.915 575.02 185.062 596.235 208.192 599.655C237.103 603.931 181.356 456.261 218.236 425.764C254.159 566.571 233.223 380.999 319.014 331.497C337.219 456.36 473.057 347.417 455.903 236.224Z"
                  fill="url(#paint4_linear)" />
              </g>
              <g id="2-flame" filter="url(#filter5_f)">
                <path
                  d="M515.515 254.78C529.836 371.262 418.303 328.044 435.503 151.185C366.742 203.661 329.658 292.395 295.11 326.884C274.214 347.744 208.476 330.633 238.679 254.78C167.111 330.268 206.449 434.5 144.022 375.612C111.711 829.619 781.179 861.049 601.134 337.791C570.615 461.786 588.401 298.371 515.515 254.78Z"
                  fill="url(#paint5_radial)" />
              </g>
              <g id="3-flame" opacity="0.1" filter="url(#filter6_f)">
                <path
                  d="M404.614 224.51C338.132 243.233 329.219 424.453 291.4 344.528C214.822 411.044 240.567 505.959 173.77 454.07C37.4013 841.041 805.848 861.767 613.201 400.702C580.545 509.96 599.577 365.968 521.589 327.558C536.912 430.195 386.21 380.348 404.614 224.51Z"
                  fill="url(#paint6_linear)" />
              </g>
              <g id="4-flame" filter="url(#filter7_f)">
                <path
                  d="M400.097 248.745C346.296 265.463 339.083 427.281 308.478 355.913C246.506 415.308 267.341 500.061 213.285 453.727C102.928 799.269 724.798 817.776 568.897 406.073C542.47 503.634 557.872 375.058 494.759 340.76C507.159 432.409 385.203 387.898 400.097 248.745Z"
                  fill="url(#paint7_linear)" />
              </g>
              <g id="Ellipse 10" filter="url(#filter8_f)">
                <ellipse cx="384.533" cy="416.14" rx="74.1785" ry="42.6364" fill="url(#paint8_linear)" />
              </g>
            </g>
          </g>
          <g id="ghost">
            <g id="Main Skull">
              <mask id="mask0" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="222" y="390" width="351"
                height="330">
                <path id="Union"
                  d="M460.495 398.322C420.896 387.728 378.644 387.577 339.044 398.172L331.678 400.142C264.718 418.058 219.256 480.169 222.422 549.412L223.118 564.635C225.375 614.001 256.669 657.339 302.82 675.011C308.047 677.013 312.471 680.68 315.407 685.446L325.953 702.564C330.185 709.432 336.753 714.541 344.451 716.952L345.052 717.14C346.513 717.598 348.044 717.797 349.574 717.728C356.867 717.402 362.986 712.12 364.373 704.953L364.596 703.802C365.769 697.741 374.364 697.523 375.843 703.518L376.206 704.988C378.017 712.329 384.161 717.797 391.662 718.745L397.325 719.46C399.169 719.693 401.036 719.693 402.88 719.46L407.939 718.821C415.805 717.828 422.246 712.094 424.145 704.397L424.406 703.34C425.956 697.056 434.92 697.148 436.341 703.462L436.707 705.089C438.313 712.223 444.495 717.399 451.799 717.726C453.37 717.796 454.941 717.591 456.441 717.122L456.896 716.979C464.63 714.557 471.178 709.327 475.25 702.319L485.135 685.309C487.855 680.628 492.02 676.956 497.005 674.843C538.95 657.071 567.493 617.404 571.019 571.987L572.334 555.043C577.923 483.041 530.26 416.988 460.495 398.322Z"
                  fill="#FFF0D3" />
              </mask>
              <g mask="url(#mask0)">
                <g id="Union_2" filter="url(#filter9_di)">
                  <path
                    d="M460.495 398.322C420.896 387.728 378.644 387.577 339.044 398.172L331.678 400.142C264.718 418.058 219.256 480.169 222.422 549.412L223.118 564.635C225.375 614.001 256.669 657.339 302.82 675.011C308.047 677.013 312.471 680.68 315.407 685.446L325.953 702.564C330.185 709.432 336.753 714.541 344.451 716.952L345.052 717.14C346.513 717.598 348.044 717.797 349.574 717.728C356.867 717.402 362.986 712.12 364.373 704.953L364.596 703.802C365.769 697.741 374.364 697.523 375.843 703.518L376.206 704.988C378.017 712.329 384.161 717.797 391.662 718.745L397.325 719.46C399.169 719.693 401.036 719.693 402.88 719.46L407.939 718.821C415.805 717.828 422.246 712.094 424.145 704.397L424.406 703.34C425.956 697.056 434.92 697.148 436.341 703.462L436.707 705.089C438.313 712.223 444.495 717.399 451.799 717.726C453.37 717.796 454.941 717.591 456.441 717.122L456.896 716.979C464.63 714.557 471.178 709.327 475.25 702.319L485.135 685.309C487.855 680.628 492.02 676.956 497.005 674.843C538.95 657.071 567.493 617.404 571.019 571.987L572.334 555.043C577.923 483.041 530.26 416.988 460.495 398.322Z"
                    fill="url(#paint9_radial)" />
                </g>
                <g id="Ellipse 8_2" filter="url(#filter10_f)">
                  <ellipse cx="344.878" cy="403.552" rx="61.8913" ry="24.8322" fill="white" />
                </g>
                <g id="Ellipse 9" filter="url(#filter11_f)">
                  <ellipse cx="344.878" cy="403.553" rx="39.5922" ry="15.9301" fill="white" />
                </g>
                <g id="Rectangle 4" opacity="0.4" filter="url(#filter12_f)">
                  <path
                    d="M283.312 629.081C281.591 605.329 298.55 584.298 322.127 580.945L376.581 573.202C387.701 571.621 398.988 571.621 410.107 573.202L464.341 580.914C488.017 584.281 505.014 605.446 503.191 629.29C500.257 667.674 468.255 697.322 429.759 697.322H356.675C318.113 697.322 286.098 667.542 283.312 629.081Z"
                    fill="url(#paint10_linear)" />
                </g>
                <g id="Ellipse 10_2" filter="url(#filter13_f)">
                  <ellipse rx="42.7763" ry="9.81494"
                    transform="matrix(0.762633 -0.646832 0.653868 0.756609 480.851 695.068)" fill="white" />
                </g>
                <g id="Ellipse 13" filter="url(#filter14_f)">
                  <ellipse rx="14.5938" ry="5.19992"
                    transform="matrix(0.762633 -0.646832 0.653868 0.756609 472.448 707.92)" fill="white" />
                </g>
                <g id="Ellipse 11" filter="url(#filter15_f)">
                  <ellipse rx="21.4795" ry="11.0653"
                    transform="matrix(0.750175 -0.661239 0.639384 0.768888 420.591 716.901)" fill="white" />
                </g>
                <g id="Ellipse 12" filter="url(#filter16_f)">
                  <ellipse rx="30.8716" ry="11.0653"
                    transform="matrix(0.750175 -0.661239 0.639384 0.768888 361.46 719.684)" fill="white" />
                </g>
              </g>
            </g>
            <g id="Group 7">
              <g id="Ellipse 1" filter="url(#filter17_dd)">
                <ellipse cx="307.021" cy="529.128" rx="47.1011" ry="48.493" fill="url(#paint11_linear)" />
              </g>
              <g id="Ellipse 2" filter="url(#filter18_dd)">
                <ellipse cx="483.998" cy="529.128" rx="47.1011" ry="48.493" fill="url(#paint12_linear)" />
              </g>
            </g>
          </g>
          <g id="Group 41">
            <g id="Group 8">
              <text id="Captain Sem" fill="white" xml:space="preserve" style="white-space: pre" font-family="Poppins"
                font-size="20" font-weight="bold" letter-spacing="0em">
                <tspan x="212.126" y="732.719">Captain Sem</tspan>
              </text>
              <text id="Veteran Spooky Ghost" fill="white" xml:space="preserve" style="white-space: pre"
                font-family="Poppins" font-size="16" letter-spacing="0em">
                <tspan x="219.934" y="754.515">Veteran Spooky </tspan>
                <tspan x="298.512" y="778.515">Ghost</tspan>
              </text>
            </g>
            <g id="Group 9">
              <path id="Vector 8" d="M364.783 676.156L364.783 751.908" stroke="#FF5B79" />
              <ellipse id="Ellipse 18" cx="364.783" cy="676.156" rx="3.06572" ry="3.15632" fill="#FF5B79" />
            </g>
          </g>
        </g>
        <defs>
          <filter id="filter0_f" x="-53.754" y="105.924" width="904.508" height="695.508" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="59.377" result="effect1_foregroundBlur" />
          </filter>
          <filter id="filter1_f" x="56.4413" y="236.008" width="685.309" height="685.424" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="59.377" result="effect1_foregroundBlur" />
          </filter>
          <filter id="filter2_f" x="75.099" y="254.75" width="647.993" height="647.942" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="59.377" result="effect1_foregroundBlur" />
          </filter>
          <filter id="filter3_f" x="21.8766" y="0.183723" width="750.798" height="805.674" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="56.4081" result="effect1_foregroundBlur" />
          </filter>
          <filter id="filter4_f" x="127.694" y="188.722" width="539.164" height="613.667" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="23.7508" result="effect1_foregroundBlur" />
          </filter>
          <filter id="filter5_f" x="116.475" y="124.773" width="541.872" height="624.819" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="13.206" result="effect1_foregroundBlur" />
          </filter>
          <filter id="filter6_f" x="38.6923" y="105.756" width="724.446" height="758.515" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="59.377" result="effect1_foregroundBlur" />
          </filter>
          <filter id="filter7_f" x="179.293" y="227.963" width="435.622" height="506.792" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="10.391" result="effect1_foregroundBlur" />
          </filter>
          <filter id="filter8_f" x="231.338" y="294.486" width="306.391" height="243.307" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="39.5085" result="effect1_foregroundBlur" />
          </filter>
          <filter id="filter9_di" x="202.672" y="375.25" width="380.794" height="352.698" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
              result="hardAlpha" />
            <feOffset dx="7.71901" dy="5.34393" />
            <feGaussianBlur stdDeviation="1.48442" />
            <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 0 0 0 0 0 0.12 0 0 0 1 0" />
            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape" />
            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
              result="hardAlpha" />
            <feOffset dx="-19.5944" dy="-15.0507" />
            <feGaussianBlur stdDeviation="15.0507" />
            <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1" />
            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 1 0 0 0 0 0.94 0 0 0 0.31 0" />
            <feBlend mode="normal" in2="shape" result="effect2_innerShadow" />
          </filter>
          <filter id="filter10_f" x="223.61" y="319.343" width="242.536" height="168.418" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="29.6885" result="effect1_foregroundBlur" />
          </filter>
          <filter id="filter11_f" x="245.909" y="328.246" width="197.938" height="150.614" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="29.6885" result="effect1_foregroundBlur" />
          </filter>
          <filter id="filter12_f" x="194.126" y="482.951" width="398.265" height="303.437" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="44.5327" result="effect1_foregroundBlur" />
          </filter>
          <filter id="filter13_f" x="406.033" y="624.848" width="149.636" height="140.439" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="20.7819" result="effect1_foregroundBlur" />
          </filter>
          <filter id="filter14_f" x="437.057" y="673.94" width="70.7827" height="67.9605" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="11.8754" result="effect1_foregroundBlur" />
          </filter>
          <filter id="filter15_f" x="361.424" y="658.779" width="118.333" height="116.246" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="20.7819" result="effect1_foregroundBlur" />
          </filter>
          <filter id="filter16_f" x="295.674" y="655.999" width="131.572" height="127.37" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="20.7819" result="effect1_foregroundBlur" />
          </filter>
          <filter id="filter17_dd" x="227.525" y="461.579" width="172.331" height="178.926" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
              result="hardAlpha" />
            <feOffset dx="6.66956" dy="23.8198" />
            <feGaussianBlur stdDeviation="19.5323" />
            <feColorMatrix type="matrix" values="0 0 0 0 0.909804 0 0 0 0 0.164706 0 0 0 0 0.254902 0 0 0 0.77 0" />
            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
              result="hardAlpha" />
            <feOffset dx="-4.76397" dy="-4.76397" />
            <feGaussianBlur stdDeviation="7.14595" />
            <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.59 0" />
            <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow" />
            <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape" />
          </filter>
          <filter id="filter18_dd" x="391.162" y="461.579" width="172.331" height="178.926" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
              result="hardAlpha" />
            <feOffset dx="-6.66956" dy="23.8198" />
            <feGaussianBlur stdDeviation="19.5323" />
            <feColorMatrix type="matrix" values="0 0 0 0 0.908677 0 0 0 0 0.163858 0 0 0 0 0.253237 0 0 0 0.94 0" />
            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
              result="hardAlpha" />
            <feOffset dx="4.76397" dy="-4.76397" />
            <feGaussianBlur stdDeviation="7.14595" />
            <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.59 0" />
            <feBlend mode="normal" in2="effect1_dropShadow" result="effect2_dropShadow" />
            <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow" result="shape" />
          </filter>
          <linearGradient id="paint0_linear" x1="536.775" y1="258.563" x2="468.89" y2="606.881"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#FF8DAF" stop-opacity="0" />
            <stop offset="0.50718" stop-color="#FF4672" stop-opacity="0.12" />
            <stop offset="1" stop-color="#FF00F5" stop-opacity="0" />
          </linearGradient>
          <linearGradient id="paint1_linear" x1="399.096" y1="354.762" x2="399.096" y2="802.678"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#AA6579" />
            <stop offset="1" stop-color="#F481C2" stop-opacity="0.2" />
          </linearGradient>
          <linearGradient id="paint2_linear" x1="399.095" y1="373.504" x2="399.095" y2="566.254"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#FFCEE9" />
            <stop offset="1" stop-color="white" stop-opacity="0" />
          </linearGradient>
          <linearGradient id="paint3_linear" x1="396.195" y1="164.915" x2="396.195" y2="707.714"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#FF2B84" stop-opacity="0.95" />
            <stop offset="1" stop-color="#F64EC7" stop-opacity="0" />
          </linearGradient>
          <linearGradient id="paint4_linear" x1="560.423" y1="305.566" x2="389.638" y2="765.513"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#CD4C64" stop-opacity="0.15" />
            <stop offset="1" stop-color="#FF3AA5" stop-opacity="0.06" />
          </linearGradient>
          <radialGradient id="paint5_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse"
            gradientTransform="translate(316.043 375.846) rotate(-0.826129) scale(162.481 270.943)">
            <stop stop-color="#B85469" stop-opacity="0.77" />
            <stop offset="1" stop-color="#B21D5C" stop-opacity="0.25" />
          </radialGradient>
          <linearGradient id="paint6_linear" x1="612.12" y1="357.786" x2="362.822" y2="666.628"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#301758" />
            <stop offset="1" stop-color="#301658" />
          </linearGradient>
          <linearGradient id="paint7_linear" x1="568.022" y1="367.752" x2="341.806" y2="621.734"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#CD4C64" />
            <stop offset="1" stop-color="#FF50E3" stop-opacity="0.13" />
          </linearGradient>
          <linearGradient id="paint8_linear" x1="320.185" y1="391.56" x2="353.724" y2="464.582"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="white" stop-opacity="0.71" />
            <stop offset="1" stop-color="#FFFFF8" stop-opacity="0.7" />
          </linearGradient>
          <radialGradient id="paint9_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse"
            gradientTransform="translate(399.488 429.79) rotate(91.086) scale(300.148 235.61)">
            <stop stop-color="#FFE5EA" />
            <stop offset="0.420971" stop-color="#FEA3B3" />
            <stop offset="0.74856" stop-color="#FF5B79" />
            <stop offset="0.883981" stop-color="#DE2C4D" />
            <stop offset="1" stop-color="#F08B98" />
          </radialGradient>
          <linearGradient id="paint10_linear" x1="393.344" y1="570.818" x2="393.344" y2="697.322"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#9E4722" />
            <stop offset="1" stop-color="#BB391C" stop-opacity="0.87" />
          </linearGradient>
          <linearGradient id="paint11_linear" x1="307.021" y1="487.591" x2="307.06" y2="586.217"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#2E1E65" />
            <stop offset="1" stop-color="#11082F" />
          </linearGradient>
          <linearGradient id="paint12_linear" x1="483.998" y1="487.591" x2="484.037" y2="586.217"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#2E1E65" />
            <stop offset="1" stop-color="#11082F" />
          </linearGradient>
        </defs>
      </svg>
    </div>
  </div>
  <div class="right">
    <div class="error-sub-heading">Uh Oh! Looks like we've run into an error</div>
    <div class="error-code"><?php echo $error; ?></div>
    <div class="error-desc">
      The server can not find the requested resource
    </div>
  </div>
  <?php
  require_once __DIR__ . '\includes\footer.php';
  ?>

</body>

</html>