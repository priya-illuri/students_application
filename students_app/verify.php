
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "priyanka";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$name=$_POST['username'];
$passwd=$_POST['password'];
echo $name;
echo $passwd;

$sql = "select * from users where username = '$name' ";

$query = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_array($query))
{
	echo $row['password'];
	if($passwd == $row['password']){
		session_start();
		$_SESSION['active'] = "True"; 
		header('Location: table.php');
	}
	else{
		header('Location: login.php');
	}
}
else
{
echo "not entered";
}

$conn->close();

?>
