<?php
include '_dbconnect.php';

$id = $_GET['rn'];
// echo $id;
$sql = "DELETE FROM customer where customer_id='$id' ";
$query = mysqli_query($conn,$sql);

header("location: admin_customer.php");

?>