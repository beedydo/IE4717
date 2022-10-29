<?php
// create short variable names
	$hse = $_POST['hseprice'];
	$singleau= $_POST['singleauprice'];
	$doubleau = $_POST['doubleauprice'];
	$singlecap = $_POST['singlecapprice'];
	$doublecap = $_POST['doublecapprice'];
  
	@ $db = new mysqli('localhost', 'root', '', 'javajam');
	
	$query="select * from price ";
	$result=$db->query($query);
	$num_results=$result->num_rows;
	
	for($i=0;$i<$num_results;$i++){
		$row=$result->fetch_assoc();
		
		switch($i){ 
			case(0):
				if (isset($_POST['changehse'])){
					$sql="Update Price set `Price`=$hse where `Type`='House' ";
					$row["Price"]=$sql;
				}
				break;
			case(1):
				if (isset($_POST['changesingau'])){
					$sql="Update Price set `Price`=$singleau where `Type`='SingleAu' ";
				}
				break;
			case(2):		
				if (isset($_POST['changedoubau'])){
					$sql="Update Price set `Price`=$doubleau where `Type`='DoubleAu' ";
				}
				break;
			case(3):
				if (isset($_POST['changesingcap'])){
					$sql="Update Price set `Price`=$singlecap where `Type`='SingleCap' ";
				}
				break;
			case(4):
				if (isset($_POST['changedoubcap'])){
					$sql="Update Price set `Price`=$doublecap where `Type`='DoubleCap' ";
				}
				break;
		}
	}
	

	
	for($i=0;$i<$num_results;$i++){
		$row=$result->fetch_assoc();
		
		switch($i){ 
			case(0):
				$hse=$row["Price"];
				break;
			case(1):
				$singleau =$row["Price"];
				break;
			case(2):
				$doubleau =$row["Price"];
				break;
			case(3):
				$singlecap =$row["Price"];
				break;
			case(4):
				$doublecap =$row["Price"];
				break;
		}
	}
	$db->close();

?>