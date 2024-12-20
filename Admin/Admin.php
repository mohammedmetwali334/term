<?php 
include '../Connect.php';
include 'admin_nav.php';
$dorms = "SELECT DISTINCT dorms.dorm_id, dorms.dorm_name, users.username AS manager_name, dorms.no_rooms, dorms.price
FROM dorms
JOIN users ON dorms.dorm_id = users.dorm_id
WHERE users.role = 'Manager';";
$result = mysqli_query($conn, $dorms);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <link href='https://fonts.googleapis.com/css?family=Agdasima' rel='stylesheet'>
    <link rel = "stylesheet" href = "../css/Admin.css">
</head>
<body>
<table class="tbd">
  <thead>
        <tr>
            <th>dorm_name</th>
            <th>manager</th>
            <th>room_number</th>
            <th>price</th>
            <th colspan="2">Action</th>
        </tr>
        <tbody>
        <?php 
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>". $row["dorm_name"] ."</td>";
            echo "<td>". $row["manager_name"] ."</td>";
            echo "<td>". $row["no_rooms"] ."</td>";
            echo "<td>". $row["price"] ."</td>";
            echo "<td> <button onclick='window.location.href=\"update.php?id=".$row['dorm_id']."\"'>Update</button></td>";
            echo "<td> <button onclick='window.location.href=\"delete.php?id=".$row['dorm_id']."\"'>Delete</button></td>";
            echo "</tr>"; }
      ?>
      </tbody>
        </table>

</body>
</html>