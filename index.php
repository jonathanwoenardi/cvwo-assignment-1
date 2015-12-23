<html>
<head>
<title> Polaroid </title>
</head>
<body>
<div>
<table>
<tr>
	<td>
		<form action="/index.php">
    		<input type="submit" value="Timeline">
		</form>
	</td>
	<td>
		<form action="/register.php">
    		<input type="submit" value="Register">
		</form>
	</td>
	<td>
		<form action="/login.php">
    		<input type="submit" value="Log In">
		</form>
	</td>
<table>
</div>
This is timeline
<?php
if($_SESSION['username'])
{
	echo "You are ".$_SESSION['username'];	
}
?>
</body>
</html>
