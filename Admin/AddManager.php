<?php
include '../Connect.php';
if(isset($_POST['submit'])){
 $username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$country = $_POST['country'];
$phone_no = $_POST['phone_no']; 
$dorm = $_POST['dorm'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$check = "SELECT * FROM users WHERE dorm_id = '$dorm' AND role = 'Manager'";
$check_res = mysqli_query($conn, $check);

if (mysqli_num_rows($check_res) > 0) {
  header('Location: AddManager.php?error=dorm+already+has+a+manager');
} else {
  if($dorm == "empty"){
    $sql = "INSERT INTO users (username, email, Password, country, phone, role) 
     VALUES('$username', '$email', '$hashed_password', '$country', '$phone_no', 'Manager')";
  }
  else{
  
    $sql = "INSERT INTO users (username, email, Password, country, phone, dorm_id, role) 
     VALUES('$username', '$email', '$hashed_password', '$country', '$phone_no', '$dorm', 'Manager')";
  }
    if (mysqli_query($conn, $sql)) {
        header('Location: Admin.php');
    } else {
        echo "Error while inserting the manager's information";
    }
}

// Close the database connection
mysqli_close($conn);
}
?>
<!doctype html>
<html lang= 'en' >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADD MANAGER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel = "stylesheet" href = "../css/signup.css"> 
</head>
  <body>
  <?php 
 if (isset($_GET['error'])) {
    $msg = $_GET['error'];
    echo "<script>alert('$msg');</script>"; 
}?>
  <form action= "AddManager.php" method="post">
  <img class="img-fluid logo" src ="../img/9lives.png">

  <div class = "wrapper">
    <div class="container mt-5">
      <h1 class = "header">ADD MANAGER</h1>
      <hr>
        <div class="mb-3">
                <label for="username" class="form-label"><b>Username</b></label>
                <input type="text" id="username"  placeholder = "username" autocomplete = "off" name = "username">
            </div>
            <div class="mt-3">
                <label for="email" class="form-label"><b>Email</b></label>
                <input type="email" id="email"  placeholder = "Email" autocomplete = "off" name = "email">
            </div>
          <div class ="mt-3">
            <label for = "password" class = "form-label"><b>Password </b></label>
          <input type = "password" id = "password"  placeholder = "Password" name = "password">
          </div>
          <div class ="mt-3">
            <label for = "country" class = "form-label"><b>country</b></label>
          <input type = "text" id = "password"  placeholder = "country" name = "country">
          </div>

          <div class ="mt-3">
            <label for = "phone_no" class = "form-label"><b>PHONE_NO</b></label>
          <input type = "number" id = "phone_no"  placeholder = "+" name = "phone_no">
          </div>

          <div class ="mt-3">
            <select name = "dorm">
          <?php
          $work = "SELECT Dorm_id, Dorm_name from dorms";
          $result = mysqli_query($conn, $work);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value='" . $row['Dorm_id'] . "'>" . $row['Dorm_name'] . "</option>";
            }
          }?>
                    <option value="empty" selected>- Select Dorm -</option>
          </select>
          </div>
         
<div class ="buttons mt-4 mb-3">
<input type = "reset" value  ="reset">
<input type = "submit" value = "add_manager" name = "submit">
</div>
</form>
    </div>  
    </div>
 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>