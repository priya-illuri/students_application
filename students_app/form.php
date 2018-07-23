<html>
<?php
session_start();
$ses= $_SESSION['active'];
if($ses != "True")
		 {
			header('Location: login.php');
		 }
?>
<head>
<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			padding:30px;
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 20px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
			padding:5px;
		}
		</style>
</head>
<body>
<center>
<table>

<form action="welcome.php" method="post">
<tr><td>
Name:</td><td> <input type="text" name="name"><br>
</tr></td>
<tr><td>
Roll no:</td><td> <input type="text" name="rno"><br>
</tr></td>
<tr><td>
Branch: </td><td><input type="text" name="branch"><br>
</tr></td>
<tr><td>
Section:</td><td> <input type="text" name="sec"><br>
</tr></td>
<tr><td>
Age: </td><td><input type="text" name="age"><br>
</tr></td>
<tr><td>
<input type="submit">
</tr></td>


</form>

</table>
</center>
</body>
</html>
