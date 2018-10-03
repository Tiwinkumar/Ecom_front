<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "food");

  // Initialize message variable
  $msg = "";

  if (isset($_POST['submit'])) {
$name = mysqli_real_escape_string($db, $_POST['name']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$phone = mysqli_real_escape_string($db, $_POST['phone']);
$datebook = mysqli_real_escape_string($db, $_POST['datebook']);
$attendents = mysqli_real_escape_string($db, $_POST['attendents']);



$sql = "INSERT INTO tablebook (name,email,mobile,datebook,attendees) VALUES ('$name', '$email', '$phone', '$datebook', '$attendents')";

 header("Location: book-a-table.php");


    mysqli_query($db, $sql);

 }
 ?>