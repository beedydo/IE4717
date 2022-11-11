<?php	
	session_start();
	include "dbconnect.php";

// declare variables
	if(isset($_POST['update'])){
		$update_name=$_POST['update_name'];
		$update_username=$_POST['update_username'];
		$update_password=md5($_POST['update_password']);
		$update_email=$_POST['update_email'];

		$temp=$_SESSION['valid_user'];
		$query="select Customer_id from registered_users where user_name='$temp'";
		$result=$db->query($query);
		$row=$result->fetch_assoc();
		
		$User_Id=$row['Customer_id'];
		
		for($i=0;$i<4;$i++){
			switch($i){ 
				case(0):
					if ($_POST['update_name']){
						$update="Update registered_users set `display_name`= '$update_name' where Customer_id='$User_Id' ";
						$db->query($update);
					}
					break;
				case(1):
					if ($_POST['update_password']){
						$update="Update registered_users set `Password`= '$update_password' where Customer_id='$User_Id'";
						$db->query($update);
					}
					break;
				case(2):		
					if ($_POST['update_email']){
						$update="Update registered_users set `email`= '$update_email' where Customer_id='$User_Id' ";
						$db->query($update);
					}
					break;
				case(3):
					if ($_POST['update_username']){
						$update="Update registered_users set `user_name`= '$update_username' where Customer_id='$User_Id' ";
						$db->query($update);
						$_SESSION['valid_user']=$update_username;
					}
					break;
			}
		}
		$_SESSION['updated']='updated';	
		header("Location: profile.php");
	}
	$db->close();

?>