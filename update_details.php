<?php
include '_dbconnect.php';
session_start();
// $id = $_SESSION['username'];
$id = $_GET['rn'];
// echo $id;
if(isset($_GET['name'])){
        $name = $_GET['name'];
        $age = $_GET['age'];
        $idno = $_GET['idno'];
        $pno = $_GET['pno'];
        
        $ac = $_GET['ac'];
        
        
        
        
        $fdate = $_GET['fdate'];
        $tdate = $_GET['tdate'];
        
        
        
        
        $sql = "UPDATE `customer` SET `customer_id` = '$idno', `name` = '$name', `no_of_passengers` = '$pno', ` accommodation` = '$ac',`From_Date` = '$fdate', `To_Date` = '$tdate', `age` = '$age' WHERE `customer`.`customer_id` = $idno";
        
        $result = mysqli_query($conn,$sql);
        
        
        if(true){
            $sql2="UPDATE `booked` SET `Fdate` = '$fdate', `Tdate` = '$tdate' WHERE `booked`.`customer_id` = $idno";
            $result2 = mysqli_query($conn,$sql2);
           
        
        
        }
        
        
        
        header("location: booking.php");
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
        body{
            background: url(https://images.pexels.com/photos/7130551/pexels-photo-7130551.jpeg)no-repeat center center/cover;
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
            <li class="item"><a href="TravelWithUs2.php">Home</a></li>
            <li class="item"><a href="#services">Services</a></li>
            <li class="item"><a href="#">Contact Us</a></li>
            <li class="item"><a href="logout.php">Log Out</a></li>

        </ul>
    </nav>
    <div class="container">

        <form action="update_details.php" method="GET" >
            <div class="form-group">
                <label for="name">Update Your Name : </label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="age">Update Age : </label>
                <input type="number" class="form-control" id="age" name="age">
            </div>
            <div class="form-group">
                <label for="idno"> Update Addhar No. : </label>
                <input type="text" value="<?php echo $id; ?>" class="form-control" id="idno" name="idno">
            </div>
            <div class="form-group">
                <label for="pno">Change Number of Passenger : </label>
                <input type="number" class="form-control" id="pno" name="pno">
            </div>

           
            <div class="form-group">
                <label for="ac">Choose an Option : </label>
                <select name="ac" name="ac">
                    <option value="AC" selected>AC</option>
                    <option value="Non AC">Non AC</option>

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
            
            <button type="submit" name="submit" class="btn" >Update</button>
        </form>
    </div>
    <!-- <script type="text/javascript" src="/College Project/jquery.js"></script>
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
    </script> -->
</body>

</html>

//<?php
// if(isset($_POST['name'])){
//     $name = $_POST['name'];
//     $age = $_POST['age'];
//     $idno = $_POST['idno'];
//     $pno = $_POST['pno'];
    
//     $ac = $_POST['ac'];
    
    
    
    
//     $fdate = $_POST['fdate'];
//     $tdate = $_POST['tdate'];
    
    
    
    
//     $sql = "UPDATE `customer` SET `customer_id` = '$idno', `name` = '$name', `no_of_passengers` = '$pno', ` accommodation` = '$ac',`From_Date` = '$fdate', `To_Date` = '$tdate', `age` = '$age' WHERE `customer`.`customer_id` = $gid";
    
//     $result = mysqli_query($conn,$sql);
    
    
//     if(true){
//         $sql="UPDATE `booked` SET `Fdate` = '$fdate', `Tdate` = '$tdate' WHERE `booked`.`customer_id` = $idno";
//         $result2 = mysqli_query($conn,$sql);
       
    
    
//     }
    
    
    
//     header("location: booking.php");
//     }
// echo $gid;
//?>