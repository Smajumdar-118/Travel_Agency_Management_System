<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
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
    margin: 32px 572px;
    border-radius: 25px;
        }

        .item4 {
            margin: 20px 0px;
            font-size: 35px;
            color: white;
            font-weight: bold;
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
    table a{
        text-decoration: none;
    color: #fffdfc;
    border: 4px solid white;
    padding: 7px 11px;
    border-radius: 24px;
    background-color: #f50c3d
    }
    table a:hover{
        color: black;
    background-color: navajowhite;
    border-color: red;
    }
    p{
        font-size: 22px;
        margin: 34px 0px;
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
            <li class="item"><a href="#">Home</a></li>
            <li class="item"><a href="admin_customer.php">Customer Details</a></li>
            <li class="item"><a href="admin_booking.php">Booking Details</a></li>
            <li class="item"><a href="admin_customize.php">Customize Services</a></li>
            <li class="item"><a href="logout.php">Log Out</a></li>

        </ul>
    </nav>

    <div class="container4">
        <h1>Customer Details are : </h1>
        <?php
include '_dbconnect.php';
session_start();
$sql = "select * from booked";
$query = mysqli_query($conn,$sql) or die("Unsucessful");

$num=mysqli_num_rows($query);
if($num!=0){
  
    
    echo"<table>";
        echo"<thead>
            <tr>
                <th>Car Reg No</th>
                <th>Car Name</th>
                <th>Pickup</th>
                <th>Destination</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Route Id</th>
                <th>Customer Id</th>
            </tr>

        </thead>";
        echo"<tbody>";
        while($row = mysqli_fetch_assoc($query)){ 
            echo"<tr>";
            echo "<td>" . $row['Reg_No'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['Pickup'] . "</td>";
            echo "<td>" . $row['Dest'] . "</td>";
            echo "<td>" . $row['Fdate'] . "</td>";
            echo "<td>" . $row['Tdate'] . "</td>";
            echo "<td>" . $row['Route_id'] . "</td>";
            echo "<td>" . $row['customer_id'] . "</td>
            
            
           </tr>";
        }
        echo"</tbody>
    </table>";


}
else{
   echo '<div class = "item4" >Sorry ! No Data Found <br><p>Please Go Back to Home page to Book Your Car and Enjoy Our Services</p></div>';
}
?>
    </div class="container4">


</body>

</html>