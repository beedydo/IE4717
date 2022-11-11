<?php	
	include '..\dbconnect.php';
	
	$product_id=$_POST['product_id'];
	$model=$_POST['model'];
	$picture=$_POST['picture'];
	$description=$_POST['description'];
	$price=$_POST['price'];
	$product_type=$_POST['product_type'];
	$stock=$_POST['stock'];
	 
	
	$product= "INSERT INTO `products`(`Product_id`,`Product_Model`, `Picture`, `Description`, `Price`, `Type`,`Stock`) 
			VALUES ('$product_id','$model','$picture','$description','$price','$product_type','$stock')";

	$addproduct=$db->query($product);
	
	header('Location:../adminpage.php');
	exit();
?>