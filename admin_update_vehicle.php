<?php
if(isset($_POST['name'])){
include '_dbconnect.php';
$name = $_POST['name'];
$seats = $_POST['seats'];
$regno = $_POST['regno'];
$fare = $_POST['fare'];

$vehicle = $_POST['vehicle'];



$sql="INSERT INTO `cars` (`v_id`, `Reg_No`, `seats`, `name`) VALUES ('$vehicle', '$regno', '$seats', '$name')";

$result = mysqli_query($conn,$sql);
if($result){
    $sql2 = "INSERT INTO `fare` (`car_reg_no`, `fare`) VALUES ('$regno', '$fare')";
    $result = mysqli_query($conn,$sql2);
}

  



header("location: admin_customize.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        .text-center {
            align-items: center;
        }

        #navbar {
            display: flex;
            align-items: center;
            position: relative;
        }

        #logo {
            margin: 10px 34px;
        }
        body{
            background: url(https://images.pexels.com/photos/7130551/pexels-photo-7130551.jpeg)no-repeat center center/cover;
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

        .container {

            display: flex;
            justify-content: center;
            text-align: center;
            flex-direction: column;
        }

        .form-group input {
            font-family: 'Raleway', sans-serif;
            display: inline;
            border: 2px solid green;
            margin: 28px auto;
            padding: 14px 33px;
            font-size: 33px;
            width: 495px;
            border-radius: 34px;
        }

        .form-group label {
            font-size: 30px;

            padding: 65px 17px;
        }

        .form-group select {
            font-family: 'Raleway', sans-serif;
            display: inline;
            border: 2px solid green;
            margin: 28px auto;
            padding: 14px 33px;
            font-size: 33px;
            width: 495px;
            border-radius: 34px;
        }

        .btn {
            font-family: 'Raleway', sans-serif;
            margin: 0px auto;
            padding: 10px 25px;
            background-color: red;
            color: white;
            font-size: 25px;
            cursor: pointer;
            border-radius: 44px;
        }
        .btn a{
            text-decoration: none;
        }

        .btn :hover {
            color: black;
            
        }
    </style>
</head>

<body>
    <nav id="navbar">
        <div id="logo">
            <img src="https://e7.pngegg.com/pngimages/289/542/png-clipart-erg-chebbi-travel-excursion-atlas-mountains-adventure-travel-logo-vehicle.png">
        </div>
        <ul>
        <li class="item"><a href="admin_customer.php">Home</a></li>
            <li class="item"><a href="admin_update_vehicle.php">Customer Details</a></li>
            <li class="item"><a href="admin_booking.php">Booking Details</a></li>
            <li class="item"><a href="admin_customize.php">Customize Services</a></li>
            <li class="item"><a href="logout.php">Log Out</a></li>

        </ul>
    </nav>
    <div class="container">

        <form action="admin_update_vehicle.php" method="post">
            <div class="form-group">
                <label for="name"> Car Name : </label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="seats">Seats Available : </label>
                <input type="number" class="form-control" id="seats" name="seats">
            </div>
            <div class="form-group">
                <label for="regno">Reg No. : </label>
                <input type="text" class="form-control" id="regno" name="regno">
            </div>
            

            <div class="form-group">
                <label for="vehicle">Vehicle Type : </label>
                <select id="vehicle" name="vehicle">
                    <option value="">Select</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fare">Fare : </label>
                <input type="number" class="form-control" id="fare" name="fare">
            </div>
            

            <button type="submit" class="btn">Add</button>
        </form>
    </div>
    <script type="text/javascript" src="/College Project/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            function loadData(type,category_id){
            $.ajax({
                url : "load.php",
                type : "post",
                data : {type : type, id : category_id},
                success : function(data){
                    if(type=="cardata"){
                        $("#cars").html(data);
                    }
                    else{
                        $("#vehicle").append(data);
                    }
                    
                }
            });
        }
        loadData();

        $("#vehicle").on("change",function(){
            var vehicle = $("#vehicle").val();
            loadData("cardata",vehicle)
        })
        });
    </script>
</body>

</html>