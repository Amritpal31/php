<?php
$con = mysqli_connect("localhost", "root", "", "global_solutions")or die($mysqli_error($con));
if (!isset($_SESSION['email'])) {
  // code...
  session_start()or die($mysqli_error($con));
}

?>
