<!DOCTYPE html>
<html>
<title>GET SMART</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<header style ="">
<?php
    require 'header.php';
    require 'dbConnection.php';

?>
</header>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php
            echo $id = $_SESSION['user']['username'] ;
      ?></strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="create.php" class="w3-bar-item w3-button w3-padding">
        <i class="fa fa-cog fa-fw"></i>  Create service</a>
    <a href="dbIndex.php" class="w3-bar-item w3-button w3-padding w3-blue">
        <i class="fa fa-eye fa-fw"></i> Show Service</a>
    <a href="addedRequestService.php" class="w3-bar-item w3-button w3-padding">
        <i class="fa fa-diamond fa-fw"></i>  Request Service</a>
    <a href="addAdmin.php" class="w3-bar-item w3-button w3-padding">
        <i class="fa fa-user fa-fw"></i>  Add Admin</a>
    <a href="indexUser.php" class="w3-bar-item w3-button w3-padding">
        <i class="fa fa-users fa-fw"></i>  User</a>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <?php
        $numRequest =[];
        $Request = "select * from RequestService where open = 'No' ";
        $Request  = mysqli_query($connect,$Request);
            while($data = mysqli_fetch_assoc($Request)){
                $numRequest[] = $data['id'];
                
            }
        $numGet =[];
        $get = "select id from RequestService where open = 'Yes' ";
        $get  = mysqli_query($connect,$get);
            while($dataGet = mysqli_fetch_assoc($get)){
                    $numGet[] = $dataGet['id'];
                    
            }
        $numService =[];
        $service = "select id from service ";
        $service  = mysqli_query($connect,$service);
            while($dataService = mysqli_fetch_assoc($service)){
                 $numService[] = $dataService['id'];
                        
            }
        $numUser =[];
        $role = 2;
        $user = "select id from user where role_id=$role ";
        $user  = mysqli_query($connect,$user);
            while($dataUser = mysqli_fetch_assoc($user)){
               $numUser[] = $dataUser['id'];            
                }                   

    ?> 
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">

    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-cog w3-xxxlarge"></i></div>
        <div class="w3-right">
           
          <h3><?php echo count($numRequest);?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Request</h4>
      </div>
    </div>
    
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo count($numService);?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Service</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-diamond w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo count($numGet);?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>got service </h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo count($numUser);?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5></h5>
      </div>
      <div class="w3-twothird">
        <h5>Request</h5>

        <table class="w3-table w3-striped w3-white">
            <?php
                
                $sql = "select RequestService.* , user.username as client, service.title as service from RequestService  inner join user  on RequestService.client_id = user.id inner  join service on RequestService.service_id = service.id where open = 'No'";
                $opShow  = mysqli_query($connect,$sql);
                    if($opShow){
                        $message =  'Data Updated';
                   }else{
                        $message =  'Error Try Again : '.mysqli_error($connect); 
                    echo $message;
              
                   }
                    while ($dataShow = mysqli_fetch_assoc($opShow)){
                     
            ?>
            <tr>
                <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
                <td><?php echo $dataShow['client']; ?></td>
                <td><?php echo $dataShow['service']; ?></td>
                <td><i>10 mins</i></td>
            </tr>
            <?php
                }
            
            ?>
           </table>
      </div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>General Stats</h5>
    <p>New Visitors</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-green" style="width:5%">+25%</div>
    </div>

    <p>New Users</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
    </div>

    <p>Bounce Rate</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
    </div>
  </div>
  <hr>

  <div class="w3-container">
    <h5>Recent Comments</h5>
    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>John <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
        <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar1.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>Bo <span class="w3-opacity w3-medium">Sep 28, 2014, 10:15 PM</span></h4>
        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>
  </div>
  <br>
  <div class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">Demographic</h5>
        <p>Language</p>
        <p>Country</p>
        <p>City</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">System</h5>
        <p>Browser</p>
        <p>OS</p>
        <p>More</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">Target</h5>
        <p>Users</p>
        <p>Active</p>
        <p>Geo</p>
        <p>Interests</p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
