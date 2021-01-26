<?php
session_start();
 include('inc/conn.php');
 include('inc/header.php');

 if ($_SERVER['REQUEST_METHOD']=='POST')
  {
 	$id= $_POST['id'];
 	if(empty($_SESSION['cart'] ['id'])){
 		$q= mysqli_query($conn, "SELECT *FROM product WHERE id={$id}");
 		$product= mysqli_fetch_assoc($q);
 		$_SESSION['cart'] [$id]= $product;
 		$_SESSION['cart'] [$id] ['quantity'] =$_POST['quantity'];
 	}
 	else {
 		$newquan=$_SESSION['cart'] ['$id'] ['quantity'] + $_POST['quantity'];
 		$_SESSION['cart'] ['$id'] ['quantity']= $newquan;
 	}
 }
 ?>
 <div  class="row">
 	<link rel="stylesheet" type="text/css" href="Css/card.css">
 	<div class="leftcolumn">
 		<h3 style="text-align: center;" class="title"> Shopping Cart</h3>
 		<?php
 		if(!empty($_SESSION['cart']))
 			foreach ($_SESSION['cart'] as 
 				$item):
 		?>
 		<a href="single-product1.php?id=<?php echo $item['id']?>" class="product">
 			<h2 class="product-title"> <?php echo $item ['name'] ?></h2>
 			<div class="product-image"> <img src="Images/<?php echo $item ['images'] ?>"/></div>
 			<p class="product-price"> <?php echo $item['price']."-USD "?></p>
 			<p class="quantity"> Quantity: <?php echo $item['quantity']?></p>
 		</a>
 		<?php
 	endforeach;
 	else{
 		echo "There are no items in your shopping cart.";}
 	?>
 	<div id="total" class="clearfix">
 		<?php 
 	$sum= 0;
 	foreach ($_SESSION['cart'] as $item) {
 		$sum= $sum +($item['quantity'] * $item['price']);
 	}
 	?>
 	<h3> Total money: <?php echo number_format($sum) ?>-USD</h3>
 	</div>
 	</div>
 </div>
 <?php
 include('inc/footer.php');
  ?>