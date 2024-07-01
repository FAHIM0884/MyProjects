<?php
extract($_POST);
session_start(); 
include("dbconnect.php");
$bid = isset($_REQUEST['up']) ? $_REQUEST['up'] : null;
$act = isset($_REQUEST['act']) ? $_REQUEST['act'] : '';
if($act=="ok")
{
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM add_medicine WHERE id='$bid'";

if ($conn->query($sql) === TRUE) {
?>					
<script language="javascript">
alert("Record deleted successfully");
window.location.href="manage_medicine.php";
</script>
<?php

} 
else
{
?>
 <script language="javascript">
alert("Failed");
</script>
<?php
}
$conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Medical shop Management System</title>
	
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->
		
	<!-- css files -->
	<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="css/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<!-- //web-fonts -->
    <style type="text/css">
<!--
.style2 {font-size: 18; font-weight: bold; }
-->
    </style>
</head>

<body>

<!-- banner -->
<div class="inner-page-banner" id="home"> 	   
	<!--Header-->
	<header>
		<div class="container agile-banner_nav">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
				<h1><a class="navbar-brand" href="index.html">Medical shop <span class="display"> Management</span></a></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item ">
						<a class="nav-link" href="pharmacy_home.php">Home</a>
					</li>
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Medicine
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="add_medicine.php">Add Medicine</a>
							</li>
							<li>
								<a href="manage_medicine.php">Medicines</a>
							</li>
						</ul>
					</li>
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Dealers
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="add_dealers.php">Add Dealers</a>
							</li>
							<li>
								<a href="manage_dealers.php">Manage Dealers</a>
							</li>
						</ul>
					</li>
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Sales And Billing
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="add_sale_details.php">Add Sale</a>
							</li>
							<li>
								<a href="view_billing_details.php">Billing Details</a>
							</li>
							
						</ul>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>
					</ul>
				</div>
			  
			</nav>
		</div>
	</header>
	<!--Header-->
</div>
<!-- //banner --> 

<!-- about -->
<section class="wthree-row py-5">
	<div class="container py-lg-5 py-sm-3">
		<h3 align="center" class="heading text-capitalize mb-sm-5 mb-4"> Manage Medicine </h3>
		<form name="form1" method="post" action="">
		  <table width="828" height="95" border="0" align="center">
            <tr>
              <td><div align="center" class="style2">Medicine Name</div></td>
              <td><div align="center" class="style2">Type</div></td>
              <td><div align="center" class="style2">Price</div></td>
              <td><div align="center" class="style2">Quantity</div></td>
              <td><div align="center" class="style2">GST</div></td>
              <td><div align="center" class="style2">Date</div></td>
              <td><div align="center" class="style2">Edit/Remove</div></td>
            </tr>
            <?php
					$qr1="select * from   add_medicine";
					$result1 = $conn->query($qr1);

					while($row = $result1->fetch_assoc())
					{
					
					?>
            <tr>
              <?php 
					 
					  ?>
              <td class="fsize"><div align="center"><strong>
                <?php  echo $row['medicine_name'];?>
              </strong></div></td>
              <td><div align="center"><strong>
                <?php  echo $row['type'];?>
              </strong></div></td>
              <td><div align="center"><strong>
                <?php  echo $row['price'];?>
              </strong></div></td>
              <td><div align="center"><strong>
                <?php  
						
						  echo $row['quantity'];
						  
						  ?>
              </strong></div></td>
              <td><div align="center"><strong>
                <?php  
						  
						  echo $row['Gst'];
						  
						  ?>
              </strong></div></td>
              <td><div align="center"><strong>
                <?php
						echo $row['ex_date'];
						
						?>
              </strong></div></td>
              <td><div align="center"><strong>
			  <a href="update_medicine.php?up=<?php echo $row['id'];?>">Edit</a>/ <a href="manage_medicine.php?act=ok&&up=<?php echo $row['id'];?>">Remove</a>
			  </strong></div></td>
            </tr>
            <?php
					  
					  
					 
					  }
					  ?>
          </table>
      </form>
		<p align="center" class="heading text-capitalize mb-sm-5 mb-4">&nbsp;</p>
	  <div class="row d-flex justify-content-center"></div>
	</div>
</section>
<!-- //about -->

<!-- counter -->
<!-- //counter -->
<!-- about  bottom -->

<!-- //about  bottom -->

<!-- footer -->
<footer class="py-5">
	<div class="container py-md-5">
	  <div class="footer-grid">
		  <div class="list-footer">
				<ul class="footer-nav text-center">
					
				</ul>
			</div>
			<div class="agileits_w3layouts-copyright mt-4 text-center">
				<p>� 2022 Pharmacy. All Rights Reserved | Design by <a href="#" target="=_blank"> FAHIM </a></p>
		</div>
		</div>
	</div>
</footer>
<!-- footer -->

<!-- js-scripts -->		

	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
	<!-- //js -->
		
	<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->

	<!-- start-smoth-scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->
	
<!-- //js-scripts -->

</body>
</html>