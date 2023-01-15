<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include '_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  
    $sql = "Select * from users where username='$username' AND password='$password'";
    $result = mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1){
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;
      header("location: admin_customer.php");
    }
    else{
      $showError = "Invalid Credentials";
    }
 

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Document</title>
</head>
<style>
  * {
    margin: 0px;
    padding: 0px;
  }

  #navbar {
    display: flex;
    align-items: center;
    position: relative;
  }

  #logo {
    margin: 10px 34px;
  }

  #logo img {
    height: 59px;
    width: 59px;
    margin: 3px 6px;

  }

  #navbar ul {
    display: flex;
  }

  #navbar ul li {
    list-style: none;
    font-size: 1.3rem;
  }

  #navbar ul li a {
    color: white;
    display: block;
    padding: 3px 22px;
    text-decoration: none;
    border-radius: 18px;
  }

  #navbar ul li a:hover {
    color: black;
    background-color: white;
  }

  #navbar::before {
    content: "";
    background-color: black;
    position: absolute;
    height: 100%;
    width: 100%;
    z-index: -1;
    opacity: 0.4;
  }




  body{
        
        background: url(https://images.pexels.com/photos/230794/pexels-photo-230794.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1) no-repeat center center fixed;
        background-size: cover; 
    }
    .container{ 
        color: white;
        position: absolute;
        top: 25%;
        left: 40%; 
    }
    .container h1{
        font-family: 'Heebo', sans-serif;
        width: 50%;
        display: inline-block;
        font-size: 40px;
        border-bottom: 5px solid purple;
        margin-bottom: 15px;
        padding: 13px 0;
    }
    .box{
        width: 50%; 
        margin: 22px 0px;
        border-bottom: 2px solid purple;
    }
    .box input{  
        background: none;
        width: 75%;
        padding: 5px 10px;
        font-size: 20px;
        border: none;
        outline:none;
        color: white;
    }
    .btn{
        color: white;
        cursor: pointer;
        outline: none; 
        margin: 12px 0;
        padding: 10px 21px;
        border: 2px solid purple;
        border-radius: 10px;
        font-size: 18px;
        background: none;
        font-weight: bold;
        
    }
    .box i{ 
        width: 25px; 
        text-align: center;
    }
    .btn:hover{
        opacity: 0.5;
        color: purple; 
        background: white; 
        
    }
</style>

<body>



  <nav id="navbar">
    <div id="logo">
      <img src="https://e7.pngegg.com/pngimages/289/542/png-clipart-erg-chebbi-travel-excursion-atlas-mountains-adventure-travel-logo-vehicle.png">
    </div>
    <ul>
      <li class="item"><a href="TravelWithUs.php">Home</a></li>
      
      
      

    </ul>
  </nav>
<?php

  if($login){
  
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>You are Logged in
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  if($showError){
  
  echo '<div class="alert alert-dark alert-dismissible fade show " role="alert">
  <strong>Sorry!</strong>'.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
?>

 
    <form action="/College Project/admin_login.php" method="POST">
    <div class="container">
        <h1>Administrator Login Only</h1>
        <div class="box">
            <i class="fa fa-envelope"></i>
            <input type="text" name="username" id="username" placeholder="Enter Your Username">
        </div>
        <div class="box">
            <i class="fa fa-key"></i>
            <input type="password" name="password" id="password" placeholder="Enter Your Password">
        </div>
        <button class="btn">Sign In</button>
      </form>

      
  </div>
</body>

</html>