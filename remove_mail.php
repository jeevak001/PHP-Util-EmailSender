

<!DOCTYPE html>
<head>
<title> Title </title>
<link rel="stylesheet" href="remove_mail.css" />
<script>
	function goHome(){
		window.location = "index.php";
	}
	
	function remove(tmp){
		alert(tmp);
	}
</script>
</head>

<body> 
	<br/> <br/>
	<input type="button" value="HOME" class="home" onclick="goHome();"/>
	<h1> Remove Email Entry </h1>
	<?php
	
			$host = "localhost";
			$database = "users";
			$user = "jeeva";
			$password = "simple";
			
			$conn = mysqli_connect($host,$user,$password,$database);
			
			if(mysqli_connect_error()){
				echo "<p class='error'> Problem Removing Email , Try after a while ! </p><br/>";
			}else{
				$sql = "SELECT * FROM emails_list;";
				$result = mysqli_query($conn,$sql);
				if(!$result){
					 echo "<p class='error'> Problem Removing Email , Try after a while ! </p><br/>";
				}else{
					echo "<div id='mails'>";
					echo "<table>";
					
					while($row = mysqli_fetch_assoc($result)){
						echo "<tr>";
						echo "<td class='row'>";
						echo "<a href='remove.php?email={$row['email']}'>{$row['email']}</a>";
						echo "</td>";
						echo "</tr>";
					}
					echo "</table>";
					echo "</div>";
				}
				mysqli_close($conn);
			}
	
	
	?>
	


</body>
</html> 
