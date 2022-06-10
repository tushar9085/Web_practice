<?php

if(isset($_POST['name']))
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    //creating connection
    $conn = mysqli_connect($servername, $username, $password);

    if(!$conn){
        die("connection error". mysqli_connect_error());
    }

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `practice_1`.`login_info` (`name`, `age`, `gender`, `email`, `phone`, `desc`,`date`) 
    VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    $conn->query($sql);    

    $conn->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h3>Welcome To Tushar's Trip form</h3>
        <p>Enter your Details</p>
        

        <form action="index.php" method="post">

            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
            <input type="email" name="email" id="email" placeholder="Enter Your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter other info"></textarea>
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>
        </form>
    </div>

    <script src="index.js"></script>
</body>
</html>


