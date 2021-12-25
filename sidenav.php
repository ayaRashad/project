<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
}

.sidenav {
  display: none;
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #728FCE;
  overflow-x: hidden;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #fff;
  display: block;
}

.sidenav a:hover {
  color: #111;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">

  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <a href="dbIndex.php">Show All Service</a>
  <a href="create.php">Create service</a>
  <a href="addedRequestService.php">Request Service</a>

  <a href="indexUser.php">Clients</a>
  <a href="addAdmin.php">Add Admin</a>

  
</div>


<span style="font-size:30px;cursor:pointer; color: #728FCE;   text-align: right; ;" onclick="openNav()">&#9776; Dashboard</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.display = "block";
}

function closeNav() {
  document.getElementById("mySidenav").style.display = "none";
}
</script>
   
</body>
</html> 
