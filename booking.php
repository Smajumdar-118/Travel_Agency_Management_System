

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
        <?php
include '_dbconnect.php';
session_start();
$id = $_SESSION['username'];
$sql = "select * from customer where user_id = '$id' ";
$query = mysqli_query($conn,$sql) or die("Unsucessful");
$row = mysqli_fetch_assoc($query);
$num=mysqli_num_rows($query);
if($num==1){
    echo '<div class="item4" >Name :  ' .$row['name']. '</div>';
    echo '<div class="item4" >Idno :  ' .$row['customer_id']. '</div>';
    echo '<div class="item4" >passengers :  ' .$row['no_of_passengers']. '</div>';
    echo '<div class="item4" >Car Name :  ' .$row['car_name']. '</div>';
    echo '<div class="item4" >Accomodation :  ' .$row[' accommodation']. '</div>';
    echo '<div class="item4" >Booking Date :  ' .$row['From_Date']. '</div>';
    echo '<div class="item4" >Pick Up Location :  ' .$row['pickup']. '</div>';
    echo '<div class="item4" >Destination :  ' .$row['destination']. '</div>';
    
}
else{
   echo '<div class = "item4" >Sorry ! No Data Found</div>';
}
?>
</div class="container4">


</body>
</html>