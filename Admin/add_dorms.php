<?php
include '../Connect.php';
if(isset($_POST['send'])){
$name = $_POST["name"];
$price = $_POST["price"];
$room_no = $_POST["room_no"];
$dorm_desc = $_POST["desc"];
$manager_name = $_POST["managers"];
if ($_FILES["dorm_image"]["error"] == 0){
    $image_path = "../uploads/". basename($_FILES["dorm_image"]["name"]);
    move_uploaded_file($_FILES["dorm_image"]["tmp_name"], $image_path);

}
$check = "SELECT * FROM users WHERE username = '$manager_name' AND dorm_id IS NOT NULL";$check_res = mysqli_query($conn, query: $check);
if (mysqli_num_rows($check_res) > 0) {
    $error = "manager already handles 1 dorm";
    header("Location: add_dorms.php?error=$error");
} else {
$sql = "INSERT INTO dorms (dorm_name, price, dorm_desc ,dorm_image, no_rooms) VALUES ('$name', '$price', '$dorm_desc ','$image_path', '$room_no')";
if(mysqli_query($conn, $sql)){
    $dorm_id = mysqli_insert_id( $conn);
    $manager_relation = "UPDATE users SET dorm_id = '$dorm_id' WHERE username = '$manager_name' ";
    if(mysqli_query($conn, $manager_relation)){
        $error = "something went wrong here?";
        header("Location: add_dorms.php?error=$error");
    }
    echo "<script>alert('dorm is added successfully !!');</script>";
    header("Location: Admin.php");
}
else{
    echo "Error with adding a product ".mysqli_error($conn);
}
}
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
                <label for="" class="form-label"><b>dorm_name</b></label>
                <input type="text" id="name"  placeholder = "Dorm_name"  name = "name">
            </div>
            
            <div class="mt-3">
                <label for="" class="form-label">price<b></b></label>
                <input type="number" id="price"  placeholder = "price"  name = "price">
            </div>
          <div class ="mt-3">
            <label for = "" class = "form-label"><b>number of rooms  </b></label><br>
          <input type = "number" id = "room_no"  placeholder = "room_no" name = "room_no">
          </div>
          <div class ="mt-3">
          <div class="mb-3">
            <label for="" class="form-label"><b>dorm_description</b></label>
                <input type="text" id="desc"  placeholder = "desc"  name = "desc">
            </div>
          <input type="file" name="dorm_image" accept="jpg, jpeg, png">
          <select name="managers" id="">
          <?php
    $sql = "SELECT username FROM users where role = 'Manager'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row["username"]."'>".$row["username"]."</option>";
    }
    ?>
    </select>
          </div>
<div class ="buttons mt-4 mb-3">
<input type = "reset" value  ="reset">
<input type = "submit" value = "add" name = "send">
</div>
</form>

    </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>