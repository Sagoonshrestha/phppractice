<?php
require_once('../connect.php');
require_once('fheader.php');
if($conn->connect_errno == 0){
	 $sql = "select * from newsmanager ";
	 // $store = $conn->query($sql); 
	 // //  $count=mysqli_num_rows($store);
	 // // echo($count);
	 // $detail = [];
	 // while($row=$store->fetch_assoc()){
	 // 	$detail[] = $row; 
	 // }
	$results_per_page = 3;  
  
    //find the total number of results stored in the database  
    // $query = "select *from newsmanager";  
    $result = mysqli_query($conn, $sql);  
    $number_of_result = mysqli_num_rows($result);  

  
    //determine the total number of pages available  
   
    //determine which page number visitor is currently on  
   if (isset($_GET["page"])) {    
       $page  = $_GET["page"];    
    }    
    else {    
       $page=1;    
    }    
  
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;  
  
    //retrieve the selected results from database   
    $query = "SELECT *FROM newsmanager LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($conn, $query);  

}
// echo '<pre>';
// print_r($detail);
// echo '</pre>';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.flex-container {
    		display: flex;
    		/*flex-direction: column;*/
    		justify-content: center;
    		align-items: center;
    		overflow-x: auto;
		}

		.flex-child {
		    flex: 1;
		    border: 2px solid yellow;
		    margin-right: 20px;
		}
		a{
			text-decoration: none;
			color: black;
		}
		button{
			background: blue;
		}
		   
		/*.flex-child:first-child {
    		
		} */
	</style>
</head>
<body>
	<br><br>
	<div class="flex-container">
		<?php while ($row = mysqli_fetch_array($result)) { ?>
			<a href="fnewsdetail.php?id=<?php echo $row['id']?>">
			<div class= "flex-child">
				<img src="../<?php echo $row['newsimage'];?>" width="200px" height="200px" >
				<label>news title:</label>
				<?php echo $row['news_title']?>
				<br><br>
				<label>news content:</label>
				<?php echo $row['news_content']?>
				<br><br>
				
			</div>
		</a>
		<?php } ?>
	</div>
	<br><br>

	<div style="text-align: center">
		<?php 
			$number_of_page = ceil ($number_of_result / $results_per_page);  
	  		$pagLink = ""; 
		    //display the link of the pages in URL
		    if($page>=2){   
		            echo "<a href='viewallnews.php?page=".($page-1)."'>  Prev </a>";   
		        }   
		    for($i = 1; $i<= $number_of_page; $i++) {  ?>
		        <a href = "viewallnews.php?page=<?php echo $i ?>"> <?php echo $i ?> </a>  

		<?php }  ?>
		<?php
			if($page<$number_of_page){   
		        echo "<a href='viewallnews.php?page=".($page+1)."'>  Next </a>";   
		    }   
		?>
	</div> 
	
</body>
</html>