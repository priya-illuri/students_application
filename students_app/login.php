<html>
<?php
session_start();
if( $_SESSION['active'] == "True")
header('Location: table.php');
$_SESSION['active']="False";
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<center>
<table class="table" style="left:100px;">

<form id='login' action='verify.php' method='post' accept-charset='UTF-8'>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<tr><td class="col-xs-3">
<label for='username' >UserName* :</label></td><td>
<input type='text' name='username' id='username'  maxlength="50" /></td></tr>
<br><tr><td class="col-xs-3">
<label for='password' >Password* :</label></td><td>
<input type='password' name='password' id='password' maxlength="50" /></td></tr>
<br>
<tr><td>
<input type='submit' name='Submit' value='Login' /></td>


</form>

</table>
</center>
</html>
