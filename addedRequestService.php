 <?php

require 'header.php';
require 'dbConnection.php';


$sql = "select RequestService.* , user.username as client, service.title as service from RequestService  inner join user  on RequestService.client_id = user.id inner  join service on RequestService.service_id = service.id ";

$op  = mysqli_query($connect,$sql);

if($op){
    $message =  'Data Updated';
}else{
    $message =  'Error Try Again'.mysqli_error($connect); 
echo $message;
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;}
        .m-b-1em {
            margin-bottom: 1em;}
        .m-l-1em {
            margin-left: 1em;}
        .mt0 {
            margin-top: 0;}
    </style>
</head>
<body>
    <section class="u-align-center u-clearfix u-grey-10 u-section-1" id="carousel_25b3">
        <div class="u-container-layout u-similar-container u-container-layout-1">
            <div class="container">
                <div class="page-header">
                    <h1>Request Service</h1>
                    <br>
                </div>
            
            <table style ="background-color: white;"  class='table table-hover table-responsive table-bordered'>
                    <!-- creating our table heading -->
                <tr>
                    <th>ID</th>
                    <th>service</th>
                    <th>client</th>
                    <th>open</th>
                    <th>dateFrom</th>

                </tr>

                <?php 
                    while($data = mysqli_fetch_assoc($op)){
                ?>
            <tr>
                <td><?php echo $data['id'];?></td>
                <td><?php echo $data['service'];?></td>
                <td ><?php echo $data['client'];?></td>
                <td ><?php echo $data['open'];?></td>
                <td ><?php echo $data['dateFrom'];?></td>

                <td width="200">
                    <a href='approveService.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Update</a>
                </td>
            </tr>
            <?php 
                }
            ?>

                    <!-- end table -->
        </table>

    </div>
</div>
</section>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>

<?php

require 'footer.php';

?>