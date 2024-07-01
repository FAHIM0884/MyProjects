<?php
session_start();
include("dbconnect.php");

// Check if form is submitted and process the search
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Search'])) {
    $Search = $_POST['Search'];

    // Prepare and execute the query
    $Query = "SELECT * FROM add_sales WHERE username = '$Search' OR rdate = '$Search'";
    $result = mysqli_query($conn, $Query);

    // Check if the query executed successfully
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
}

// Define a variable to determine if billing details are to be displayed
$displayBilling = false;

// Check if there's no search result and display billing details
if (!isset($result)) {
    $displayBilling = true;

    // Query to get all billing details (modify as per your database structure)
    $billingQuery = "SELECT * FROM add_sales";
    $billingResult = mysqli_query($conn, $billingQuery);

    // Check if the query executed successfully
    if (!$billingResult) {
        die("Billing query failed: " . mysqli_error($conn));
    }
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
		<h3 align="center" class="heading text-capitalize mb-sm-5 mb-4"> Sale Details </h3>
<div align="center">
		<div class="container-fluid mt-3 pt-2">
               
                <div class="row-items">
                <div class="col-lg-12">
                    <div class="row">
                <?php
				$Search = $_POST['Search'];
                $Query = "SELECT * FROM add_sales WHERE username = '$Search' OR rdate = '$Search'";
                $result = mysqli_query($conn,$Query);



                while($row = mysqli_fetch_assoc($result)){


                ?>
                <div class="col-md-4 item">
                <div class="card alumni-list" data-id="<?php echo $row['id'] ?>">
                        
                    <div class="card-body">
                        <div class="row align-items-center h-100">
                            <div class="">
                                <div>
                                <p class="filter-txt"><b>Username: <?php echo $row['username'] ?></b></p>
                                <p class="filter-txt"><b>Bill no:<?php echo $row['billno'] ?></b></p>
                                <p class="filter-txt"><b>Medicine Id<?php echo $row['productid'] ?></b></p>
                                <p class="filter-txt"><b>Medicine Name:<?php echo  $row['medicine_name'] ?></b></p>
                                <p class="filter-txt"><b>Amount:<?php echo $row['price'] ?></b></p>
                                <p class="filter-txt"><b>Quantity:<?php echo $row['quantity'] ?></b></p>
                                <p class="filter-txt"><b>Total:<?php echo $row['amount'] ?></b></p>
                                <p class="filter-txt"><b>Sales Date:<?php echo $row['rdate'] ?></b></p>

                                    <br>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>
                <br>
                </div>
                <?php } ?>
                </div>
                </div>
                </div>
            </div>
		<form name="form1" method="post" action="">
			<div class="container">
        		<div class="card mb-4 mt-4">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-8">
		                    <div class="input-group mb-3">
		                      <div class="input-group-prepend">
		                        <span class="input-group-text" id="filter-field"><i class="fa fa-search"></i></span>
		                      </div>
		                      <input type="text" class="form-control" id="filter" name="Search" placeholder="Username" aria-label="Filter" aria-describedby="filter-field">
		                    </div>
		                </div>
		                <div class="col-md-4">
		                    <button class="btn btn-primary btn-block btn-sm" name="searchButton" id="search">Search</button>
		                </div>
		            </div>
		            
		        </div>
		    </div>
        	</div>
	</div>
		  <table width="959" height="93" border="0" align="center">
            <tr>
              <td><div align="center"><strong>Username</strong></div></td>
              <td><div align="center"><strong>Billno</strong></div></td>
              <td><div align="center"><strong>Madicine ID </strong></div></td>
              <td><div align="center"><strong>Medicine Name </strong></div></td>
              <td><div align="center"><strong>Amount</strong></div></td>
              <td><div align="center"><strong>Quantity</strong></div></td>
              <td><div align="center"><strong>Total</strong></div></td>
              <td><div align="center"><strong>Sales Date </strong></div></td>
            </tr>
            <?php
					$qr1="select * from add_sales";
					$result1 = $conn->query($qr1);

					while($row = $result1->fetch_assoc())
					{
					
					?>
            <tr>
              <?php 
					 
					  ?>
              <td><div align="center"><strong>
                <?php  echo $row['username'];?>
              </strong></div></td>
              <td><div align="center"><strong>
                <?php  echo $row['billno'];?>
              </strong></div></td>
              <td><div align="center"><strong>
                <?php  echo $row['productid'];?>
              </strong></div></td>
              <td><div align="center"><strong>
                <?php  
						
						  echo $row['medicine_name'];
						  
						  ?>
              </strong></div></td>
              <td><div align="center"><strong>
                <?php  
						  
						  echo $row['price'];
						  
						  ?>
              </strong></div></td>
              <td><div align="center"><strong>
                <?php
						echo $row['quantity'];
						
						?>
              </strong></div></td>
              <td><div align="center"><strong>
              <?php
						echo $row['amount'];
						
						?>
              </strong></div></td>
              <td><div align="center"><strong>
              <?php
						echo $row['rdate'];
						
						?>
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
				<p>� 2020 Pharmacy. All Rights Reserved | Design by <a href="#" target="=_blank"> ADMIN </a></p>
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