<?php
require_once('../connect.php');
if($conn->connect_errno == 0){
	 $sql = "select * from newsmanager limit 3";
	 $store = $conn->query($sql); 
	 //  $count=mysqli_num_rows($store);
	 // echo($count);
	 $detail = [];
	 while($row=$store->fetch_assoc()){
	 	$detail[] = $row; 
	 }
	

}
// echo '<pre>';
// print_r($detail);
// echo '</pre>';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<h1>News</h1>
	<style type="text/css">
		.flex-container {
    		display: flex;
    		overflow-x: auto;
		}

		.flex-child {
		    flex: 1;
		    border: 2px solid yellow;
		    margin-right: 20px;
		}
		a{
			text-decoration: none;
			/*color: black;*/
		}
		#button{
			background:rgb(123, 177, 61);
			color: rgb(255, 255, 255);
			border: none;
    		border-radius: 3px;
    		padding:5px;
		}
		   
		/*.flex-child:first-child {
    		
		} */
	</style>
</head>
<body>
	
	<div class="flex-container">
		<?php foreach($detail as $d){ //echo $d['newsimage']; ?>
		<!-- <a href="fnewsdetail.php?id=<?php echo $d['id']?>"> -->
		<div class= "flex-child">
			<img src="../<?php echo $d['newsimage'];?>" width="200px" height="200px" >
			<label>news title:</label>
			<?php echo $d['news_title']?>
			<br><br>
			<label>news content:</label>
			<?php  $str = $d['news_content'];
			echo(substr($str,0,20).'...');
			?>
			<a href="fnewsdetail.php?id=<?php echo $d['id']?>">read more</a>
			<br><br>
			
		</div>
		
		<?php } ?>
		<a href="viewallnews.php" style="align-self: center">	VIEW ALL NEWS </a>
	</div>
	<div style="text-align: center; padding: 10px">
		<input type="button" name="button" value="subscribe News"  id='button' onclick="window.location.href = 'subscribe.php'">
	</div>
</body>
</html>