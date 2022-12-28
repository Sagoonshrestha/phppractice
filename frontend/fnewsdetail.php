<?php 
require_once('../connect.php');
require_once('fheader.php');
$pt=$_GET['id'];
$sql="select * from newsmanager where id='$pt'";
$result = $conn->query($sql);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
// echo '<pre>';
// print_r($row);
// echo'</pre>'
?>
<!DOCTYPE html>
<html>
<head>
	<title>page detail</title>
	<h1>page detail</h1>
</head>
<body>
	<div>
		<label>Id:</label>
		<?php echo $row['id']?>
		<br><br>
		<label>News Title:</label>
		<?php echo $row['news_title']?>
		<br><br>
		<label>News Content:</label>
		<?php echo $row['news_content']?>
		<br><br>
		<label>Seo Title :</label>
		<?php echo $row['seo_title']?>
		<br><br>
		<label>Meta Title :</label>
		<?php echo $row['meta_title']?>
		<br><br>
		<label>Meta Keyword: </label>
		<?php echo $row['meta_keyword']?>
		<br><br>
		<label>News date:</label>
		<?php echo $row['newsdate']?>
		<br><br>
		<label>Active:</label>
		<?php echo $row['active']?>
		<br><br>
		<label>Image :</label>
		<br><br>
		<img src="../<?php echo $row['newsimage']?>">

	</div>
	<?php require_once('footerend.php')?>
</body>
</html>