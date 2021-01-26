<?php
session_start();//bat session
include('inc/conn.php');
include('inc/header.php');
?>
<div class="row">
	<div class="leftcolumn">
<?php
$id= $_GET['id'];
 $spl="SELECT* FROM product WHERE id={$id}";
 $rs= mysqli_query($conn, $spl);
 while ($row= mysqli_fetch_assoc($rs)) {
 ?>
 <div class="single-product">
 	<h2 class="product-title"><?php echo$row['name']?></h2>
 	<div class="product-image"><img src="images/<?php echo $row['images']?>"></div>
 	<p class="product-price"> <?php echo $row['price']."-USD"?></p>
 	<form method="POST" action="cart1.php" class="quantity">
 		Enter the quantity:
 		<input type="number" name="quantity" value="1"><br>
 		<input type="hidden" name="id" value="<?= $id?>"><br>
 		<button type="submit" class="button-buy">Buy! </button>
 	 </form>
 	 <h2>Basic information:</h2>
 	 <div class="product-content">
 	 	<?php echo $row['content']?>
 	 </div>
 <?php 
 }
?>
		
	</div>
	
</div>
<?php
include('inc/footer.php');
?>