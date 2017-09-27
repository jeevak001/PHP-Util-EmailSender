<!DOCTYPE html>
<head>
<title> Title </title>
<link rel="stylesheet" href="main.css" />

<script>

	function addMail(){
		window.location = "add_mail.php";
	}
	
	function sendMail(){
		window.location = "send_mail.php";
	}
	
	function removeMail(){
		window.location = "remove_mail.php";
	}

</script>

</head>
<body> 



<div id="wrapper">
<h1>  Mail Sending Application </h1>
	<div class="button_display">
		<input class="button" type="button" value="Add Email" onclick="addMail();"/>
	</div>

	<div class="button_display">
		<input class="button" type="button" value="Send Email" onclick="sendMail();"/>
	</div>
	
	<div class="button_display">
		<input class="button" type="button" value="Remove Email" onclick="removeMail();"/>
	</div>
</div>
</body>
</html> 
