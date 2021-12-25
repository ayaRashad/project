<?php
  require 'header.php';
  require 'dbConnection.php';

  //echo $_SESSION['user']['id'];
    
 

$sql = "select * from service ";

$op  = mysqli_query($connect,$sql);
?>
 
    <section class="u-align-center u-clearfix u-grey-10 u-section-1" id="carousel_25b3">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-text u-text-default u-text-palette-2-base u-text-1">Development Services</h1>
        <p class="u-text u-text-default u-text-2">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
        <div class="u-expanded-width u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            
            


            <!-- first block -->
            <?php 
                    while($data = mysqli_fetch_assoc($op)){
                ?>

            <div class="u-align-center u-container-style u-list-item u-radius-15 u-repeater-item u-shape-round u-white u-list-item-3">
              <div class="u-container-layout u-similar-container u-container-layout-3">
                <span class="u-icon u-icon-circle u-palette-2-light-3 u-spacing-27 u-icon-3">
                  <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 55 55" style="">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-a7e5">
                    
                    </use>
                  </svg>
                </span>
            <h5 class="u-align-center u-custom-font u-font-raleway u-text u-text-default u-text-palette-2-base u-text-7" name ="title"><?php echo $data['title'];?></h5>
            <p class="u-align-center u-text u-text-palette-2-dark-2 u-text-8" name = "content" ><?php echo substr($data['content'],0,150);?></p>
            <?php 
                if(isset($_SESSION['user'])){               
            ?>    
            <a href= 'ifAdminAprrove.php?id=<?php echo $data['id'];?>' class="u-active-palette-2-light-2 u-border-none u-btn u-btn-round u-button-style u-hover-palette-2-light-2 u-palette-2-base u-radius-50 u-text-active-white u-text-body-alt-color u-text-hover-white u-btn-3">SHOW</a>
                 <?php
                    }
                 ?>
                </div>
            </div>
         
            <?php 
                    }
                  ?>

            <!-- end block -->
          </div>
        </div>

            
      </div>
    </section>
    <section class="u-clearfix u-section-2" id="sec-b191">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                  <img class="u-image u-image-1" src="images/mobile.png" data-image-width="512" data-image-height="306">
                </div>
              </div>
              <div class="u-align-center u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                <div class="u-container-layout u-valign-middle u-container-layout-2">
                  <h2 class="u-text u-text-default u-text-1">Sample Headline</h2>
                  <p class="u-text u-text-2">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <?php
require 'footer.php';

?>