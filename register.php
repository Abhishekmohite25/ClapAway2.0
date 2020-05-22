<?php 
session_start();
if (isset($_SESSION['user'])) {
header('location:register.php');
}
if (isset($_POST['submit'])) {
    include 'include/connect_database.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    $mobno = $_POST['mobno'];
    if(!empty($name) && !empty($email) && !empty($psw) && !empty($mobno)){
      $insert="INSERT INTO user (name, email, psw, mobno) VALUES ('$name','$email','$psw','$mobno')";
      $run=mysqli_query($connect, $insert);
      header('location:index1.php');
    }
}
?>



<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="script.js"></script>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<form method="POST" action="register.php" enctype="multipart/form-data">
  <div class="container">
    <h1 style="color: #827FFE">ClapAway | Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" id="name" placeholder="Enter Name" name="name" required>

    <label for="email"><b>Email ID</b></label>
    <input type="email" id="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" id="psw" placeholder="Enter Password" name="psw"required >

    <label for="psw_repeat"><b>Repeat Password</b></label>
    <input type="password" id="psw_repeat" placeholder="Repeat Password" name="psw_repeat" required>

    <label for="mobno"><b>Mobile Number</b></label>
    <input type="tel" pattern="\d{10}" id="mobno" placeholder="Enter Mobile Number" name="mobno" required>

    <hr>

<!--     <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
 -->    <button type="submit" id="submit" name="submit" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="index.php">Sign in</a>.</p>
  </div>

</form>
<!--<div id="output"></div>-->

<script src="script.js"></script>
</body>
</html>