<?php
include '_dbconnect.php';
session_start();
$id=$_SESSION['rno'];
$sql = "DELETE FROM cars where Reg_No='$id' ";
$query = mysqli_query($conn,$sql);

header("location: TravelWithUs2.php");

?>