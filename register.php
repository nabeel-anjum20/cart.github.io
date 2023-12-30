<?php



include  "config.php";

if(isset($_POST['submit'])){


$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$pass = mysqli_real_escape_string($conn,md5($_POST['password']));
$cpass = mysqli_real_escape_string($conn,md5($_POST['cpassword']));




$select=mysqli_query($conn,"SELECT * FROM `user_form` WHERE email = '$email'AND password = '$pass'") or die('query failed');


if(mysqli_num_rows($select)>0)
{

$message[] = 'user already exist!';

}else{


mysqli_query($conn,"INSERT INTO `user_form`(name,email,password)VALUES('$name','$email','$pass')") or die('query failed');
$message[] = 'registered succesfully!';
header('location:login.php');

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
	<h3>register now</h3>
	<input type = "text" placeholder="username" name="name" class="box">
	<input type = "text" placeholder="email" name="email" class="box">
	<input type = "password" placeholder="password" name="password" class="box">
	<input type = "password" placeholder="confirm password" name="cpassword" class = "box">
	<input type = "submit" name = "submit" class="btn" value="register now">
    <p>already have an account?<a href="login.php">login now</a></p>	


</form>




</div>



</body>
</html>