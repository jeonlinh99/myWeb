
<?php
// define ariables and set to empty values
$usernameErr= $passErr="";
$username= $password= "";
session_start();
if($_SERVER ["REQUEST_METHOD"] =="POST")
{
 include('../inc/conn.php');

if (empty($_POST["username"])) 
{
$usernameErr= "Name is required";
}else{
	$username = test_input($_POST['username']);
}
if(empty($_POST["password"])){
	$passErr= "Pass is required";
} else{
	$password=test_input($_POST['password']);
}

$sql= "SELECT * FROM user  WHERE username= '{$username}' AND password= '{$password}'";
$user= mysqli_fetch_assoc(mysqli_query($conn,$sql));
if($user){
	// luu thong tin cua nguoi dung
	$_SESSION['user'] = $user['username'];
	header('location:index.php');
	// dua nguoi dung ve trang index.php
	die;
}else{
	echo"Wrong account information!";
}
}


function test_input($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data= htmlspecialchars($data);
	return $data;
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Management</title>
	<link rel="stylesheet" type="text/css" href="asset/adminlogin.css">
</head>
<body>
<div class="admin">ADMIN MANAGEMENT</div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
Username: <input type="text" name="username" value="" id="username">
<span class="error">* <?php echo $usernameErr;?>
</span>
<br> <br>
PassWord: <input type="password" name="password" value="" id="pass">
<span class="error">* <?php echo $passErr;?>
</span>
<br> <br>
<input type="submit" name="submit" value="Login" id="login">
</form>
</body>
<div class="footer"> </div>
</html>