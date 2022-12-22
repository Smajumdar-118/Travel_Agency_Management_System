<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "transport";

$conn = mysqli_connect($servername, $username, $password, $database);

if($_POST['type']==""){

    $sql="select * from vehicle";
    $query = mysqli_query($conn,$sql) or die("Unsucessful");
    $str = "";
    while($row = mysqli_fetch_assoc($query)){
        $str .= "<option value='{$row['v_id']}'>{$row['v_type']}</option>";
    }
}
else if($_POST['type']=="cardata"){
    $sql="select * from cars where v_id = {$_POST['id']}";
    $query = mysqli_query($conn,$sql) or die("Unsucessful");
    $str = "";
    while($row = mysqli_fetch_assoc($query)){
        $str .= "<option value='{$row['name']}'>{$row['name']}</option>";
    }
}
echo $str;
?>