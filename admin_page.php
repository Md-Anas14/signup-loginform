<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.js">
</head>
<body>
    
<div class="container-fluid">
<div class="row">
<div class="content d-flex flex-column  justify-content-center align-items-center vh-100">
   <div class="">

      <h3>hi, <span>admin</span></h3>
   </div>
   <div class=" ">

      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
   </div>
   <div class=""><p>this is an user page</p></div>
      <div class="d-flex justify-content-between">
      <a href="login.php" class="btn">login</a>
      <a href="reg.php" class="btn">register</a>
      <a href="logout.php" class="btn">logout</a>
      </div>
</div>
   </div>
</div>
   

</div>

</body>
</html>