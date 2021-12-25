<?php 
    session_start();
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Development Services, INTUITIVE">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>GET SMART</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="icon" href="images/iconhead.png">
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Home.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.29.1, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "GET SMART"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  </head>
  <body data-home-page="Home.html" data-home-page-title="Home" class="u-body">
    <header class="u-clearfix u-header u-header" id="sec-7923">
      <div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg>
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger">

              </use>
            </svg>
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" 
              xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                  <symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;">
                    <rect y="1" width="16" height="2"></rect>
                    <rect y="7" width="16" height="2"></rect>
                    <rect y="13" width="16" height="2"></rect>
                  </symbol>
                </defs>
            </svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1">
            
            <?php
                if (isset($_SESSION['user']) &&  $_SESSION['user']['role_id']== 1){
              ?>
            <li class="u-nav-item">  
              <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="dash.php" style="padding: 10px 20px;">Dashboard</a>
            </li>
            <?php
                }
            ?>
              <li class="u-nav-item">
                <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="index.php" style="padding: 10px 20px;">Home</a>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="About.html" style="padding: 10px 20px;">About</a>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Contact.html" style="padding: 10px 20px;">Contact</a>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="profile.php" style="padding: 10px 20px;">
                <img src="img/image-03.jpg" class="w3-circle" style="height:80px;width:80px" alt="Avatar">&nbsp; <?php echo $_SESSION['user']['username']?>
              </a>
              </li>
            </ul>

            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        <span  style=" position: relative; top: -30px; left:-50px"class="u-icon u-icon-circle u-icon-1">
          <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 59 59" style="">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-7dcb">
          </use>
        </svg>
        <svg class="u-svg-content" viewBox="0 0 59 59" x="0px" y="0px" id="svg-7dcb" style="enable-background:new 0 0 59 59;">
          <line style="fill:none;stroke:#424A60;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;" x1="48.515" y1="13.615" x2="52.05" y2="10.08"></line>
          <rect x="50.464" y="5.665" transform="matrix(0.7071 -0.7071 0.7071 0.7071 9.5322 40.3433)" style="fill:#AFB6BB;" width="6.001" height="6"></rect>
          <path style="fill:#3083C9;" d="M30.13,6c-2.008,0-3.96,0.235-5.837,0.666V13h-8c-0.553,0-1,0.447-1,1s0.447,1,1,1h8v5h-13
	c-0.553,0-1,0.447-1,1s0.447,1,1,1h13v5h-18c-0.553,0-1,0.447-1,1s0.447,1,1,1h18v5h-22c-0.553,0-1,0.447-1,1s0.447,1,1,1h22v5h-16
	c-0.553,0-1,0.447-1,1s0.447,1,1,1h16v5h-10c-0.553,0-1,0.447-1,1s0.447,1,1,1h10v7.334C26.17,57.765,28.122,58,30.13,58
	c14.359,0,26-11.641,26-26S44.489,6,30.13,6z">
</path>
<path style="fill:#2B77AA;" d="M44,23.172c-0.348-0.346-0.896-0.39-1.293-0.104L29.76,32.433c-0.844,0.614-1.375,1.563-1.456,2.604
	s0.296,2.06,1.033,2.797c0.673,0.673,1.567,1.044,2.518,1.044c1.138,0,2.216-0.549,2.886-1.47l9.363-12.944
	C44.391,24.067,44.348,23.519,44,23.172z">
</path>
<path style="fill:#EFCE4A;" d="M43,21.293c-0.348-0.346-0.896-0.39-1.293-0.104L28.76,30.554c-0.844,0.614-1.375,1.563-1.456,2.604
	s0.296,2.06,1.033,2.797C29.01,36.629,29.904,37,30.854,37c1.138,0,2.216-0.549,2.886-1.47l9.363-12.944
	C43.391,22.188,43.348,21.64,43,21.293z">
</path>
<path style="fill:#424A60;" d="M28.293,6.084C28.954,6.034,29.619,6,30.293,6s1.339,0.034,2,0.084V3h2.5c0.828,0,1.5-0.672,1.5-1.5
	v0c0-0.828-0.672-1.5-1.5-1.5h-9c-0.828,0-1.5,0.672-1.5,1.5v0c0,0.828,0.672,1.5,1.5,1.5h2.5V6.084z">
</path>
<g>
  <path style="fill:#A1C8EC;" d="M30.293,5c-0.553,0-1,0.447-1,1v3c0,0.553,0.447,1,1,1s1-0.447,1-1V6
		C31.293,5.447,30.846,5,30.293,5z">
  </path>
  <path style="fill:#A1C8EC;" d="M30.293,54c-0.553,0-1,0.447-1,1v3c0,0.553,0.447,1,1,1s1-0.447,1-1v-3
		C31.293,54.447,30.846,54,30.293,54z">
  </path>
  <path style="fill:#A1C8EC;" d="M56.13,31h-3c-0.553,0-1,0.447-1,1s0.447,1,1,1h3c0.553,0,1-0.447,1-1S56.683,31,56.13,31z">

  </path>
  <path style="fill:#A1C8EC;" d="M43.63,8.617c-0.479-0.277-1.09-0.112-1.366,0.366l-1.5,2.599c-0.276,0.479-0.112,1.09,0.366,1.366
		c0.157,0.091,0.329,0.134,0.499,0.134c0.346,0,0.682-0.18,0.867-0.5l1.5-2.599C44.272,9.505,44.108,8.893,43.63,8.617z"></path><path style="fill:#A1C8EC;" d="M53.146,44.134l-2.598-1.5c-0.478-0.277-1.09-0.114-1.366,0.366
		c-0.276,0.479-0.112,1.09,0.366,1.366l2.598,1.5C52.304,45.957,52.475,46,52.645,46c0.346,0,0.682-0.179,0.867-0.5
		C53.789,45.021,53.625,44.41,53.146,44.134z">
  </path>
  <path style="fill:#A1C8EC;" d="M42.496,51.419c-0.277-0.48-0.89-0.644-1.366-0.366c-0.479,0.276-0.643,0.888-0.366,1.366l1.5,2.598
		c0.186,0.321,0.521,0.5,0.867,0.5c0.17,0,0.342-0.043,0.499-0.134c0.479-0.276,0.643-0.888,0.366-1.366L42.496,51.419z">
  </path>
  <path style="fill:#A1C8EC;" d="M50.05,21.5c0.17,0,0.342-0.043,0.499-0.134l2.598-1.5c0.479-0.276,0.643-0.888,0.366-1.366
		c-0.276-0.479-0.89-0.644-1.366-0.366l-2.598,1.5C49.07,19.91,48.906,20.521,49.183,21C49.368,21.321,49.704,21.5,50.05,21.5z">
  </path>
</g>
</svg>
</span>
        <form  style=" position: relative; top: -28px; left:-40px " action="#" method="get" class="u-border-1 u-border-grey-30 u-search u-search-left u-white u-search-1">
          <button class="u-search-button" type="submit">
            <span class="u-search-icon u-spacing-10">
              <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 56.966 56.966"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-8da0"></use></svg>
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="svg-8da0" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" class="u-svg-content"><path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"></path></svg>
            </span>
          </button>
          <input  class="u-search-input" type="search" name="search" value="" placeholder="Search">
        </form>
        <span  class="u-icon u-icon-circle u-text-palette-1-base u-icon-2">
          <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 55 55" style="">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-a260"> 
            </use>
          </svg>
      </span>
      <a  style=" position: relative;top: -33px ;left: -40px" href="signup.php" class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-radius-0 u-btn-1">
        log out      
      </a>
    </div>
</header>    