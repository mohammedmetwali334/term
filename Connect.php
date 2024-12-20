<?php

$conn = mysqli_connect("localhost", "root", "123qweasdzxc", "term_project");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>