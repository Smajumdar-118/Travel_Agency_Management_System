<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="TravelWithUs.css">
    <style>
        .container4 {
            display: flex;
            justify-content: center;
            text-align: center;
            flex-direction: column;
        }

        h1 {
            color: #e508f1;
    border: 2px solid black;
    
    background-color: #f1e0fc;
    margin: 45px 572px;
    border-radius: 25px;
        }

        .item4 {
            margin: 20px 0px;
            font-size: 29px;
        }

        th {
            border: 2px solid red;
            padding: 13px 42px;
            background-color: #66f448;
            color: #0e08f3;
            font-size: 24px;
        }

        td {
            border: 2px solid red;
            padding: 13px 42px;
            font-size: 18px;
            font-weight: bolder;
            background-color: #1efafc;
            color: #000000;
        }
        body{
        
        background: url(https://wallpaperaccess.com/full/195879.jpg) no-repeat center center fixed;
        background-size: cover; 
        
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
            <li class="item"><a href="TravelWithUs2.php">Home</a></li>
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
   
    
    echo"<table>";
        echo"<thead>
            <tr>
                <th>Name</th>
                <th>Idno</th>
                <th>passengers</th>
                <th>Car Name</th>
                <th>Booking Date</th>
                <th>Pick Up Location</th>
                <th>Destination</th>
            </tr>

        </thead>";
        echo"<tbody>
            <tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['customer_id'] . "</td>";
            echo "<td>" . $row['no_of_passengers'] . "</td>";
            echo "<td>" . $row['car_name'] . "</td>";
            echo "<td>" . $row['From_Date'] . "</td>";
            echo "<td>" . $row['pickup'] . "</td>";
            echo "<td>" . $row['destination'] . "</td>";
            
            
            echo"</tr>

        </tbody>
    </table>";


}
else{
   echo '<div class = "item4" >Sorry ! No Data Found</div>';
}
?>
    </div class="container4">


</body>

</html>