<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "food");

  // Initialize message variable
  $msg = "";

  if (isset($_POST['submit'])) {
$review = mysqli_real_escape_string($db, $_POST['review']);
$rating = mysqli_real_escape_string($db, $_POST['rating']);
$reviewer_name = mysqli_real_escape_string($db, $_POST['reviewer_name']);
$reviewer_designation = mysqli_real_escape_string($db, $_POST['reviewer_designation']);


$sql = "INSERT INTO soup_review (review,rating,name,designation) VALUES ('$review', '$rating', '$reviewer_name', '$reviewer_designation')";

 header("Location: page-reviews.html");


    mysqli_query($db, $sql);

 }
 ?>