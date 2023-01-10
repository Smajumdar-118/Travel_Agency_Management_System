<?php
include '_dbconnect.php';

$id = $_GET['rn'];
// echo $id;
$sql = "DELETE FROM customer where customer_id='$id' ";
$query = mysqli_query($conn,$sql);
if($query){
    $result = "DELETE FROM booked where customer_id='$id' ";
    $query2 = mysqli_query($conn,$result); 
}
header("location: booking.php");

?>