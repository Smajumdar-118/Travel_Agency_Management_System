<?php
if(isset($_POST['name'])){
include '_dbconnect.php';
$name = $_POST['name'];
$age = $_POST['age'];
$idno = $_POST['idno'];
$pno = $_POST['pno'];
$vehicle = $_POST['vehicle'];
$ac = $_POST['ac'];

$cars = $_POST["cars"];
$sql2="select * from cars where name='$cars'";
$query = mysqli_query($conn,$sql2) or die("Unsucessful");

$row = mysqli_fetch_assoc($query);
$rno=$row['Reg_No'];


$fdate = $_POST['fdate'];
$tdate = $_POST['tdate'];
$pickup = $_POST['pickup'];
$dest = $_POST['dest'];


if(true){
session_start();
$user_id = $_SESSION['username'];
$sql = "INSERT INTO `customer` (`customer_id`, `name`, `no_of_passengers`, `vehicle_type`, `car_name`, ` accommodation`, `From_Date`, `To_Date`, `pickup`, `destination`, `age`,`user_id`) VALUES ('$idno', '$name', '$pno', '$vehicle', '$cars', '$ac', '$fdate', '$tdate', '$pickup', '$dest', '$age','$user_id')";

$result = mysqli_query($conn,$sql);


if($result){
    $sql="INSERT INTO `route` (`Pickup`, `Dest`) VALUES ('$pickup', '$dest')";
    $result2 = mysqli_query($conn,$sql);
    if($result2){
    $sql4="select * from route where Pickup='$pickup' ";
    $query = mysqli_query($conn,$sql4) or die("Unsucessful");
    $row = mysqli_fetch_assoc($query);
    $route=$row['Route_id'];
    
    if($result){
        
        
        $sql3= "INSERT INTO `booked` (`Reg_No`, `name`, `Pickup`, `Dest`, `Fdate`, `Tdate`, `Route_id`) VALUES ('$rno', '$cars', '$pickup', '$dest', '$fdate', '$tdate', '$route')";
        $result2 = mysqli_query($conn,$sql3);
        
    }
    }



}
}
session_start();
$_SESSION['cars'] = $cars;
$_SESSION['rno'] = $rno;
$_SESSION['userid'] = $idno;
header("location: payment.php");
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
            <img src="https://thumbs.dreamstime.com/z/food-delivery-logo-design-template-134749604.jpg"
                alt="MyMeal.com">
        </div>
        <ul>
            <li class="item"><a href="#">Home</a></li>
            <li class="item"><a href="#services">Services</a></li>
            <li class="item"><a href="#">Sign Up/Log IN</a></li>
            <li class="item"><a href="#contact">Contact Us</a></li>

        </ul>
    </nav>
    <div class="container">

        <form action="Booking_form.php" method="post">
            <div class="form-group">
                <label for="name">Name : </label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="age">Age : </label>
                <input type="number" class="form-control" id="age" name="age">
            </div>
            <div class="form-group">
                <label for="idno">Addhar No. : </label>
                <input type="text" class="form-control" id="idno" name="idno">
            </div>
            <div class="form-group">
                <label for="pno">Number of Passenger : </label>
                <input type="number" class="form-control" id="pno" name="pno">
            </div>

            <div class="form-group">
                <label for="vehicle">Vehicle Type : </label>
                <select id="vehicle" name="vehicle">
                    <option value="">Select</option>
                </select>
            </div>
            <div classs="form-group">
                <label for="cars">Car Name : </label>
                <select id="cars" name="cars">
                    <option value="">Select</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ac">Choose an Option : </label>
                <select name="ac" name="ac">
                    <option value="ac" selected>AC</option>
                    <option value="nonac">Non AC</option>

                </select>
            </div>
            <div class="form-group">
                <label for="fdate">Booking Date(Form) : </label>
                <input type="date" class="form-control" id="fdate" name="fdate">
            </div>
            <div class="form-group">
                <label for="tdate">Booking Date(TO) : </label>
                <input type="date" class="form-control" id="tdate" name="tdate">
            </div>
            <div class="form-group">
                <label for="pickup">Pick Up Location : </label>
                <input type="text" class="form-control" id="pickup" name="pickup">
            </div>
            <div class="form-group">
                <label for="dest">Destination : </label>
                <input type="text" class="form-control" id="dest" name="dest">
            </div>
            <button type="submit" class="btn">Register</button>
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