<?php
include('inc/conn.php');
include('inc/header.php');
?>
<div class="row">
   <div class="leftcolumn">
    <?php 
    if (!empty($_GET['page']))
    {
      $page =$_GET['page']-1;
      # code...
    }
    else
    {
      $page=0;

    }
    $product_per_page =6;
    $offset= $product_per_page*$page;
    $sql= " SELECT *FROM product LIMIT $offset, $product_per_page";
    $rs = mysqli_query($conn, $sql);
    if (mysqli_num_rows($rs) >0)
     {
      while ($row= mysqli_fetch_assoc($rs))
      {
    ?>
  <a href="single-product1.php?id=<?php echo $row['id']?>" class="product">
    <h2 class="product-title"> <?php echo $row['name']?></h2>
    <div  class="product-image"> <img src="Images/<?php echo $row['images']?>"/> </div>
    <p class="product-price"> <?php echo $row['price'] .
    "-USD"?></p>
  </a>
  <?php
      }  //end while
    }// check so hang tra ve>0
  ?>
  <?php include('inc/pagination.php');?>
</div>
<!--end left column-->
<?php
include ('inc/footer.php');
?>