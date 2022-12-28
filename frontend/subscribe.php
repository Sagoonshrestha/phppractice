<?php
	require_once('../connect.php');
	if(isset($_POST['submit'])){
		if(isset($_POST['name']) && $_POST['name'] !=''){
			$name = $_POST['name'];
		}
		if(isset($_POST['email']) && $_POST['email'] !=''){
			$email = $_POST['email'];
		}
		$date= date("jS \of F Y");

		if(isset($_POST['name']) && isset($_POST['email'])){
			$sql = "insert into subscribe (name, email,date_time) values(?,?,? )";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('sss',$name,$email,$date);
			$stmt->execute();
			$stmt->close();
			$conn->close(); 


		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>subscribe</title>
	<h1>subscribe</h1>
</head>
<body>
	<div>
		<form action="" method="post">
			<label>Name</label>
			<input type="text" name="name">
			<br><br>
			<label>Email:</label>
			<input type="text" name="email">
			<br><br>
			
			<input type="submit" name="submit" value="subscribe">
		</form>

	</div>
	<!-- <?php echo "<br><h1>success</h1>"; ?> -->
</body>
</html>