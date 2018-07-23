
<?php
session_start();
$ses= $_SESSION['active'];
if($ses != "True")
{
	header('Location: login.php');
}
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
$name=$_POST['name'];
$branch=$_POST['branch'];
$sec=$_POST['sec'];
$rno=$_POST['rno'];
$age=$_POST['age'];
$sql = "insert into students (student_name,branch,section,roll_num,age) values ('$name','$branch' ,'$sec','$rno' ,'$age')";
//$sql = "insert into students (student_name,branch,section,roll_num,age) values ('vicky','eee','a','12','20')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: table.php'); 
?>
