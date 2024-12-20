<?php 
include "student_nav.php";
include "../sessionCheck.php";
include "../Connect.php";
$id = $_GET["id"];
$sql = "SELECT * FROM rooms WHERE dorm_id = $id"; 
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Agdasima' rel='stylesheet'>

    <link rel = "stylesheet" href = "../css/student.css">
</head>
<body>
<input type="hidden" value="<?php echo $id; ?>" name="id">
<div class ="card_container">
    <?php  while ($row = mysqli_fetch_assoc($result)): ?>
    <div class="card">
  <img src="<?php echo $row["room_image"]; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row["room_type"]; ?></h5>
    <p class="card-text"><?php echo $row["describtion"]; ?></p>
    <?php
echo "<button onclick=\"window.location.href='room_reservation.php?id=".$row['room_id']."'\">room_reservation</button>";
   ?>
    </div>
    </div>
   <?php endwhile; ?>

  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>