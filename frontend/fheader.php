<?php
	require_once('../connect.php');
	if($conn->connect_errno==0){
		$sql="select * from assignpmanager order by priority desc";
		$result=$conn->query($sql);
		//print_r($result);
		$detail =[];
		while($row=$result->fetch_assoc())
		{
			$detail[]=$row;

		}
	// echo"<pre>";
	// print_r($detail);
	// echo"</pre>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
	<style >
		body {
  			font-family: Arial, Helvetica, sans-serif;
		}
		.navbar {
		  overflow: hidden;
		  background-color: #333;
		  /*position: relative;*/
		}

		.navbar a {
		  float: left;
		  font-size: 16px;
		  color: white;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		}
		.mydropdown3 {
		  float: left;
		  overflow: hidden;
		}

		.mydropdown3 .dropbtn {
		  font-size: 16px;  
		  border: none;
		  outline: none;
		  color: white;
		  padding: 14px 16px;
		  background-color: inherit;
		  font-family: inherit;
		  margin: 0;
		}
		.mydropdown3 {
		  /*position: relative;*/
		}
		.dropbtn{
		  position: relative;
		}
		.navbar a:hover, .mydropdown3:hover .dropbtn {
		  background-color: red;
		}

		.mydropdown3-content {
		  display: none;
		  position: absolute;
		  /*left: 500px;*/
		  background-color: #f9f9f9;
		  min-width: 160px;
		  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		  z-index: 1;
		}

		.mydropdown3-content a {
		  float: none;
		  color: black;
		  padding: 12px 16px;
		  text-decoration: none;
		  display: block;
		  text-align: left;
		}

		.mydropdown3-content a:hover {
		  background-color: #ddd;
		}
		.mydropdown3:hover .mydropdown3-content {
		  display: block;
		}
	</style>
</head>
<body>
	<div class="navbar">
		<!--   <div class="mydropdown2">
		    <button class="dropbtn">parent page
		     
		    <div class="mydropdown2-content">
		      <?php foreach($detail as $d) { 
		        if($d['parent_page'] == -1){

		        ?>
		       <a href="pagedetail.php?id=<?php echo $d['id']?>"><?php echo $d['page_title'];?></a>
		      <?php } }?>
		    </div>
		  </div>  -->
		  <a href="home.php" style="padding-top: 25px">Home</a>
			  
	  <?php foreach($detail as $d){ 
	    if($d['parent_page'] == -1){
	    ?>
	    <span><?php { ?>
	      <div class="mydropdown3">
	        <button class="dropbtn"><a href="./fpagedetail.php?id=<?php echo $d['id']?>"><?php echo $d['page_title']?></a>
	          <!-- <i class="fa fa-caret-down"></i> -->
	        </button>
	        <div class="mydropdown3-content">
	          <?php 
	          $sql2="select * from assignpmanager where parent_page='".$d['id']."'";
	          $result1 =$conn->query($sql2);
	          // $row1 = mysqli_fetch_array($result1);
	          //   
	          // echo $row1['page_title'];
	           //  echo "<pre>";
	           // print_r($row1);
	           // echo '</pre>';
	           while ($row = $result1 -> fetch_row()) { ?>
	             <a href="./fpagedetail.php?id=<?php printf("%s", $row[0]);?>"><?php printf ("%s",  $row[1]); print "<br>"?></a>
	              <?php } ?>
	        </div>
	      </div> 
	        <?php } ?>
	    </span>
	  <?php } }?>
	  <a href="contactus.php" style="padding-top: 27px">contact us</a>
	  <a href="fdownload.php"  style="padding-top: 27px">Downloads</a>
	</div>
</body>
</html>