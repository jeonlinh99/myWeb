<?php
include( "../inc/conn.php");

if( $_SERVER['REQUEST_METHOD'] =='GET' && !empty($_GET['iddelete'] ) ){

	
  $iddelete =$_GET['iddelete'];
  $sql = "DELETE from product WHERE id={$iddelete} limit 1";
  if(mysqli_query($conn, $sql) ) {
  	echo "Product deleted successfully".$iddelete;
  } else {
  	echo "An error occurred:".mysqli_error($conn);
  }
}
include ("inc/header.php");
include ("listsp.php");