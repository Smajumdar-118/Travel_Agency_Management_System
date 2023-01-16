<?php
include '_dbconnect.php';
session_start();
// $id = $_SESSION['username'];
$id = $_GET['rn'];





$sql4="select * from customer where customer_id='$id' ";
$query = mysqli_query($conn,$sql4) or die("Unsucessful");
$row = mysqli_fetch_assoc($query);
$carname=$row['car_name'];
$v_id=$row['vehicle_type'];
$seats=$row['no_of_passengers'];
if($query){
    
$sql3="select * from booked where customer_id='$id' ";
$query2 = mysqli_query($conn,$sql3) or die("Unsucessful");
$row = mysqli_fetch_assoc($query2);
$carno=$row['Reg_No'];
if(true){
    $sql4="INSERT INTO `cars` (`v_id`, `Reg_No`, `seats`, `name`) VALUES ('$v_id', '$carno', '$seats', '$carname')";
    $query4 = mysqli_query($conn,$sql4);
    if(true){
        $sql5="INSERT INTO `fare` (`car_reg_no`, `fare`) VALUES ('$carno', '5700')";
        $query4 = mysqli_query($conn,$sql5);
    }

    if(true){
        $sql = "DELETE FROM customer where customer_id='$id' ";
        $query3 = mysqli_query($conn,$sql);

    }
 }
}
 
header("location: booking.php");

?>