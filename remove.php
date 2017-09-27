

<!DOCTYPE html>
<head>
<title> Title </title>
<link rel="stylesheet" href="remove_mail.css" />
<script>
	function goHome(){
		window.location = "index.php";
	}
	
</script>
</head>

<body> 
	<br/> <br/>
	<input type="button" value="HOME" class="home" onclick="goHome();"/>
	<?php
	
			$host = "localhost";
			$database = "users";
			$user = "jeeva";
			$password = "simple";
			$email = $_GET['email'];
			
			$conn = mysqli_connect($host,$user,$password,$database);
			if(mysqli_connect_error()){
				echo "<p class='error'> Problem Removing Email , Try after a while ! </p><br/>";
			}else{
				$sql = "DELETE FROM emails_list WHERE email = '{$email}';";
				$result = mysqli_query($conn,$sql);
				if(!$result){
					 echo "<p class='error'> Problem Removing Email , Try after a while ! </p><br/>";
				}else{
					if(mysqli_affected_rows($conn) == 0){
						echo "<p class='error'> No Email ID exists ! </p><br/>";
					}else{
						echo "<p class='error'> Email ID removed successfully ! </p><br/>";
					}
					
				}
				mysqli_close($conn);
			}
	
	
	?>
	


</body>
</html> 
