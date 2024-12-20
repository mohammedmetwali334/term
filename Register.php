<?php
include 'Connect.php';
if(isset($_POST['send'])){
 $username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmEmail = $_POST['confirm'];
$confirmPass = $_POST['confirmPass'];//capitalising things is a pain, so I'll refrain.
$country = $_POST ['country'];
if ($confirmEmail != $email){
  $error = "emails do not match";
  header("Location: Register.php?error=$error");
}


$sql = "SELECT * FROM users where username = '$username'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) >=1){
  $error = "Username Already taken";
  header("Location: Register.php?error=$error");
  exit();
}

$sql = "SELECT * FROM users where email = '$email'";
$result = mysqli_query( $conn, $sql);
if (mysqli_num_rows($result) >=1){
  $error = "Email already in use";
  header("Location: Register.php?error=$error");
  exit();
}

$hash_password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO users (email, username, password, country, role) values ('$email','$username', '$hash_password' , '$country', 'Student')";
if(mysqli_query($conn, $sql)){
  header("Location: Login.php");
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
    <link rel = "stylesheet" href = "css/signup.css"> 
</head>
  <body>

  <img class="img-fluid logo mx-auto d-block mb-4 "src ="img/9lives.png">
<form action = "Register.php" method = "post" >
  <div class = "wrapper">
    <div class="container mt-5">
      <h1 class = "header">Sign-up</h1>
      <hr>
        <div class="mb-3">
                <label for="username" class="form-label"><b>Username</b></label>
                <input type="text" id="username"  placeholder = "username" autocomplete = "on" name = "username" required>
            </div>
            <div class="mt-3">
                <label for="email" class="form-label"><b>Email</b></label>
                <input type="email" id="email"  placeholder = "Email" autocomplete = "on" name = "email" required>

                <label for = "confirm" class= "form-label"><b> Confirm Email </b></label><!--weird-->
                <input type = "email" name = "confirm" placeholder = "Confirm Email" autocomplete = "on" required>
            </div>
          <div class ="mt-3">
            <label for = "password" class = "form-label"><b>Password </b></label>
          <input type = "password" id = "password"  placeholder = "Password" name = "password" required>
          </div>
          <div class ="mt-3">
            <label for = "confirmPass" class = "form-label"><b>Confirm Password </b></label>
          <input type = "password" id = "confirmPass"  placeholder = "ConfirmPassword" name = "confirmPass" required>
          </div>
          <label for="country" class="form-label"><b>Country</b></label>
                <input type="text" id="country"  placeholder = "Country" autocomplete = "on" name = "country" required>
<div class ="buttons mt-4 mb-3">
<input type = "reset" value  ="reset">
<input type = "submit" value = "Register" name = "send">
</div>
</form>
<p>Already have an account?
<a href ="Login.php">Login</a></p><!-- having it as a button looks better!-->
    </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>