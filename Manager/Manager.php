<?php 
include '../sessionCheck.php';
include '../Connect.php';
include 'manager_nav.php';
$sql = "SELECT * FROM rooms WHERE user_id = $user_id";
$resul - mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Agdasima' rel='stylesheet'>
    <link rel = "stylesheet" href = "../css/Manager.css">
</head>
<body>
  <table>
<thead>

        <tr>
        <th>room_type</th>
        <th>price</th>
            <th colspan="2">Action</th>
        </tr>
        <tbody>
        <?php 
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>". $row["room_type"] ."</td>";
            echo "<td>". $row["price"] ."</td>";          
            echo "<td> <button onclick='window.location.href=\"update.php?id=".$row['room_id']."\"'>Update</button></td>";
            echo "<td> <button onclick='window.location.href=\"delete.php?id=".$row['room_id']."\"'>Delete</button></td>";
            echo "</tr>"; }
      ?>
      </tbody>
        </table>

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>