<?php
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign-up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel = "stylesheet" href = "css/signup.css"> 
</head>
  <body>
  <form action="Index.php" method="post">
  <img class="img-fluid logo" src ="img/9lives.png">

  <div class = "wrapper">
    <div class="container mt-5">
      <h1 class = "header">Sign-up</h1>
      <hr>
        <div class="mb-3">
                <label for="username" class="form-label"><b>Username</b></label>
                <input type="text" id="username"  placeholder = "username" autocomplete = "off">
            </div>
            <div class="mt-3">
                <label for="email" class="form-label"><b>Email</b></label>
                <input type="email" id="email"  placeholder = "Email" autocomplete = "off">
                <label for = "confirm" class= "form-label"><b> Confirm Email </b></label><!--weird-->
                <input type = "email" id = "confirm" placeholder = "Confirm Email" autocomplete = "off">
            </div>
          <div class ="mt-3">
            <label for = "password" class = "form-label"><b>Password </b></label>
          <input type = "password" id = "password"  placeholder = "Password">
          </div>
<div class ="buttons mt-4 mb-3">
<input type = "reset" value  ="reset">
<input type = "submit" value = "Register">
</div>
</form>
<p>Already have an account?
<a href ="Login.php">Login</a></p><!-- having it as a button looks better!-->
    </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>