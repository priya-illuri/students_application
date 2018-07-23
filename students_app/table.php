<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'priyanka'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
if(isset($_POST['search']))
{
	$valueToSearch=$_POST['valueToSearch'];
	$sql = "SELECT * FROM students where student_name = '$valueToSearch' ";
	$query = mysqli_query($conn, $sql);
}
else
{
	$sql = "SELECT * FROM students";
	$query = mysqli_query($conn, $sql);
}
		
//$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<title>Displaying MySQL Data in HTML Table</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
		.popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* The actual popup */
.popup .popuptext {
    visibility: hidden;
    width: 160px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
    content: "";
    position: absolute	;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

	</style>

<script>
<?php $del=0 ?>
// When the user clicks on div, open the popup
function myFunction(arg) {
     document.getElementById('details').innerHTML = "U selected : " +arg;
}

function update(n,b,s,a,r){
     console.log(n,b,s,a,r);
     document.getElementById('uname').value=n;
     document.getElementById('ubranch').value=b;
     document.getElementById('usec').value=s;
     document.getElementById('uage').value=a;
     document.getElementById('urno').value=r;
	 document.getElementById('uname1').value=n;
     document.getElementById('ubranch1').value=b;
     document.getElementById('usec1').value=s;
     document.getElementById('uage1').value=a;
}

function redirect(arg){
alert(arg)

document.location.href='delete.php'
}
function deleteRow(arg){
	document.header('Location: delete.php');
}

function confirmDelete() {
    if (confirm("confirm Delete!")) {
	 return True;
    } else {
        return False;
    }

}


</script>
</head>
<body>
	<div class="col-xs-3"></div>
	<form class="col-xs-6" style="top:50px;" method="POST" action="" >
	<input type="text" name="valueToSearch" class="col-xs-8" placeholder="Value To Search">
	<div class="col-xs-1"></div>
	<input type="submit" class="col-xs-3" name="search" value="Search"><br><br>
	</form>
	<table class="data-table">
		<caption class="title"><h4>Students Data</h4></caption>
		<thead>
			<tr>
				<th>NO</th>
				<th>NAME</th>
				<th>BRANCH</th>
				<th>SECTION</th>
				<th>AGE</th>
				<th>ROLL NUM</th>
				<th>Details</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		<?php
		
		session_start();
		$ses= $_SESSION['active'];

		if($ses != "True")
		 {
			header('Location: login.php');
		 }
		$no 	= 1;
		$total 	= 0;
		while ($row = mysqli_fetch_array($query))
		{
			$name=$row['student_name'];
			$space=" ";
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['student_name'].'</td>
					<td>'.$row['branch'].'</td>
					<td>'.$row['section'].'</td>
					<td>'.$row['age'].'</td>	
					<td>'.$row['roll_num'].'</td>
					<td><p onclick= myFunction(\''.$row[student_name].$row[branch].$row[section].$row[age].$row[roll_num].'\')>view details</p></td>

<td><a href="" class="btn btn-default btn-rounded mb-4" onclick="update(\''.$row[student_name].'\',\''.$row[branch].'\',\''.$row[section].'\',\''.$row[age].'\',\''.$row[roll_num].'\')" data-toggle="modal" data-target="#modalUpdateForm"> Update </a></td>

					<td><form method="post" action="delete.php" onsubmit="return confirmDelete();">
    <input type="hidden" name="delconfrm" id="confirm">
    <input type="hidden" name="id" value='.$row['roll_num'].'>
    <input type="submit"  value="delete">
</form>
</td>
 </tr>';

			$no++;
		}

?>
		</tbody>
		
	</table>
	<br>		
	<center><h4><div id='details'></div></h4>

	<input type="button" class="btn btn-default btn-rounded mb-4" onclick="document.location.href='login.php'" value="Logout"></center>
	
	
<div class="text-center">
    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalAddForm"> Add </a>
</div>


<div class="modal fade" id="modalAddForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold"> Add </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
<form method="post" action="welcome.php">
            <div class="modal-body mx-3">
		
                <div class="md-form mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
			                    <label data-error="wrong" data-success="right" for="defaultForm-email">Username</label>
                    <input type="text" name="name" class="form-control validate">

                </div>

		<div class="md-form mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Roll No</label>
                    <input type="text" name="rno" class="form-control validate">

                </div>
		
		<div class="md-form mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Branch</label>
                    <input type="text" name="branch" class="form-control validate">

                </div>
		
		<div class="md-form mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Section</label>
                    <input type="text" name="sec" class="form-control validate">

                </div>

		<div class="md-form mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Age</label>
                    <input type="text" name="age" class="form-control validate">

                </div>

               

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <input type="submit" value="Add" ></button>
            </div>

        </div>
</form>
    </div>
</div>


<div class="modal fade" id="modalUpdateForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold"> Update </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
<form method="post" action="e.php">
            <div class="modal-body mx-3">
		
                <div class="md-form mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Username</label>
                    <input type="text" name="uname" id="uname" class="form-control validate">

                </div>

		<div class="md-form mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Roll No</label>
                    <input type="text" name="urno" id="urno" class="form-control validate">

                </div>
		
		<div class="md-form mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Branch</label>
                    <input type="text" name="ubranch" id="ubranch" class="form-control validate">

                </div>
		
		<div class="md-form mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Section</label>
                    <input type="text" name="usec" id="usec" class="form-control validate">

                </div>

		<div class="md-form mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Age</label>
                    <input type="text" name="uage" id="uage" class="form-control validate">

                </div>       
					<input type="hidden" name="uname1" id="uname1">
					<input type="hidden" name="uage1" id="uage1">
					<input type="hidden" name="usec1" id="usec1">
					<input type="hidden" name="ubranch1" id="ubranch1">

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <input type="submit" value="Update"></button>
            </div>
			

        </div>
</form>
    </div>
</div>


<br>


</body>
</html>
?>

