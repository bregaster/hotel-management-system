<?php


include ('db.php');

			
			$id =$_GET['eid'];		
			$newsql ="DELETE FROM `login` WHERE id ='$id' ";
			if(mysqli_query($con,$newsql))
				{
				echo	'<script>alert("Username dan Password telah dihapus")</script>';
					
						
				}
			header("Location: usersetting.php");
		
?>


