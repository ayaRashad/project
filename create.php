<?php
require 'validation.php' ;
require 'dbConnection.php' ;
require 'header.php';


$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $title =Clean($_POST['title']);
    $content = Clean($_POST['content']);
    $description = Clean($_POST['description']);
    $reference = Clean($_POST['reference']);
    $remember = Clean($_POST['remember']);

	 # Validate title
	 if (!validate($title, 1)) {
    $errors['title'] = 'Field Required';
} elseif (!validate($title, 7)) {
    $errors['title'] = 'Invalid String';
}
    # Validate content
    if (!validate($content, 1)) {
      $errors['content'] = 'Field Required';
    } 
    if (!validate($description, 1)) {
      $errors['description'] = 'Field Required';
    } 
    if (!validate($reference, 1)) {
      $errors['reference'] = 'Field Required';
    } 
    if (!validate($remember, 1)) {
      $errors['remember'] = 'Field Required';
    } 
    $content = str_replace("'","''",$content);
 // image ...
 //if ((!validate($_FILES['image']['name'], 1))) {

      $tmpPath = $_FILES['image']['tmp_name'];
      $imageName = $_FILES['image']['name'];
      $imageSize = $_FILES['image']['size'];
      $imageType = $_FILES['image']['type'];
      $exArray = explode('.', $imageName);
      $extension = end($exArray);
      $FinalName = rand() . time() . '.' . $extension;
      $allowedExtension = ['png', 'jpg'];
      $desPath = './uploads/' . $FinalName;

  if (move_uploaded_file($tmpPath, $desPath)) {
    
    $sql = "insert into service (title,content,description,reference,remember,image,imageT,imageF) values ('$title','$content','$description','$reference','$remember','$FinalName','$FinalName','$FinalName')";
    $operation =  mysqli_query($connect,$sql);
      if ($operation){
          echo "done";
      }else{
        echo "error".mysqli_error($connect);
      }
    }
  } 
//} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>

 
<section class="u-align-center u-clearfix u-grey-10 u-section-1" id="carousel_25b3">
<div class="u-container-layout u-similar-container u-container-layout-1">

<div class="container">
  <h2>Create New Service</h2>
  <form action = "<?php echo $_SERVER['PHP_SELF'] ;?> " method ="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" class="form-control" id="InputTitle" name = "title" placeholder="Enter title" >
  </div>


  <div class="form-group">
    <label for="exampleInputContent">Content</label>
    <input type="test"   class="form-control" id="InputContent" name ="content" placeholder="Enter content"required>
  </div>
  
  <div class="form-group">
    <label for="exampleInputContent">description</label>
    <input type="test"   class="form-control" id="InputContent" name ="description" placeholder="Enter description"required>
  </div>

  <div class="form-group">
    <label for="exampleInputContent">reference</label>
    <input type="test"   class="form-control" id="InputContent" name ="reference" placeholder="Enter reference"required>
  </div>

  <div class="form-group">
    <label for="exampleInputContent">remember</label>
    <input type="test"   class="form-control" id="InputContent" name ="remember" placeholder="Enter remember"required>
  </div>
  <div style ="display: inline;">
      <label for="exampleInputPassword">Image</label><br>
      <input id="file-upload" style ="display: inline;" type="file" name='image'>
     

      <br>
      <br>

  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<br/>
</div>
</div>

</section>

</body>
</html>
<?php
require 'footer.php';
?>
