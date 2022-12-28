<!DOCTYPE html>
<html>
<head>
	<title>Owl carousel</title>
	<link rel="stylesheet" href="../owlcarousel/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="../owlcarousel/dist/assets/owl.theme.default.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="../owlcarousel/dist/owl.carousel.js"></script>
</head>
<body>

	<div class="owl-carousel">

	  <div class="item"><img src="../uploads/img_mountains_wide.jpg"></div>
	  <div class="item"><img src="../uploads/img_nature_wide.jpg"></div>
	  <div class="item"><img src="../uploads/img_snow_wide.jpg"></div>
	
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			// $('body').on('click', function(){
		 //  	alert('hello');
		 //  })
		 //  $('.owl-carousel').owlCarousel({
			//     loop:true,
			//     margin:10,
			//     nav:true,
			//     responsive:{
			//         0:{
			//             items:1
			//         },
			//         600:{
			//             items:3
			//         },
			//         1000:{
			//             items:3
			//         }
			//     }
			// })
			var owl = $('.owl-carousel');
			owl.owlCarousel({
			    items:1,
			    loop:true,
			    margin:10,
			    autoplay:true,
			    autoplayTimeout:800,
			    autoplayHoverPause:true
			});

		});
	</script>
</body>
</html>