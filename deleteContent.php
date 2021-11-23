<?php
  session_start();  
  $itemid = $_GET["id"]; 
  
		   
		   $con = mysqli_connect("localhost","root","","itemdb");
			if(!$con)
			{	
				die("Cannot upload the file, Please choose another file");		
			}
			   
			   $sql="DELETE FROM `item` WHERE `item`.`itemId` = '".$_GET["id"]."'";
			   
			  mysqli_query($con,$sql);

			 mysqli_close($con);

			   
		   header('Location:myTotebag.php');
		   
		   ?>