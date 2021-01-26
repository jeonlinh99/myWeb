<?php
include("../inc/conn.php");
if($_SERVER ["REQUEST_METHOD"]=="POST")
{
$name= $_POST['name'];
$price=$_POST['price'];
$content=$_POST['content'];


	// khoi tao doi tuong product
	$sql= "INSERT INTO product ( name, content,price) VALUES ( ?, ?, ?)";
	$stmt= mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "ssd", $name, $content, $price);
	if(mysqli_stmt_execute($stmt)){
		echo "Add product successfuly!";
	}else{
		echo "Error:" .mysqli_error($conn);

	}
}
?>
<?php require 'inc/header.php';?>
<!-- form add product. -->
<form class="form" method="post" enctype="multipart/form-data">
	    <label>Enter the product name </label>
		<input type="text" name="name" value=""/>
		<label>Enter the product price</label>
		<input type="number" name="price" value="">
		<label>Enter product description</label>
		<textarea name="content" cols="21" rows= "10" value=""></textarea>
		<label>Choose the image for product</label>
	    <input type="file" name="images" accept=".PNG,.GIF, .JPG,.JPGEG" >
		<input type="submit" name="submit" value="Add New Product ">
	</form>





