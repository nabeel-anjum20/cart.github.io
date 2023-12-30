<?php



include  "config.php";
session_start();

if(isset($_POST['submit'])){


$email = mysqli_real_escape_string($conn,$_POST['email']);
$pass = mysqli_real_escape_string($conn,md5($_POST['password']));





$select=mysqli_query($conn,"SELECT * FROM `user_form` WHERE email = '$email'AND password = '$pass'") or die('query failed');


if(mysqli_num_rows($select)>0)
{
  $row = mysqli_fetch_assoc($select);
  $_SESSION['user_id'] = $row['id'];
  header('location:index.php');


}else{

$message[] = 'incorrect password or email!';


}


}



?>





<html>
<head>
	<link rel="stylesheet" href="style.css">
</head>	
<body>
	
<?php

if(isset($message)){

foreach($message as $message){


echo '<div class = "message" onclick="this.remove();">'.$message.'</div>';


}

}

?>



<div class = "form-container">
	
<form action = "" method = "POST">
	<h3>Login now</h3>
	<input type = "text" placeholder="email" name="email" class="box">
	<input type = "password" placeholder="password" name="password" class="box">
	<input type = "submit" name = "submit" class="btn" value="login now">
    <p>dont't have an account?<a href="register.php">register now</a></p>	


</form>




</div>



</body>
</html>