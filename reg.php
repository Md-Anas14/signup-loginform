<?php
@include 'config.php';

if (isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];
    
    
    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";


    $result=mysqli_query($conn,$select);
    if(mysqli_num_rows($result) > 0){
        $error[] = 'user already exist!';
    }else{
        if($pass!=$cpass){
            $error[] = 'password not matched!';
        }else{
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn,$insert);
            header('location:login.php');
        }
    }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGNUP_FORM</title>
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
    <h2 class=" ">REGISTER FORM</h2>
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
<label >Name:</label>
    <input class="text-white" placeholder="enter your email"  type="text" name="name" id="">
</div><br>
<div class="d-flex justify-content-between  mb-2 ">
<label >Email:</label>
    <input class="text-white" placeholder="enter your email"  type="email" name="email" id="">
</div><br>
<div class=" d-flex justify-content-between mb-2">
<label >Password:</label>
    <input  class="text-white" placeholder="enter your password" type="password" name="password" id="">
</div><br>
<div class=" d-flex justify-content-between mb-2">
<label >Confirm Password:</label>
    <input  class="text-white" placeholder=" confirm password" type="password" name="cpassword" id="">
</div><br>
<div class=" d-flex justify-content-between mb-2">
<select class="customselect text-white" name="user_type">
         <option class="select-selected " value="user">user</option>
         <option  class="select-selected " value="admin">admin</option>
      </select>
      </div>
  <div class="d-flex justify-content-center mb-1">
  <input  class=" ps-4 pe-4 rounded " name="submit" type="submit" value="submit">
  </div>  
   
</form>
   

</div>
</div>
</div>

</body>
</html>

