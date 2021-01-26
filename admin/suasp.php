<?php 
include( "../inc/conn.php" );


if(   $_SERVER['REQUEST_METHOD'] == 'POST' ){

	$id = $_GET['id'];
	$name = $_POST['name'];
	$price= $_POST['price'];
	$content =$_POST['content'];

	$file = $_FILES['images']; // 1 mang chua thong tin file da upload  

	//chỉ update file nếu người dùng có chọn file upload.

	if( !empty( $file ) ){
		$nameFile = rand() . $file['name']; //asdasd232anh.jpg cho hai file trong thu muc khong bi trung=>ten file luu trong server
		if( move_uploaded_file($file['tmp_name'], "../images/" . $nameFile ) ){

			$sql = "UPDATE product SET images=? WHERE id=? "; //php prepare statement
			$stmt = mysqli_prepare($conn ,$sql);
			mysqli_stmt_bind_param( $stmt, "sd" , $nameFile, $id );
			mysqli_stmt_execute($stmt);
			echo "Update image successuflly! <br/>";

		}
		else{
			echo "";
		}	
	}
	


	// $anh = $_POST['anhsp'];
	//$q = "UPDATE product SET tieude =  , noidung = $noidung , anh ='{$anh}' "; //gay co kha nang loi sql injection + gay kho viet 
	// mysqli_query($conn , $q);


	$sql = "UPDATE product SET name=?, content=?, price=?  WHERE id=? "; //php prepare statement
	$stmt = mysqli_prepare($conn ,$sql);
	mysqli_stmt_bind_param( $stmt, "ssdd" , $name, $content, $price, $id );

	//s = string 
	// d = double 
	// i = integer
	if( mysqli_stmt_execute($stmt) ) {
		echo "Update product successuflly! ";
	}else{
		echo "error : " . mysqli_error($conn);//ham lay loi gan nhat cua connection sinh ra
	}


}// POST 

//lay id san pham 


$id = $_GET['id'];
$sql = mysqli_query( $conn , "SELECT * FROM product WHERE id={$id}" );
$row =  mysqli_fetch_assoc($sql);
include ("inc/header.php");
?>
	<h2> Edit product: <?= $row['name'] ?> </h2>

	<!-- phai co ectype="multipart/form-data" thi moi upload dc file len server  -->
	<form class="form" method="post" enctype="multipart/form-data">
	  <label>Enter the product name </label>
		<input type="text" name="name" value="<?= $row['name'] ?>"/>
		<label>Enter the product price</label>
		<input type="number" name="price" value="<?= $row['price'] ?>">

		<label>Enter product description</label>
		<textarea name="content"><?= $row['content']?></textarea>
		<label>Choose the image for product</label>
		<img class="anhsp" src="../images/<?= $row['images']?>" />
	    <input type="file" name="images" >
		<input type="submit" name="submit" value="Update ">
	</form>

