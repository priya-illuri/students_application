
<html>
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
<?php

$id=$_POST['id'];
$name1=$_POST['name'];
$sec1=$_POST['sec'];
$branch1=$_POST['branch'];
$age1=$_POST['age'];
session_start();
$ses= $_SESSION['active'];
if($ses != "True")
 {
	header('Location: login.php');
 }
?>
<form action="edit.php" method="post">
<tr><td>
Name:</td><td> <input type="text" name="name" value="<?php echo $name1 ?>"><br>
</tr></td>
<tr><td>
Roll no:</td><td> <input type="label" name="rno" value="<?php echo $id ?>"><br>
</tr></td>
<tr><td>
Branch: </td><td><input type="text" name="branch" value="<?php echo $branch1 ?>"><br>
</tr></td>
<tr><td>
Section:</td><td> <input type="text" name="sec" value="<?php echo $sec1 ?>"><br>
</tr></td>
<tr><td>
Age: </td><td><input type="text" name="age" value="<?php echo $age1 ?>"><br>
</tr></td>
<tr><td>
<input type="submit" value="Edit">
</tr></td>
<input type="hidden" name="name1" value='.$name1.'>
    <input type="hidden" name="sec1" value='.$sec1.'>
    <input type="hidden" name="branch1" value='.$branch1.'>
    <input type="hidden" name="age1" value='.$age1.'>

</form>

</table>
</center>
</body>
</html>

