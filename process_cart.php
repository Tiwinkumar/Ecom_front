<?php session_start();

  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "food");

  // Initialize message variable
  $msg = "";

  if (isset($_POST['submit'])) {
$qty = mysqli_real_escape_string($db, $_POST['qty']);
$chef = mysqli_real_escape_string($db, $_POST['chef']);
$name = mysqli_real_escape_string($db, $_POST['name']);
$category = mysqli_real_escape_string($db, $_POST['category']);
$rate = mysqli_real_escape_string($db, $_POST['rate']);
$unid = $_SESSION['id'];



$sql = "INSERT INTO cart (id,quantity,chef,name,category,rate) VALUES ('$unid', '$qty', '$chef', '$name', '$category', '$rate')";



    mysqli_query($db, $sql);
     header("Location: menu.php");


 }

 if (isset($_GET['id'])) {
	$id = $_GET['id'];
	mysqli_query($db, "DELETE FROM cart WHERE s_no=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: menu.php');
}
 ?>