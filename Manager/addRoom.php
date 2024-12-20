<?php
include '../Connect.php';
if(isset($_POST['send'])){
$name = $_POST["name"];
$price = $_POST["price"];
$desc = $_POST["desc"];
if ($_FILES["room_image"]["error"] == 0){
    $image_path = "../uploads/". basename($_FILES["dorm_image"]["name"]);
    move_uploaded_file($_FILES["dorm_image"]["tmp_name"], $image_path);}

}


?>

<!doctype html>
<html lang= 'en' >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign-up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel = "stylesheet" href = "../css/signup.css"> 
</head>
  <body>

  <img class="img-fluid logo" src ="../img/9lives.png">
  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">

  <div class = "wrapper">
    <div class="container mt-5">
      <h1 class = "header">add Dorm</h1>
      <hr>
        <div class="mb-3">
                <label for="" class="form-label"><b>room_type</b></label>
                <input type="text" id="room_type"  placeholder = "room_type"  name = "name">
            </div>
            
            <div class="mt-3">
                <label for="" class="form-label">price<b></b></label>
                <input type="number" id="price"  placeholder = "price"  name = "price">
            </div>

       
          <div class="mb-3">
            <label for="" class="form-label"><b>room_desc</b></label>
                <input type="text" id="desc"  placeholder = "desc"  name = "desc">
            </div>
          <input type="file" name="room_image" accept="jpg, jpeg, png">
          </div>
<div class ="buttons mt-4 mb-3">
<input type = "reset" value  ="reset">
<input type = "submit" value = "add" name = "send">
</div>
</div>
</form>

    </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>