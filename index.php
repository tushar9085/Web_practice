<?php
    session_start();
?>

<?php include 'navbar.php';?>

<div class="alert">
    <?php
        if(isset($_SESSION['status'])){
    ?>
            <div class="alert alert-success">
                <h5><?php echo $_SESSION['status'];?></h5>
            </div>
            <?php
            unset($_SESSION['status']);
        }
        ?>
</div>


<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    //creating connection
    $conn = mysqli_connect($servername, $username, $password);

    if(!$conn){
        die("connection error". mysqli_connect_error());
    }

    if(isset($_POST['submit']))
    {

        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];
        $password = $_POST['password'];

        
        //Checking unique emails
        $existSql = "SELECT * FROM `practice_1`.`login_info` WHERE email = '$email';";
        $existResult = mysqli_query($conn, $existSql);
        $existRow = mysqli_num_rows($existResult);

        if($existRow > 0)
        {
            $exist = true;
        }

        else
        {
            $exist = false;
        }

        if(!$exist)
        {
            $sql = "INSERT INTO `practice_1`.`login_info` (`name`, `age`, `gender`, `email`,`password`, `phone`, `desc`) 
                    VALUES ('$name', '$age', '$gender', '$email','$password', '$phone', '$desc');";

            $result = mysqli_query($conn, $sql);
            if($result)
            {
                $_SESSION['status'] = "Submitted successfully";
                header("location:index.php");
            }
            
        }


        else
        {
            $_SESSION['status'] = "Email Exists!";
            header("location:index.php");
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    


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
            <input type="password" name="password" id="password" placeholder="Enter Your password">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter other info"></textarea>
            <button class="btn" name="submit">Submit</button>
            <button class="btn">Reset</button>
            <button class="btn">
                <a href="bootstrap_form_login.php">Login form</a>
            </button>
        </form>
    </div>



    

    <script src="index.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- datatables -->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    </script>
    
</body>
</html>


<br>
<h1>Data in The Database</h1>
<br>


<table class="table" id = "myTable">
  <thead>
    <tr>
      <th scope="col">sl</th>
      <th scope="col">Name</th>
      <th scope="col">age</th>
      <th scope="col">gender</th>
      <th scope="col">email</th>
      <th scope="col">password</th>
      <th scope="col">phone</th>
      <th scope="col">desc</th>

    </tr>
  </thead>
  <tbody>

    <?php

        $sql = "SELECT * FROM `practice_1`.`login_info`;";

        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result))
        {
            echo "

            <tr>
                <th scope='row'>".$row['sl']."</th>
                <td>".$row['name']."</td>
                <td>".$row['age']."</td>
                <td>".$row['gender']."</td>
                <td>".$row['email']."</td>
                <td>".$row['password']."</td>
                <td>".$row['phone']."</td>
                <td>".$row['desc']."</td>  
            </tr>

            ";
        }

    ?>

  </tbody>
</table>