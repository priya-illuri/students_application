
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

$name=$_POST['uname'];
$branch=$_POST['ubranch'];
$sec=$_POST['usec'];
$id=$_POST['urno'];
$age=$_POST['uage'];

echo $id;

$name1=$_POST['uname1'];
$branch1=$_POST['ubranch1'];
$sec1=$_POST['usec1'];
$age1=$_POST['uage1'];


if($name != $name1){
$sql="UPDATE students SET student_name = '$name' WHERE roll_num = '$id' ";
if ($conn->query($sql) === TRUE);
}

if($branch != $branch1){
$sql="UPDATE students SET branch = '$branch' WHERE roll_num = '$id' ";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
}

if($sec != $sec1){
$sql="UPDATE students SET section = '$sec' WHERE roll_num = '$id' ";
if ($conn->query($sql) === TRUE);
}

if($age != $age1){
$sql="UPDATE students SET age = '$age' WHERE roll_num = '$id' ";
if ($conn->query($sql) === TRUE);
}

$conn->close();
header('Location: table.php');
?>
