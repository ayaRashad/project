<?php 
    session_start();
    require 'dbConnection.php';
    //require 'indexService.php' ;
    $service = $_SESSION['service_id'] ;
    //echo $service ;
    $client = $_SESSION['client_id']  ; 
    $getServive = "select * from service where id = $service";
    $op  = mysqli_query($connect,$getServive);
    $data = mysqli_fetch_assoc($op);
   // echo $data['title'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Character Responsive HTML5 Template</title>
<!--
Template 2110 Character
http://www.tooplate.com/view/2110-character
-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/tooplate-style.css">
    
</head>

<body class="tm-bg-dark">
    <main class="tm-container masonry">
        <div class="item tm-bg-white tm-block tm-block-left" data-desktop-seq-no="1" data-mobile-seq-no="1">
            <p class="tm-hero-text"> <?php echo $data['content'];?> </p>
            <header class="tm-block-brand">
                <div class="tm-bg-primary-dark tm-text-white tm-block-brand-inner">
                    <i class="fas fa-braille fa-3x"></i>
                    <h1 class="tm-brand-name"><?php echo $data['title'];?> </h1>
                </div>
            </header>
        </div>
        <div class="item" data-desktop-seq-no="2" data-mobile-seq-no="4">
            <!-- image-->
            <img src="./uploads/<?php echo $data['image']; ?>" alt="Image" class="tm-img-left">
        </div>
        <div class="item tm-bg-secondary tm-text-white tm-block tm-block-wider tm-block-pad tm-block-left-2" data-desktop-seq-no="3"
            data-mobile-seq-no="5">
           <!-- <i class="fas fa-award fa-4x tm-block-icon"></i>-->
            <p><?php echo $data['description'];?></p>
            <div class="tm-text-right">
            </div>
        </div>
        <div class="item" data-desktop-seq-no="4" data-mobile-seq-no="8">
        </div>
        <div class="tm-footer" id="tmFooter" data-desktop-seq-no="5" data-mobile-seq-no="9">
            <div>
                <p class="tm-mb-small">  </p>

                <p> <a  href=""></a></p>
            </div>
        </div>
        <div class="item" data-desktop-seq-no="6" data-mobile-seq-no="2">

            <!-- image-->
            <img src="./uploads/<?php echo $data['imageT']; ?>" alt="Image">
        </div>
        <div class="item tm-block-right" data-desktop-seq-no="7" data-mobile-seq-no="3">
            <div class="tm-block-right-inner tm-bg-primary-light tm-text-white tm-block tm-block-wider tm-block-pad">
                <header>
                    <h2 class="tm-text-uppercase">
                    <?php echo "Reference ! ".$data['title'];?>                    </h2>
                </header>
                <p><?php echo $data['reference'];?>
                </p>
            </div>
        </div>

        <div class="item" data-desktop-seq-no="8" data-mobile-seq-no="6">
                        <!-- image-->

            <img src="./uploads/<?php echo $data['imageF']; ?>" alt="Image">
        </div>

        <div class="item tm-bg-white tm-block tm-form-section" data-desktop-seq-no="9" data-mobile-seq-no="7">
            <div class="tm-form-container tm-block-pad tm-pb-0">
                <header>
                    <h2 class="tm-text-uppercase tm-text-gray-light tm-mb">
                        Contact Us
                    </h2>
                </header>
                <form action="index.html" class="tm-contact-form" method="POST">
                    <div class="tm-form-group">
                        <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Name" required/>
                    </div>
                    <div class="tm-form-group">
                        <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Email" required/>
                    </div>
                    <div class="tm-form-group">
                        <textarea rows="5" id="contact_message" name="contact_message" class="form-control" placeholder="Message" required></textarea>
                    </div>
                    <div class="tm-text-right">
                        <button type="submit" class="tm-btn tm-btn-secondary tm-btn-pad-big">Send</button>
                    </div>
                </form>
            </div>

            <div class="tm-form-section-tag">
                <div class="tm-bg-secondary tm-text-white tm-block-pad tm-form-section-tag-inner">
                    <header>
                        <h2><?php echo "Remember ! ".$data['title'];?></h2>
                    </header>
                    <p><?php echo $data['remember'];?></p>
                </div>
            </div>
        </div>

        </main>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script>

        let callAdjustLayout;
        let currentLayout = "desktop",
            nextLayout = "desktop";

        /**
         * detect IE
         * returns version of IE or false, if browser is not Internet Explorer
         */
        function detectIE() {
            var ua = window.navigator.userAgent;

            var msie = ua.indexOf('MSIE ');
            if (msie > 0) {
                // IE 10 or older => return version number
                return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
            }

            var trident = ua.indexOf('Trident/');
            if (trident > 0) {
                // IE 11 => return version number
                var rv = ua.indexOf('rv:');
                return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
            }

            var edge = ua.indexOf('Edge/');
            if (edge > 0) {
                // Edge (IE 12+) => return version number
                return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
            }

            // other browser
            return false;
        }

        // Adjust layout based on the browser width
        function adjustLayout() {
            let block1, block2, block3, block4, block5, block6, block7, block8, block9;

            if (window.innerWidth <= 1199) {
                // Mobile layout
                nextLayout = "mobile";
                block1 = $("div[data-mobile-seq-no='1']");
                block2 = $("div[data-mobile-seq-no='2']");
                block3 = $("div[data-mobile-seq-no='3']");
                block4 = $("div[data-mobile-seq-no='4']");
                block5 = $("div[data-mobile-seq-no='5']");
                block6 = $("div[data-mobile-seq-no='6']");
                block7 = $("div[data-mobile-seq-no='7']");
                block8 = $("div[data-mobile-seq-no='8']");
                block9 = $("div[data-mobile-seq-no='9']");
            } else {
                // Desktop layout
                nextLayout = "desktop";
                block1 = $("div[data-desktop-seq-no='1']");
                block2 = $("div[data-desktop-seq-no='2']");
                block3 = $("div[data-desktop-seq-no='3']");
                block4 = $("div[data-desktop-seq-no='4']");
                block5 = $("div[data-desktop-seq-no='5']");
                block6 = $("div[data-desktop-seq-no='6']");
                block7 = $("div[data-desktop-seq-no='7']");
                block8 = $("div[data-desktop-seq-no='8']");
                block9 = $("div[data-desktop-seq-no='9']");
            }

            if (nextLayout !== currentLayout) {
                // Reorder blocks based on their seq no
                block1.after(block2.detach());
                block2.after(block3.detach());
                block3.after(block4.detach());
                block4.after(block5.detach());
                block5.after(block6.detach());
                block6.after(block7.detach());
                block7.after(block8.detach());
                block8.after(block9.detach());
                currentLayout = nextLayout;
            }
        }

        // Adjust layout upon window resize
        window.onresize = function () {
            clearTimeout(callAdjustLayout);
            callAdjustLayout = setTimeout(adjustLayout, 100);
        }

        // DOM is ready
        $(function () {
            if (detectIE()) {
                alert('Please use the latest version of Chrome or Firefox for best browsing experience.');
            }

            adjustLayout();
        })
    </script>
</body>

</html>
          
    
