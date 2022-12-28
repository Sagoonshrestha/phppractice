<?php
	// require_once('menu.php');
	require_once("../connect.php");
	if(isset($_GET['id'])){
			$id=$_GET['id']; 
		} else{
			$id=64;
		}

	if($conn->connect_errno==0){

		$sql="select * from assignpmanager where id='$id'";

		$result = $conn->query($sql);
		$detail=[];
		while($row=$result->fetch_assoc()){
			$detail[]=$row;
		}
	}
	else{
		die('database connectionerror'.$conn->connect_errno);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>click page</title>
	
</head>
<body>
	<div>
		
		<?php foreach ($detail as $d) { ?>
		<label>Page title:</label>
		<?php echo $d['page_title'];?>
		<br><br>
		<label>Page title:</label>
		<?php echo $d['page_description'];?>
		<br><br>
		<label>Image</label>
		<br><br>
		<?php $imgarray = explode(',', $d['page_image']);
		foreach ($imgarray as $imgsource ) { ?>
		 

		<img src="../<?php echo($imgsource);?>" width='400px;' height='400px;'>
		<?php } ?>
		
	<?php print_r($d['page_image']); } ?>
		
	</div>

</body>
</html>