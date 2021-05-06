<?php

require("includes/common.php");

$email = $_POST['e-mail'];
$email = mysqli_real_escape_string($con, $email);
$password = $_POST['password'];
$password = mysqli_real_escape_string($con, $password);
$password = MD5($password);
// Query checks if the email and password are present in the database.
$query = "SELECT id, email FROM users WHERE email='" . $email . "' AND password='" . $password . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
// If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $num.
if ($num == 0) {
  $error = "<span class='red'>Please enter correct E-mail id and Password</span>";
  header('location: login.php?error=' .$error);
} else {
  $row = mysqli_fetch_array($result);
  $type_query="SELECT user_type FROM users WHERE id=".$row['id'];
  $result = mysqli_query($con, $type_query)or die($mysqli_error($con));
  $type=mysqli_fetch_array($result);
  if($type['user_type']=='user')
  {
    $_SESSION['email'] = $row['email'];
    $_SESSION['user'] = $row['id'];
    header('location: products.php?cat=all-products');
  }
  else{
    $_SESSION['email'] = $row['email'];
    $_SESSION['admin'] = $row['id'];
    header('location: admin/home.php');
  }
}

/*if(mysqli_num_rows($result)==1){

    $_SESSION['message']="You are now logged in.";
    $_SESSION['e-mail'] = $row['email'];
    $_SESSION['user_id'] = $row['id'];

    header("location:loginhome.php");
}
else{
    $_SESSION['message']="Incorrect Username or Password.";
    header("location:login.php");
    echo '<h3>Invalid username or password</h3>';
}*/
?>