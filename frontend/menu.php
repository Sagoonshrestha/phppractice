
<?php 
	require_once('fheader.php');
	require_once('../connect.php');
	//print_r($conn);
	if($conn->connect_errno==0)
	{
    $sql="select * from assignpmanager where active = 'yes'" ;

    $result=$conn->query($sql);

    $detail=[];
    while($row=$result->fetch_assoc())
    {
      $detail[]=$row;
    }
    // print_r($detail);

}else{
	die('database connectionerror'.$conn->connect_errno);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>frontend page</title>
	<h1>menu</h1>
	<style>
	.vertical-menu {
	  width: 200px;
	  height: 150px;
	  overflow-y: auto;
	}

	.vertical-menu a {
	  background-color: #eee;
	  color: black;
	  display: block;
	  padding: 12px;
	  text-decoration: none;
	}

	.vertical-menu a:hover {
	  background-color: #ccc;
	}

	.vertical-menu a.active {
	  background-color: #04AA6D;
	  color: white;
	}
</style>
</head>
<body>
	<div class="vertical-menu">
		  	<a href="" class="active">MENU</a>
		  <?php foreach($detail as $d) { ?>
		 
		  <a href="click.php?id=<?php echo $d['id']?>"><?php echo $d['page_title']?></a>
	  
	<?php } ?>

</div>
</body>
</html>