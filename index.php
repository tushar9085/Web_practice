<?php
    session_start();
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

    include 'index.html';
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

        $sql = "INSERT INTO `practice_1`.`login_info` (`name`, `age`, `gender`, `email`,`password`, `phone`, `desc`) 
        VALUES ('$name', '$age', '$gender', '$email','$password', '$phone', '$desc');";



        $result = mysqli_query($conn, $sql);

        if($result)
        {
            $_SESSION['status'] = "Submitted successfully";
            header("location:index.php");
        }

    }

?>
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