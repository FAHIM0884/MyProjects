<?php
extract($_POST);
session_start(); 
include("dbconnect.php");
$bid=$_REQUEST['up'];
if(isset($_POST['btn'])) 
{

$price=$_REQUEST['price'];
$quantity=$_REQUEST['quantity'];
$gst=$_REQUEST['gst'];
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 

  
 $qrys1="update  add_medicine set price='$price',quantity='$quantity',gst='$gst' where id='$bid'";
  if ($conn->query($qrys1) === TRUE) {
  ?>					
	<script language="javascript">
	alert("Update Medicine Success");
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
<title>Medical shop
 Management System</title>
	
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
	<script language="javascript">
            function add_medicine()
            {
              // alert("");
               
				if (document.form1.name.value == "")
                {
				
                    alert("Enter the Medicine Name");
                    document.form1.name.focus();
                    return false;
                }
				 if (!/^[a-zA-Z]*$/g.test(document.form1.name.value)) {
					alert("Invalid characters. Enter Medicine Name..");
					document.form1.name.focus();
					return false;
				}
				 if (document.form1.type.value == "")
                {
                    alert("Enter the  Type");
                    document.form1.type.focus();
                    return false;
                }
				if (document.form1.price.value == "")
                {
                    alert("Enter the Price");
                    document.form1.price.focus();
                    return false;
                }
				if (document.form1.price.value != "")
                {
                  var z = document.form1.price.value;
             if(!/^[0-9]+$/.test(z)){
   
        alert("Price Enter Numbers Only..")
       document.form1.price.focus();
        return false;
        }   
                }
				
				 if (document.form1.quantity.value == "")
                {
                    alert("Enter the Quantity");
                    document.form1.quantity.focus();
                    return false;
                } 
               
                  
                      
              
				 
                if (document.form1.gst.value == "")
                {
                    alert("Enter the GST");
                    document.form1.gst.focus();
                    return false;
                }
                //finishMD();
                return true;
            }
        </script>
		<style>
		.hauf
		{
		text-decoration:none;
		font:"Times New Roman", Times, serif;
		font-size:20px;
	
		}
		</style>
</head>

<body>

<!-- banner -->
<div class="inner-page-banner" id="home"> 	   
	<!--Header-->
	<header>
		<div class="container agile-banner_nav">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
				<h1><a class="navbar-brand" href="index.html">Medical shop<span class="display"> Management</span></a></h1>
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
		<h3 align="center" class="heading text-capitalize mb-sm-5 mb-4"> Update Medicine </h3>
		<form name="form1" method="post" action="">
		  <table width="406" height="478" border="0" align="center">

            <tr>
              <th scope="row">Price</th>
              <td><label>
                <input name="price" type="text" id="price" required class="hauf">
              </label></td>
            </tr>
            <tr>
              <th scope="row">Quantity</th>
              <td><label>
                <input name="quantity" type="text" id="quantity" required class="hauf">
              </label></td>
            </tr>
            <tr>
              <th scope="row">GST</th>
              <td><input name="gst" type="text" id="gst" required class="hauf"></td>
            </tr>

            <tr>
              <th scope="row">&nbsp;</th>
              <td><label>
                <input name="btn" type="submit" id="btn" value="Update" onClick="return add_medicine()">
              </label></td>
            </tr>
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