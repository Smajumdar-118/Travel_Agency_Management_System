<?php
include '_dbconnect.php';

$id = $_GET['rn'];
// echo $id;
$sql = "DELETE FROM cars where Reg_No='$id' ";
$query = mysqli_query($conn,$sql);

header("location: admin_customize.php");

?>