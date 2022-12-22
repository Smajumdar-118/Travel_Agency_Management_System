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
      header("location: Transport2.php");
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
</style>

<body>



  <nav id="navbar">
    <div id="logo">
      <img src="https://thumbs.dreamstime.com/z/food-delivery-logo-design-template-134749604.jpg" alt="MyMeal.com">
    </div>
    <ul>
      <li class="item"><a href="Transport.php">Home</a></li>
      <li class="item"><a href="#">Services</a></li>
      <li class="item"><a href="#">About Us</a></li>
      <li class="item"><a href="signup.php">Sign Up</a></li>

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
  
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Success!</strong>'.$showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
?>

  <div class="container my-4">
    <h1 class="text-center">Log in to Our website</h1>
    <form action="/College Project/login.php" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your UserName with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>

      <button type="submit" class="btn btn-primary">Log in</button>
      </form>

      <div class="container">Don't have an acount? clich here <a href="signup.php">Sign Up</a></div>
  </div>
</body>

</html>