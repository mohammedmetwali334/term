<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Style.css">
</head>
<body>
<img class="img-fluid logo" src ="img/9lives.png">

<div class = "wrapper">
    <div class="container mt-5">
    <form action="Index.php" method="post">  
        <h1 class = "header">LOGIN</h1>  
        <hr>
            <div class="mb-3"> <!--could just use css but I need to use bootstrap somewhere?-->
                <label for="email" class="form-label"><b>Email</b></label>
                <input type="email" id="email" name="email" autocomplete = "off" >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><b>Password</b></label>
                <input type="password" id="password" name="password" >
            </div>
            <div class="buttons mt-4 mb-3" ><!-- sharp edges look better -->
                <input type="reset" value="Reset">
                <input type="submit" value="LOGIN">
        </form>
        </div>
        <p>Don't have an account? <a href = "Register.php">Signup</a></p>
</div>
</div>
<!-- <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">NEWS</h5>
    <p class="card-text">this works for now.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.</p>
    <a href="#" class="card-link">NEXT</a>
    <a href="#" class="card-link"> PREV</a>
  </div>
</div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
