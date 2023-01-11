<?php
include '_dbconnect.php';

$id = $_GET['rn'];

$sql = "DELETE FROM customer where customer_id='$id' ";
$query = mysqli_query($conn,$sql);

// if($query){
    
// }
header("location: booking.php");

?>