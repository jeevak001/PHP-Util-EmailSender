<?php 
	if (isset($_POST['submit'])){
		
		$first_name = $_POST['f_name'];
		$last_name = $_POST['l_name'];
		$email = $_POST['email'];
		
		//echo "<span class='error'> Got Data First Name :{$first_name}, Last Name :{$last_name} and Email :{$email} </span><br/>";	
		
		if($first_name == "" || $last_name == "" || $email == ""){
			echo "<p class='error'> First Name,Last Name and Email are required fields ! </p><br/>";
		}else{
			
			$host = "localhost";
			$database = "users";
			$user = "jeeva";
			$password = "simple";
			
			$conn = mysqli_connect($host,$user,$password,$database);
			
			if(mysqli_connect_error()){
				echo "<p class='error'> Problem Adding Email , Try after a while ! </p><br/>";
			}else{
				$sql = "INSERT INTO emails_list (f_name,l_name,email) VALUES ('{$first_name}','{$last_name}','{$email}');";
				$result = mysqli_query($conn,$sql);
				if(!$result){
					 echo "<p class='error'> Problem Adding Email , Try after a while ! </p><br/>";
				}else{
					echo "<p class='success'> Email {$email} Added ! </p><br/>";
				}
				mysqli_close($conn);
			}
		}  
	}


?>

<!DOCTYPE html>
<head>
<title> Title </title>
<link rel="stylesheet" href="add_mail.css" />
<script>
	function goHome(){
		window.location = "index.php";
	}
</script>
</head>

<body> 
	<br/> <br/>
	<input type="button" value="HOME" class="home" onclick="goHome();"/>
	<h1> Add Email Entry </h1>
	

	<form action="add_mail.php" method="POST" id="form" autocomplete = off>

		<div id="left">
			<label for="f_name"> Enter First Name : </label> <br/><br/>
			<label for="l_name"> Enter Last Name : </label> <br/><br/>
			<label for="email"> Enter Email ID : </label> <br/><br/>
		</div>

		<div id="right">
			<input class="input" type="text" name="f_name" id="f_name" /> 	<br/><br/>
			<input class="input" type="text" name="l_name" id="l_name" /> 	<br/><br/>
			<input class="input" type="email" name="email" id="email" /> 		<br/><br/>
		</div>
		
		<input type="submit" value="Add Email" class="button" name="submit"/>

	</form>

</body>
</html> 
