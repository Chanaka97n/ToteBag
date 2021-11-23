<?php
  session_start();  
  $itemid = $_GET["id"]; 
  $title=$_POST["txtFullName"];
  $image = "uploads/".basename($_FILES["fileImage"]["name"]);
  move_uploaded_file($_FILES["fileImage"]["tmp_name"],$image);
			   
  $description=$_POST["txtContact"];
			   
			   
			   		 
		 if(isset($_POST["chkBooks"]))
		 {			 $category = "Books";		 }
		 if(isset($_POST["chkGames"]))
		 {			 $category = "Games";		 }
		  if(isset($_POST["chkMovies"]))
		 {			 $category = "Movies";	}
			   
			   if(isset($_POST["chkPublish"]))
		   {	  $status = 1;}
		   else { $status = 0;}
		   
		   
		   $con = mysqli_connect("localhost","root","","itemdb");
			if(!$con)
			{	
				die("Cannot upload the file, Please choose another file");		
			}
			   
			   $sql="UPDATE `item` SET `email` = '".$_SESSION["username"]."', `title` = '".$title."', `description` = '".$description."', `category` = '".$category."', `path` = '".$image."', `published` = '".$status."' WHERE `item`.`itemId` = ".$itemid.";";
			   
			   	if(  mysqli_query($con,$sql))
				{
						echo "File uploaded Successfully";
				}
				else
				{
					echo "Opps something is wrong, Please select the file again";
				}
			   
		   header('Location:myTotebag.php');
		   
		   ?>