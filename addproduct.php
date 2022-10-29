<?php	
		@ $db = new mysqli('localhost', 'root', '', 'eeelectronics');
				
		if(mysqli_connect_errno()){
			echo'Error:Could not connect to database. Please try again later.';
			exit;
		}
		
		$product_id=$_POST['product_id'];
		$model=$_POST['model'];
		$picture=$_POST['picture'];
		$description=$_POST['description'];
		$price=$_POST['price'];
		$product_type=$_POST['product_type'];
		 
		
		$product= "INSERT INTO `products`(`Product_id`,`Product_Model`, `Picture`, `Description`, `Price`, `Type`) 
				VALUES ('$product_id','$model','$picture','$description','$price','$product_type')";
			
		$addproduct=$db->query($product);
		
		
		
		header('Location: adminpage.php');
		exit()
	?>