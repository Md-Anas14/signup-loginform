<?php

@include 'config.php';
session_start();
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];
    $select="SELECT * FROM user_form WHERE email='$email' && password='$pass'";
    $result=mysqli_query($conn,$select);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN_FORM</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.js">
</head>
<body>

<div class="container-fluid">
    <div class="row ">
        <div class="d-flex flex-column  justify-content-center align-items-center vh-100">

<form class="rounded p-5 d-flex flex-column " action="" method="post">
    <div class="ms-5 mt-2 mb-4 me-5 " >
    <h2 class=" ">LOGIN FORM </h2>
</div>
<div class="">
<?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg text-danger fs-2 fw-bolder">'.$error.'</span>';
         };
      };
      ?>
</div>
<div class="d-flex justify-content-between  mb-2 ">
<label >Email:</label>
    <input class="text-white" placeholder="enter your email"  type="email" name="email" id="">
</div><br>
<div class=" d-flex justify-content-between ">
<label >Password:</label>
    <input  class="text-white" placeholder="enter your password" type="password" name="password" id="">
</div><br>
<div class="d-flex justify-content-end">
    <a href="#" class="text-decoration-none text-dark">Forgot password?</a>
</div><br>
  <div class="d-flex justify-content-center mb-3">
  <input  class=" ps-4 pe-4 rounded " name="submit" type="submit" value="submit">
  </div>  
  <div class="mt-2">
    you don't have account?<a href="reg.php" class="text-white">Register now</a>
   
</div>
</form>
   

</div>
</div>
</div>

</body>
</html>