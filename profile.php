
<!DOCTYPE html>
<html>
<title>GET SMART</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<?php
require 'header.php';
require 'dbConnection.php';
$id = $_SESSION['user']['id'] ;

$open = "select service_id from RequestService where open = 'Yes' and client_id =$id ORDER BY id DESC";
$open  = mysqli_query($connect,$open);

$close = "select service_id from RequestService where open = 'No' and client_id =$id ORDER BY id DESC ";
$close  = mysqli_query($connect,$close);

if($close){
  $message =  'Data close';
    
}
  

?>
<section  style=" position: relative;top: -5px ;" class="u-align-center u-clearfix u-grey-10 u-section-1" id="carousel_25b3">
      <div class="u-clearfix u-sheet u-sheet-1">
<!-- Page Container -->
<div  class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center"><?php echo $_SESSION['user']['username']?></h4>
         <p class="w3-center"><img src="img/image-04.jpg" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i><?php echo $_SESSION['user']['email']?> </p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION['user']['address']?></p>
         <p><i class="fa fa-phone fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION['user']['phone']?></p>
        </div>
      </div>
      <br>
      
      
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h2 class="w3-opacity">Approved Request</h2>
            </div>
          </div>
        </div>
      </div>
      
     
      <?php
          while($data = mysqli_fetch_assoc($open)){
            $s_id = $data['service_id'] ;
            $serviceOpen = "select * from service where id =$s_id";
            $queryOpen  = mysqli_query($connect,$serviceOpen);
            $seviceData = mysqli_fetch_assoc($queryOpen);
            


      ?>
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="images/mobile.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:130px">
        <span class="w3-right w3-opacity">16 min</span>
        <h4><?php echo $seviceData['title'];?></h4><br>
        <hr class="w3-clear">
        <p> <?php echo $seviceData['content'];?> </p>  
            <a href= 'ifAdminAprrove.php?id=<?php echo $seviceData['id'];?>' class="u-active-palette-2-light-2 u-border-none u-btn u-btn-round u-button-style u-hover-palette-2-light-2 u-palette-2-base u-radius-50 u-text-active-white u-text-body-alt-color u-text-hover-white u-btn-3">SHOW</a>
            <br>
        </div>  
      <?php
             }
      ?>       
      
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
    <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
        <p>Requests</p>
      </div>
      <br>

      <?php
          while($data = mysqli_fetch_assoc($close)){
            $c_id = $data['service_id'] ;
            $serviceClose = "select * from service where id =$c_id";
            $queryClose  = mysqli_query($connect,$serviceClose);
            $seviceDataClose = mysqli_fetch_assoc($queryClose);

      ?>
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
        <p><strong><?php echo $seviceDataClose['title'];?></strong></p>
          <img src="images/mobile.png" alt="Avatar" style="width:50%"><br>
          <p>Friday 15:00</p>
          <div class="w3-row w3-opacity">            
            <div class="w3-half">
            <a style="width:150px" href= 'deleteUserRequest.php?id=<?php echo $seviceDataClose['id'];?>' class="u-active-palette-2-light-2 u-border-none u-btn u-btn-round u-button-style u-hover-palette-2-light-2 u-palette-2-base u-radius-50 u-text-active-white u-text-body-alt-color u-text-hover-white u-btn-3">DELETE</a>
            <br>
            </div>
          </div>
        </div>
      </div>
      <br>
      
      <?php
          }
      ?>    
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>
</div>
    </section>
<!-- Footer -->
<?php
require 'footer.php';
?>

</body>
</html>
