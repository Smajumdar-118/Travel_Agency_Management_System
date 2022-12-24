<?php
include '_dbconnect.php';
session_start();
$id = $_SESSION['username'];
$sql = "select * from customer where user_id = '$id' ";
$query = mysqli_query($conn,$sql) or die("Unsucessful");
$row = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="Transport.css">
    <style>
        .container4{
            display: flex;
            justify-content: center;
            text-align: center;
            flex-direction: column;
        }
        h1{
            margin: 40px 0px;
        }
        .item4{
            margin: 20px 0px;
            font-size: 29px;
        }
    </style>
</head>

<body>
    <nav id="navbar">
        <div id="logo">
            <img src="https://thumbs.dreamstime.com/z/food-delivery-logo-design-template-134749604.jpg"
                alt="MyMeal.com">
                
        </div>
        <ul>
            <li class="item"><a href="Transport2.php">Home</a></li>
            <li class="item"><a href="#services">Services</a></li>
            <li class="item"><a href="signup.php">Sign Up</a></li>
            <li class="item"><a href="login.php">Log In</a></li>
            <li class="item"><a href="#contact">Contact Us</a></li>
            <li class="item"><a href="logout.php">Log Out</a></li>
            <li class="item"><a href="booking.php">My Booking</a></li>

        </ul>
    </nav>

    <div class="container4">
        <h1>Your Booking Details are : </h1>
        <div class="item4">Name : <?php echo $row['name'] ?></div>
        <div class="item4">Idno : <?php echo $row['customer_id'] ?></div>
        <div class="item4">No of passengers : <?php echo $row['no_of_passengers'] ?></div>
        <div class="item4">Car name : <?php echo $row['car_name'] ?></div>
        <div class="item4">Accomodation : <?php echo $row[' accommodation'] ?></div>
        <div class="item4">Booking Date : <?php echo $row['From_Date'] ?></div>
        <div class="item4">Pick Up Location : <?php echo $row['pickup'] ?></div>
        <div class="item4">Destination : <?php echo $row['destination'] ?></div>
    </div class="container4">


</body>
</html>