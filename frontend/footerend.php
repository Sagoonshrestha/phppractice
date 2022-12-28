<?php
	require_once('../connect.php');
	$sql="select * from assignpmanager where parent_page= -1";
	$stored = $conn->query($sql);
	// var_dump($stored);
	$detail=[];
	while($row = $stored->fetch_assoc()){
		$detail[]=$row;
	}
	// echo "<pre>";
	// print_r($detail);
	// echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		ul{
			 list-style-type: none;
		}
		li{
			 list-style-type: none;
		}
		a{
			text-decoration:none;
		}
	</style>
</head>
<body>
	<div style=" background: orange">
		<li style="margin-left: 25px">parent page</li>
		<div>
			
			<?php foreach($detail as $r) { ?>
				<ul>
					<a href="fpagedetail.php?id=<?php echo $r['id']?>"><li><?php echo $r['page_title']?></li></a>
				</ul>
			<?php } ?>
		</div>
		<div><p style="text-align: center; ">Copyright 2021 Sagun Shrestha</p></div>
	</div>
	
</body>
</html>