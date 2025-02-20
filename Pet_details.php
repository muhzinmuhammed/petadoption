<?php
require_once './config.php'; // Your Firebase configuration file
require_once './firebaseRDB.php'; // FirebaseRDB class file

// Initialize the FirebaseRDB class
$db = new firebaseRDB($databaseURL);

// Get the key from the URL parameter
$key = isset($_GET['id']) ? $_GET['id'] : null;

if ($key) {
    try {
        // Fetch data from the 'properties' node using the key
        $response = $db->retrieve('pets/' . $key);

        // Decode the JSON response to an array
        $pets = json_decode($response, true);

        // Handle the case when property is not found
        if (!$pets) {
            throw new Exception("pets not found");
        }
    }
    catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'No pets key specified';
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<title>DreamsEstate</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
				
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

		<!-- Feathericon CSS -->
    	<link rel="stylesheet" href="assets/css/feather.css">

		<!-- Boxicons CSS -->
		<link rel="stylesheet" href="assets/plugins/boxicons/css/boxicons.min.css"> 

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">

	</head>		
	<body>

		<!-- Loader -->
		<div class="page-loader">
			<div class="page-loader-inner">
				<img src="assets/img/icons/loader.svg" alt="Loader">
				<label><i class="fa-solid fa-circle"></i></label>
				<label><i class="fa-solid fa-circle"></i></label>
				<label><i class="fa-solid fa-circle"></i></label>
			</div>
		</div>
		<!-- /Loader -->

		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<!-- Header -->
            <header class="header header-trans">
                <nav class="navbar navbar-expand-lg header-nav">
                    <div class="navbar-header">
                        <a id="mobile_btn" href="javascript:void(0);">
                            <span class="bar-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </a>
                        <a href="index.html" class="navbar-brand logo">
                            <img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
                        </a>
                    </div>
                    <div class="main-menu-wrapper">
                        <div class="menu-header">
                            <a href="index.html" class="menu-logo">
                                <img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
                            </a>
                
                            <a id="menu_close" class="menu-close" href="javascript:void(0);">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                        
                    </div>
                    <ul class="nav header-navbar-rht">
                        
                        <li>
                            <a href="./rental-order-step3.php?id=<?php echo urlencode($key)?>" class="btn btn-primary">Go to Order</a>
                        </li>
                        
                    </ul>
                </nav>
            </header>
            <!-- /Header -->

         

            <!-- Detail View Section -->
			 
            <section class="buy-detailview">
                <div class="container">

<!-- Details -->
<div class="details-wrap">
	<div class="detail-user-wrap">
		<div class="detail-user-img">
			<img src="assets/img/product/product-8.jpg" class="img-fluid" alt="Image">
		</div>
		<div class="user-wrap">
			<div class="user-info-wrap">
				<div class="col-lg-8">
					<div class="buy-btn">
						<span class="buy">        <?php echo htmlspecialchars($pets['petType'])?> </span>
						<!-- <span class="appartment">vaccinated</span> -->
					</div>
					<div class="page-title">
						<!-- <h3>Modern Apartment in the City Center<span><img src="assets/img/icons/location-icon.svg" alt="Image"></span></h3> -->
						<p><i class="feather-map-pin"></i> <?php echo($pets['location']) ?></p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="latest-update">
						<!-- <h5>Post on : 15 Jan 2023</h5> -->
						<p><?php echo($pets['price']) ?></p>
						<!-- <ul class="other-pages">
							<li><a href="javascript:void(0);"><i class="feather-share-2"></i>Share</a></li>
							
							<li><a href="javascript:void(0);"><i class="feather-heart"></i>Wishlist</a></li>
						</ul> -->
					</div>
				</div>
			</div>								
			
		</div>
	</div>
</div>
<!-- /Details -->



                    <div class="row">
                        <div class="col-lg-8">

							<!-- Slider -->
                            <div class="buy-details-col">
								<div class="rental-card">
							
									<!-- Video -->
									<div class="collapse-card">
										<h4 class="card-title">
											<a class="collapsed" data-bs-toggle="collapse" href="#video" aria-expanded="false" aria-controls="video">Video & Image </a>
										</h4>
										<div id="video" class="card-collapse collapse show">
											<div class="sample-video">
												<img src="assets/img/video-img.jpg" alt="Video thumbnail">
												<a class="play-icon" data-fancybox href="https://www.youtube.com/embed/AWovHEZcpQU">
													<i class="bx bx-play"></i>
												</a>
											</div>
										</div>

										
									</div>
									<!-- /Video -->
							
								
							
								</div>
							</div>
							
							<!-- /Slider -->

							
							<!-- Overview -->
							<div class="collapse-card">
								<h4 class="card-title">
									<a class="collapsed" data-bs-toggle="collapse" href="#about" aria-expanded="false">About Pet</a>
								</h4>
								<div id="about" class="card-collapse collapse show">
									<div class="about-agent collapse-view">
										<p><?php echo($pets['descrption']) ?></p>
									</div>
								</div>
							</div>
							<!-- /Overview -->
							
							<!-- Property Details -->
							<div class="collapse-card">
								<h4 class="card-title">
									<a class="collapsed" data-bs-toggle="collapse" href="#details" aria-expanded="false">Pet Details</a>
								</h4>
								<div id="details" class="card-collapse collapse show  collapse-view">
									<div class="row">
										<div class="col-md-4">
											<ul class="property-details">
												<li>Name : <span> <?php echo($pets['petName']) ?></span></li>
												<li>BREED : <span> <?php echo($pets['breed']) ?></span></li> 
												<li>Age : <span>  <?php echo($pets['age']) ?></span></li> 
												<li>Weight : <span> <?php echo($pets['weight']) ?> </span></li>
												
												
												
											</ul>
										</div>
										
										<div class="col-md-4">
											<ul class="property-details">
											
												 
												<li>Skin color : <span> <?php echo($pets['skinColor']) ?> </span></li> 
												<li>Last vaccation Date: <span> <?php echo($pets['vaccinationDate']) ?> </span></li> 
												
												<li> Special Needs :  <span> <?php echo($pets['specialNeeds']) ?></span></li>
												<li> Price : <span> <?php echo($pets['price']) ?> </span></li> 
												
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- /Property Details -->

							

							

                            <!-- Pet Owner Details -->
							<div class="sidebar-card">
								<div class="sidebar-card-title">
									<h5>Owner Details</h5>
								</div>
								<div class="user-active bg-white p-0">
									<div class="user-img">
										<a href="javascript:void(0);"><img class="avatar" src="assets/img/profiles/avatar-01.jpg" alt="Image"></a>
									</div>
									<div class="user-name">
										<h4><a href="javascript:void(0);"><?php echo($pets['userName']) ?></a></h4>
										<!-- <div class="rating">
											<span class="rating-count d-inline-flex">
												<i class="fa-solid fa-star checked"></i>
												<i class="fa-solid fa-star checked"></i>
												<i class="fa-solid fa-star checked"></i>
												<i class="fa-solid fa-star checked"></i>
												<i class="fa-solid fa-star checked"></i>
											</span>
											<span class="rating-review">5.0 (20 Reviews)</span>
										</div> -->
									</div>
								</div>
								<!-- <ul class="list-details">
									
									<li>Address<span>225</span></li>
									<li>No of Selling<span>225</span></li>
									<li>Memeber on<span>15 Jan 2023</span></li>
									<li>Verification<span>Verified</span></li>
									
								</ul> -->
							</div>
							<!-- /Pet Owner Details -->

							

						</div>

						<!-- Sidebar -->
						<div class="col-lg-4 theiaStickySidebar">
							<div class="right-sidebar">
								
								
								<!-- Enquiry -->
								<div class="sidebar-card">
									<div class="sidebar-card-title">
										<h5>More Info</h5>
									</div>
									<div class="user-active">
										<div class="user-img">
											<a href="javascript:void(0);"><img class="avatar" src="assets/img/profiles/avatar-01.jpg" alt="Image"></a>
											<span class="avatar-online"></span>
										</div>
										<div class="user-name">
											<h4><a href="javascript:void(0);"><?php echo($pets['userName']) ?></a></h4>
											
										</div>
									</div>
									<form action="#">
									</form>
									<ul class="connect-us">
    <!-- Call Us: Opens phone dialer -->
    <li>
        <a href="tel:<?php echo($pets['phone']); ?>">
            <i class="feather-phone"></i> Call Us
        </a>
    </li>
    <!-- WhatsApp: Opens WhatsApp chat -->
    <li>
        <a href="https://wa.me/<?php echo($pets['phone']); ?>" target="_blank">
            <i class="fa-brands fa-whatsapp"></i> WhatsApp
        </a>
    </li>
</ul>

								</div>
								<!-- /Enquiry -->
								<div class="sidebar-card">
									<div class="sidebar-card-title">
										<h5>Medical Document</h5>
									</div>
									<form action="#">
									</form>
									<a class="property-img">
										<img class="img-fluid" alt="Property Image" src="assets/img/property/large.png">
									</a>
								</div>

								
							</div>
						</div>
						<!-- /Sidebar -->

                    </div>

                </div>
            </section>
			<!-- /Detail View Section -->

			

			<!-- Search -->
			<div class="search-popup js-search-popup ">
				<a href="javascript:void(0);" class="close-button" id="search-close" aria-label="Close search">
					<i class="fa fa-close"></i>
				</a>
				<div class="popup-inner">
					<div class="inner-container">
						<form class="search-form" id="search-form" action="rent-property-grid.html">
							<h3>What Are You Looking for?</h3>
							<div class="search-form-box flex">
								<input type="text" class="search-input" placeholder="Type a  Keyword...." id="search-input" aria-label="Type to search" role="searchbox" autocomplete="off">
								<button type="submit" class="search-icon"><i class="bx bx-search"></i></button>
							</div>
							<h5>Popular Properties</h5>
							<ul>
								<li><a href="rent-property-grid.html">Beautiful Condo Room</a></li>
								<li><a href="rent-property-grid.html">Royal Apartment</a></li>
								<li><a href="rent-property-grid.html">Grand Villa House</a></li>
								<li><a href="rent-property-grid.html">Grand Mahaka</a></li>
								<li><a href="rent-property-grid.html">Lunaria Residence</a></li>
								<li><a href="rent-property-grid.html">Stephen Alexander Homes</a></li>
							</ul>
						</form>
					</div>
				</div>
			</div>	
			<!-- /Search -->

		</div>		
		<!-- /Main Wrapper -->

		<!-- ScrollToTop -->
		<div class="progress-wrap active-progress">
			<svg class="progress-circle svg-content" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
			</svg>
		</div>
		<!-- /ScrollToTop -->
	
		<!-- jQuery -->
		<script src="assets/js/jquery-3.7.1.min.js"></script>
		
		<!-- Bootstrap Bundle JS -->
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		
		<!-- Feather Icon JS -->
		<script src="assets/js/feather.min.js"></script>

		<!-- Owl Carousel JS -->
		<script src="assets/js/owl.carousel.min.js"></script>

		<!-- Slick JS -->
		<script src="assets/plugins/slick/slick.js"></script>

		<!-- Sticky Sidebar JS -->
		<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
		<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
	
		<!-- Fancybox JS -->
		<script src="assets/plugins/fancybox/jquery.fancybox.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
	
	</body>
</html>