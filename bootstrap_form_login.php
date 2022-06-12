<?php
    session_start();
?>

<?php
include 'navbar.php';
?>

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
    $conn = mysqli_connect($servername, $username, $password, "practice_1");

    if(!$conn){
        die("connection error". mysqli_connect_error());
    }

    if(isset($_POST['submit']))
    {

        $email = $_POST['email']; 
        $password = $_POST['password'];

        $sql = "SELECT * FROM `login_info` WHERE email= '$email' AND password='$password';";

        $result = mysqli_query($conn, $sql);
        $resultFecth = mysqli_fetch_assoc($result);
        $num = mysqli_num_rows($result);

        if($num == 1)
        {
            $_SESSION['status'] = "Welcome ".$resultFecth['name']." You are a bokChod!";
            $_SESSION['email'] = $email;
            $_SESSION['loggedin'] = true;
            header("location:Welcome.php");
        }

        else
        {
          $_SESSION['status'] = "Wrong!";
          header("location:bootstrap_form_login.php");
        }

    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Bootstrap Form</title>
  </head>
  <body>
    
    <form action="bootstrap_form_login.php" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>


