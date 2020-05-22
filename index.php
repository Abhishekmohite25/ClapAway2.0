<?php
ob_start();
session_start();
include'include/connect_database.php';
if(isset($_POST['btn'])){
  $email=$_POST['email'];
  $password=$_POST['psw'];
  if(!empty($email) && !empty($password)){
    $check="SELECT * FROM user WHERE email='$email' AND psw='$password'";
    $run=mysqli_query($connect,$check);
    $c=mysql_query("SELECT name FROM user WHERE email='$email' AND psw='$password'");
    $r=mysql_fetch_row($c);
    $check_run=mysqli_num_rows($run);
    if($check_run==1){
    $_SESSION['admin']=$c[1];
    header('location:index1.php');
    }
  }
}
?>








 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  	<title>ClapAway</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/style2.css">
 -->    <link rel="icon" type="image/png" href="images/ClapAwaybg.png"/>
     <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  border:none;
  outline: none;
  background: none;
  
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: top;
  width: 5rem;
  font-size: 1.4rem;
}

.myNav{
  background-color: red;
}

.open-button:hover{
  background: black;
  color: white;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: top;
  bottom: 0;
  
  

}

/* Add styles to the form container */
.form-container {
  margin-left: 6rem;
  width: 280px;

}

/* Full-width input fields */
.form-container input[type=text],.form-container input[type=email], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus,.form-container input[type=email], .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}


.content_body
    {
    margin: 0 auto;
    width: 100%;
    overflow: hidden;
    padding-top: 30px;
    background: #E6E6E0;
    color: #555;
    font-family: Tahoma, Arial, sans-serif;
    font-size: 14px;
    min-height: 800px;
     background-image: url(http://types4u.org/Tomike/temp/images/saturation.png) ;
    background-position: right bottom; 
     background-repeat: no-repeat;
     z-index: 1;
    }


       #footer
        {
       background: url(http://types4u.org/Tomike/temp/images/bg2.jpg) #E6E6E0;
       color: white;
    font-family: Lato, Tahoma, Arial, sans-serif;
     font-size: 13px;
     line-height: 1.5em;
     padding: 40px 50px 50px 50px;
     clear: both;
     border-top: solid #000033 5px;
     }

   .design_by
      {
     float:     right;
     font-size: 2.4em;
     font-family: 'tangerine', cursive;
     color:     white;
   }

   .copyright
  {
  float:     left;
   font-size: 2.4em;
  font-family: 'tangerine', cursive;
   color:     white;
       }
</style>
  </head>

    <!-- <footer style="position: bottom ; align-self: center;">
   © Copyright ClapAway, 2019.
 </footer> -->
    
  <body background="images/ClapAwaybg.png">

    <header>
                <a href="index.php">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSwWYJwpNjmfQ3zh8mF-t5QwZweMJtHO_pyJEyW4U1BZAElzYPp" style="width:120px;height:40px; border:none; " ></a>
                <!-- padding: 5px 7.5px; -->
                <ul>
                    <span style="cursor:pointer" onclick="openNav()"&#9776;><li><a>Products</a></li></span>
                    <li><a href="register.php">Register</a></li>
                    <!-- <a href="log2.html"><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button></a> -->
                    <!-- <li><a  onclick="openForm()" target="_self">Login</a></li> -->
                    <button class="open-button" onclick="openForm()">Login</button>

<div class="form-popup" id="myForm">
  <form method="POST" action="index.php" class="form-container">

    <label for="email"></label>
    <!-- <input type="text" placeholder="Enter Email" name="email" required>-->
    <input type="email" id="email" placeholder="Enter Email" name="email" required>
    <br>
    <label for="psw"></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" class="btn" name="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    <br>
  </form>
</div>  

                    <!-- <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>  -->

        
    </header> 
    
    <div class="main">
      
      <div class="title">
        <h1 ><center><a href="about.php" style="text-decoration:none">ClapAway</a></center></h1>
      </div>
    </div>

  
<p id="demo"></p>

    <div id="myNav" class="overlay">
    <!-- <h1 ><font color="#FFA500" font-family="Helvetica"><center>ClapAway | Products</center></font></h1> -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
    <!-- <a href="images/bulb.png" target="_blank">Bulb<img src="images/bulb.png"style="width:150px;height:100px;  padding: 5px 7.5px;" alt="bulb"></a>
    <a href="#">Tubelight <img src="images/tubelight.png"style="width:300px;height:100px;  padding: 5px 7.5px;" ></a> -->
    

    <!-- <a href="#">Clients</a>
    <a href="#">Contact</a> -->
    
    <!-- <h2>Responsive "Meet The Team" Section</h2>
<p>Resize the browser window to see the effect.</p>
<br> -->
<!-- <h1 ><font color="#FFA500" font-family="Helvetica"><center>ClapAway | Products</center></font></h1> -->
<div class="row">
  <div class="column">
    <div class="card">
      <a href="images/bulb.png" target="_blank"><img src="images/bulb.png" alt="Bulb" style="width:100%"></a>
      <div class="container">
        <h1><font color="white"><b>Bulb</b></h1>
        <!-- <p class="title">CEO & Founder</p> -->
        <p style="color: lightgreen;">Light your room with a clap!</p>
        <p><button class="button" onclick="pop()">Details</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <a href="images/tublight.png" target="_blank"><img src="images/tublight.png" alt="Tubelight" style="width:100%"></a>
      <div class="container">
        <h1><font color="white">Tube Light</h1>
        <!-- <p class="title">Art Director</p> -->
        <p style="color: lightgreen;">Some more light all with the help of a clap!</p>

        <p><button class="button" onclick="pop()">Details</button></p>
      </div>
    </div>
  </div>  

  <div class="column">
    <div class="card">
       <a href="images/fanca.png" target="_blank"><img src="images/fanca.png" alt="Fan" style="width:100%"></a>
      <div class="container">
        <h1><font color="white"><b>Fan</b></h1>
        <!-- <p class="title">Designer</p> -->
        <p style="color: lightgreen;">Feeling hot? Just clap!</p>
        <p></font></p>
        <p><button class="button" onclick="pop()">Details</button></p>
      </div>
    </div>
  </div>
</div>

<script>
function pop() {
  alert("Please login or register to view the details or go visit Amazon ¯\\_(ツ)_/¯");
}
</script>

<!-- <button class="open-button" onclick="openForm()">Open Form</button>
 -->
<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Login</h1>

    <label for="email"></label><br>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" class="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>



<!-- js for the curtain menu  -->
  <script>
  function openNav() {
  document.getElementById("myNav").style.height = "100%";
  }

  function closeNav() {
  document.getElementById("myNav").style.height = "0%";
  }

  // Get the modal
// var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }


   function myDrop() {
  document.getElementById("myForm").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.form-popup')) {
    var dropdowns = document.getElementsByClassName("form-container");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
  </script>

  <footer style="z-index: 2;">
   <h3>© Copyright ClapAway, 2019.</h3>
 </footer>

  
 <!--  <div class="footer">
  <p>Footer</p>
</div> -->

 <!--  <footer >
  <p>Posted by: Hege Refsnes</p>
  <p>Contact information: <a href="mailto:someone@example.com">
  someone@example.com</a>.</p>
</footer> -->

  </body>
</html>
