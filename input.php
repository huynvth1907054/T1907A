<?php
require_once ('help.php');

$s_name = $s_price  = '';

if (!empty($_POST)) {
	$s_id = '';

	if (isset($_POST['name'])) {
		$s_name = $_POST['name'];
	}

	if (isset($_POST['price'])) {
		$s_price = $_POST['price'];
	}

	
	if (isset($_POST['id'])) {
		$s_id = $_POST['id'];
	}

	$s_name = str_replace('\'', '\\\'', $s_name);
	$s_price      = str_replace('\'', '\\\'', $s_price);
	$s_id       = str_replace('\'', '\\\'', $s_id);

	if ($s_id != '') {
		//update
		$sql = "update maytin set name = '$s_name', price = '$s_price' where id = " .$s_id;
	} else {
		//insert
		$sql = "insert into maytin(name, price) value ('$s_name', '$s_price')";
	}

	// echo $sql;

	execute($sql);

	header('Location: index.php');
	die();
}

$id = '';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql         = 'select * from maytin where id = '.$id;
	$studentList = executeResult($sql);
	if ($studentList != null && count($studentList) > 0) {
		$std        = $studentList[0];
		$s_name = $std['name'];
		$s_price     = $std['price'];
	} else {
		$id = '';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Smatphone</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Add </h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="usr">Name:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="usr" name="name" value="<?=$s_name?>">
					</div>
					<div class="form-group">
					  <label for="birthday">Price:</label>
					  <input type="number" class="form-control" id="age" name="price" value="<?=$s_price?>">
					</div>
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>