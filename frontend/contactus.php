<?php
	require_once('../connect.php');
	if(isset($_POST['submit'])){
		session_start();
		$status = '';
		if ( isset($_POST['captcha']) && ($_POST['captcha']!="") ){
		// Validation: Checking entered captcha code with the generated captcha code
		if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){
		// Note: the captcha code is compared case insensitively.
		// if you want case sensitive match, check above with strcmp()
		$status = "<p style='color:#FFFFFF; font-size:20px'>
		<span style='background-color:#FF0000;'>Entered captcha code does not match! 
		Kindly try again.</span></p>";
		}else{
		$status = "<p style='color:#FFFFFF; font-size:20px'>
		<span style='background-color:#46ab4a;'>Your captcha code is match.</span>
		</p>";	
			}
		}
		echo $status;
		if(isset($_POST['name']) && $_POST['name'] != ''){
			$name = $_POST['name'];
					}
		if(isset($_POST['email']) && $_POST['email'] != ''){
			$email = $_POST['email'];
		}
		if(isset($_POST['phone']) && $_POST['phone'] !='' ){
			$phone = $_POST['phone'];
		}
		if(isset($_POST['message']) && $_POST['message'] !=''){
			$message = $_POST['message'];
		}
		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message']) && isset($_POST['captcha']) && $_POST['captcha']!=''){
			// echo('hello');
			$sql = "insert into contactus(name, email, phone, message) values(?,?,?,?)";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('ssss',$name,$email,$phone,$message);
			$stmt->execute();
			$stmt->close();
			$conn->close();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact us</title>
	<h1>Contact us</h1>
	 <style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
      }
    </style>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        const uluru = { lat: 27.695332877476154, lng: 85.29175077728904};
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 20,
          center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
      }
    </script>
</head>
<body>
	<form action="" method="post">
		<label>Name</label>
		<input type="text" name="name">
		<br><br>
		<label>Email</label>
		<input type="text" name="email">
		<br><br>
		<label>Phone</label>
		<input type="text" name="phone">
		<br><br>
		<label>Message</label>
		<!-- <input type="text" name="Message"> -->
		<textarea name='message' ></textarea>
		<br><br>
		<label><strong>Enter Captcha:</strong></label><br />
		<input type="text" name="captcha" />
		<p><br />
		<img src="../captcha.php?rand=<?php echo rand(); ?>" id='captcha_image'>
		</p>
		<p>Can't read the image?
		<a href='javascript: refreshCaptcha();'>click here</a>
		to refresh</p>
		<br><br>
		<input type="submit" name="submit" value="submit">
	</form>
	<h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkXxvXJ1BU5oLC9Safpj9MLcKmzDgb9oM&callback=initMap&libraries=&v=weekly"
      async
    >
    </script>
	<?php 
		if(isset($_POST['submit'])&& $_POST['name'] != '' && $_POST['email'] != '' && $_POST['phone'] != '' && $_POST['message'] != '' && $_POST['captcha']!=''){
			echo "<h1>Thank you for contacting us. We’ll get back to you soon.</h1>";
		}
	?>
	<script>
	//Refresh Captcha
		function refreshCaptcha(){
		    var img = document.images['captcha_image'];
		    img.src = img.src.substring(
				0,img.src.lastIndexOf("?")
				)+"?rand="+Math.random()*1000;
		}
	</script>
</body>
</html>
