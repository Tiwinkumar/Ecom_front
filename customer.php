<?php 
session_start();
    
  $db = mysqli_connect("localhost", "root", "", "food");

  if (isset($_POST['submit'])) {
$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
$surname = mysqli_real_escape_string($db, $_POST['surname']);
$street = mysqli_real_escape_string($db, $_POST['street']);
$city = mysqli_real_escape_string($db, $_POST['city']);
$phone = mysqli_real_escape_string($db, $_POST['phone']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$deliverytime = mysqli_real_escape_string($db, $_POST['deliverytime']);
$total = mysqli_real_escape_string($db, $_POST['total']);
 
$a= $_SESSION['id'];


$sql = "INSERT INTO customerdetail (id,firstname,surname,street,city,phone,email,deliverytime,total) VALUES ('$a' , '$firstname', '$surname', '$street', '$city', '$phone' , '$email' , '$deliverytime' , '$total')";



   mysqli_query($db, $sql);

    header("Location: homepage.php");

        


}

 
 ?>