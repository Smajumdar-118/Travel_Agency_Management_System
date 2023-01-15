<?php
    include '_dbconnect.php';
    if(isset($_POST['name'])){
    $rate = $_POST['name'];
    session_start();
    $userid = $_SESSION['userid'];
    $mysql = "INSERT INTO `rating` (`customer_id`, `rating`) VALUES ('$userid', '$rate')";
    $query = mysqli_query($conn,$mysql) or die("Unsucessful");
    header("location: delete_car.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        height: 100%;
        width: 100%;
        background-color: rgb(176, 239, 239);
        
    }
    .container{
        
        text-align: center;
        
    }
    .container img{
        height: 346px;
        width: 336px;
    }
    .box{
        display: flex;
        text-align: center;
        justify-content: center;

        margin: 122px 0px;
    }
    label{
        font-size: 45px;
    }
    select{
        font-size: 30px;
    border: 2px solid red;
    border-radius: 34px;
    width: 70px;
    background-color: #dbfb6b;
    }
    .item{
        margin: 45px 0px;
    }
    button{
        font-size: 28px;
    border: 2px solid red;
    border-radius: 28px;
    width: 127px;
    background-color: #f9ace3;
    }
   
    button:hover{
        color: #009688;
        cursor: pointer;
    }
</style>
<body>

    <div class="container">
        <img src="https://www.tutorialrepublic.com/snippets/designs/simple-success-confirmation-popup.png" alt="">
    </div>
    <section>
        <div class="box">
            <form action="rating.php" method = "post" >
                <label for="name">Please rate our services : </label>
                <select name="name" id="name">
                    <option value=5>5</option>
                    <option value=4>4</option>
                    <option value=3>3</option>
                    <option value=2>2</option>
                    <option value=1>1</option>
                </select>
                <div class="item">

                    <button type = "submit" class="btn">Submit</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>