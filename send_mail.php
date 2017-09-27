<?php 
	if (isset($_POST['submit'])){
		
		$title = $_POST['title'];
		$from = $_POST['from'];
		$content = $_POST['content'];
		$password = $_POST['password'];
		
		if( $title == "" && $content == "" ){
			echo "<p class='error'> Nothing to send ! Mention the content ! </p><br/>";
		}else{
			
			$host = "localhost";
			$database = "users";
			$user = "jeeva";
			
			//Password is simpleashell1
			
			$conn = mysqli_connect($host,$user,$password,$database);
			
			if(mysqli_connect_error()){
				echo "<p class='error'> Problem Sending Email , Try after a while ! </p><br/>";
			}else{
				$sql = "SELECT email FROM emails_list;";
				$result = mysqli_query($conn,$sql);
				if(!$result){
					 echo "<p class='error'> Problem Sending Email , Try after a while ! </p><br/>";
				}else{
					while($row = mysqli_fetch_assoc($result)){
						mail($row['email'],$title,$content,"From:{$from}");
					}
					echo "<p class='success'> Emails Sent !  </p><br/>";
				}
				mysqli_close($conn);
			}
		}
		
	}


?>

<!DOCTYPE html>
<head>
<title> Title </title>
<link rel="stylesheet" href="send_mail.css" />
<script>
	function goHome(){
		window.location = "index.php";
	}
</script>
</head>

<body> 
	<br/> <br/>
	<input type="button" value="HOME" class="home" onclick="goHome();"/>
	<h1> Send Email </h1>
	

	<form action="send_mail.php" method="POST" id="form" autocomplete = off>

		<div id="left">
			<label for="password"> Enter Password : </label> <br/><br/>
			<label for="f_name"> Enter Title : </label> <br/><br/>
			<label for="l_name"> Enter From : </label> <br/><br/>
			<label for="email"> Enter Content : </label> <br/><br/>
		</div>

		<div id="right">
			<input class="input" type="password" name="password" id="password" /> 	<br/><br/>
			<input class="input" type="text" name="title" id="title" /> 	<br/><br/>
			<input class="input" type="text" name="from" id="from" /> 	<br/><br/>
			<textarea class="input" rows="10" cols="10" id="content" name="content" ></textarea> 		<br/><br/>
		</div>
		
		
	<input type="submit" value="Send Email" class="button" name="submit"/>
	</form>

</body>
</html> 
