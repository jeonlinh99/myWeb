<?php
include("inc/conn.php");

?>
<?php
$product_per_page = 6;
$q= mysqli_query($conn, "SELECT COUNT(ID) AS total FROM product");
$rs= mysqli_fetch_assoc($q);
$total_products = $rs['total'];
$pages= ceil($total_products/$product_per_page);
if(!empty($_GET['page']))
{
	$curent_page= $_GET['page'];
} else
{
	$curent_page=1;
}
?>
<div  class="pagination-wrap">
	<div class="pagination">
		<?php for ($i=0; $i<$pages;$i++)
		{
		?>
		<a href="index1.php?page= <?= $i+1?>"
			<?php
			if ($curent_page==($i+1)) 
			{
				echo "class='active'";# code...
			}else {
				echo"";
			}
			?>
		>

		<?php  echo $i+1 ?></a>
	<?php } ?>
	</div>
</div>