<?php
require_once './config.php'; // Your Firebase configuration file
require_once './firebaseRDB.php'; // FirebaseRDB class file

// Initialize the FirebaseRDB class
$db = new firebaseRDB($databaseURL);

try {
    // Fetch data from the 'properties' node
    $response = $db->retrieve('pets');

    // Decode the JSON response to an array
    $pets = json_decode($response, true);

    // Capture the keys (IDs) for each property
    $petsIDs = array_keys($pets);
}
catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<title></title>
		
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

    	<!-- Animation CSS -->
		<link rel="stylesheet" href="assets/css/aos.css">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
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
				<label><i class="fa-solid fa-circle"></i></label>
			</div>
		</div>
		<!-- /Loader -->

		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<!-- Header -->
			<?php include './navbar.php'; ?>
			<!-- /Header -->
			
			<!-- Home Banner -->
			<section class="banner-section">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<div class="banner-content" data-aos="fade-down">
								<h1>Find Your Best Dream House for <span>Rental, Buy & Sell...</span></h1>
								<p>Properties for buy / rent in in your location. We have more than 3000+ listings for you to choose</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="banner-search"  data-aos="fade-down">
								
								<div class="tab-content" id="bannerTabContent">
									<div class="tab-pane fade show active" id="buy_property" role="tabpanel" aria-labelledby="buy-property">
										<div class="banner-tab-property">
											<form action="#">
												<div class="banner-property-info">
													<div class="banner-property-grid">
														<input type="text" class="form-control" placeholder="Enter Keyword">
													</div>
													<div class="banner-property-grid">
														<select class="select">
															<option value="0">Property Type</option>
															<option value="1" >Buy Property</option>
															<option value="2" >Rent Property</option>
														</select>
													</div>
													<div class="banner-property-grid">
														<input type="email" class="form-control" placeholder="Enter Address">
													</div>
													<div class="banner-property-grid">
														<input type="text" class="form-control" placeholder="Min Price">
													</div>
													<div class="banner-property-grid">
														<input type="text" class="form-control" placeholder="Max Price">
													</div>
													<div class="banner-property-grid">
														<a href="buy-property-grid.html" class="btn-primary"><span><i class='feather-search'></i></span></a>
													</div>
												</div>
											</form>
										</div>
									</div>
									<div class="tab-pane fade" id="rent_property" role="tabpanel" aria-labelledby="rent-property">
										<div class="banner-tab-property">
											<form action="#">
												<div class="banner-property-info">
													<div class="banner-property-grid">
														<input type="text" class="form-control" placeholder="Enter Keyword">
													</div>
													<div class="banner-property-grid">
														<select class="select">
															<option value="0">Property Type</option>
															<option value="1" >Buy Property</option>
															<option value="2" >Rent Property</option>
														</select>
													</div>
													<div class="banner-property-grid">
														<input type="email" class="form-control" placeholder="Enter Address">
													</div>
													<div class="banner-property-grid">
														<input type="text" class="form-control" placeholder="Min Price">
													</div>
													<div class="banner-property-grid">
														<input type="text" class="form-control" placeholder="Max Price">
													</div>
													<div class="banner-property-grid">
														<a href="rent-property-grid.html" class="btn-primary"><span><i class='feather-search'></i></span></a>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div> 
			</section>
			<!-- /Home Banner -->

		
			<!-- /Property Type -->

			<!-- Feature Properties For Sale-->
			<section class="feature-property-sec">
			
				<div class="container">

					<div class="section-heading text-center">
						<h2>Featured Properties for Sales</h2>
						<div class="sec-line">
							<span class="sec-line1"></span>
							<span class="sec-line2"></span>
						</div>
						<p>Hand-Picked selection of quality places</p>
					</div>
					<div class="row">
						<div class="col-md-12">
						<div class="feature-slider owl-carousel">
        <?php $index = 0; ?>
        <?php foreach ($pets as $key => $pet) : ?>
            <?php if ($pet['status'] === true) : ?> 
            <div class="slider-col">
                <div class="product-custom" data-aos="fade-down" data-aos-duration="2000">
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="Pet_details.php?id=<?php echo urlencode($key); ?>" class="property-img">
                                <img class="img-fluid" 
                                     src="<?php 
                                     if ($index % 3 == 0) {
										echo './assets/img/product/product-7.jpg';
										
                                     } elseif ($index % 3 == 1) {
										echo './assets/img/product/product-2.jpg';
                                     } elseif ($index % 3 == 2) {
										echo './assets/img/product/product-3.jpg';
                                     } 
                                     ?>" 
                                     alt="Property Image">
                            </a>
                        </div>
                        <div class="pro-content">
                            <h3 class="title">
                                <a href="Pet_details.php?id=<?php echo urlencode($key); ?>"><?php echo htmlspecialchars($pet['petName']); ?></a>
                            </h3>
                            <p><i class="feather-map-pin"></i><?php echo htmlspecialchars($pet['location']); ?></p>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="Pet_details.php?id=<?php echo urlencode($key); ?>"></a>
                                    <div class="user-name">
                                        <h6><a href="Pet_details.php?id=<?php echo urlencode($key); ?>"><?php echo htmlspecialchars($pet['userName']); ?></a></h6>
                                        <p><?php echo htmlspecialchars($pet['petType']); ?></p>
										<p><?php echo htmlspecialchars($pet['price']); ?></p>

                                    </div>                                                 
                                </li>
                                <li>
                                    <a href="Pet_details.php?id=<?php echo urlencode($key); ?>" class="btn-primary">Buy Now</a>
                                </li>
                            </ul>
                        </div>
                    </div>        
                </div>
            </div>
            <?php $index++; ?>
            <?php endif; ?>
        <?php endforeach; ?>
       
    </div>
							<div class="view-property-btn d-flex justify-content-center"  data-aos="fade-down" data-aos-duration="1000">
								<!-- <a href="" class="btn-primary">View All Properties</a> -->
							</div>
						</div>
					</div>
				</div>
				<div class="bg-imgs">
					<img src="assets/img/bg/price-bg.png" class="bg-01" alt="icon">
					<img src="assets/img/icons/blue-circle.svg" class="bg-02" alt="icon">
					<img src="assets/img/icons/red-circle.svg" class="bg-03" alt="icon">
				</div>
			</section>
			<!-- /Feature Properties For Sale -->


								
								<div class="col-lg-4 col-md-6">
									<div class="price-card aos" data-aos="flip-right" data-aos-easing="ease-out-cubic">
										
									</div>
								</div>
								<!-- /Price Item -->

			
			
			<!-- Footer -->
			<footer class="footer">
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="footer-border-img">
						<img src="assets/img/bg/line-bg.png" alt="image">
					</div>
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-8">
								<div class="footer-widget footer-about">
									<div class="footer-app-content">
										<div class="footer-content-heading">
											<h4>Get Our App </h4> 
											<p>Download the app and book your property</p>
										</div>
										<div class="download-app">
											<a href="javascript:void(0);"><img src="assets/img/google-pay.png" alt="google play"></a>
											<a href="javascript:void(0);"><img src="assets/img/app-store.png" alt="app store"></a>
										</div>
										<div class="social-links">
											<h4>Connect with us</h4>
											<ul>
												<li><a href="javascript:void(0);"><i class="fa-brands fa-facebook-f hi-icon"></i></a></li>
												<li><a href="javascript:void(0);"><i class="fa-brands fa-instagram hi-icon"></i></a></li>
												<li><a href="javascript:void(0);"><i class="fa-brands fa-behance hi-icon"></i></a></li>
												<li><a href="javascript:void(0);"><i class="fa-brands fa-twitter hi-icon"></i></a></li>
												<li><a href="javascript:void(0);"><i class="fa-brands fa-pinterest-p hi-icon"></i></a></li>
												<li><a href="javascript:void(0);"><i class="fa-brands fa-linkedin hi-icon"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							
							
							
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->

				<!-- Footer Bottom -->
				<div class="footer-bottom">
					<div class="container">
						<div class="footer-bottom-content">
							<div class="copyright">
								<p>Copyright  2024 - All right reserved DreamsEstate</p>
							</div>
							<div class="company-logo">
								<p>a product of</p>
								<a href="https://dreamguystech.com/" target="_blank"><img src="assets/img/company-logo.png" alt="Logo"></a>
							</div>
						</div>						
					</div>
				</div>
				<!-- /Footer Bottom -->

			</footer>
			<!-- /Footer -->

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

		<!-- scrollToTop start -->
		<div class="progress-wrap active-progress">
			<svg class="progress-circle svg-content" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
			</svg>
		</div>
		<!-- scrollToTop end -->
	
		<!-- jQuery -->
		<script src="assets/js/jquery-3.7.1.min.js"></script>
		
		<!-- Bootstrap Bundle JS -->
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		
		<!-- Feather Icon JS -->
		<script src="assets/js/feather.min.js"></script>

		<!-- Owl Carousel JS -->
		<script src="assets/js/owl.carousel.min.js"></script>

		<!-- Animation JS -->
		<script src="assets/js/aos.js"></script>

		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>

		<!-- Counter JS -->
		<script src="assets/js/waypoints.js"></script>
		<script src="assets/js/jquery.counterup.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
	
	</body>
</html>