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

	<!-- Bootstrap Datetimepicker CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

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



		<!-- Detail View Section -->
		<section class="content inner-content bg-white">
			<div class="container">
				<div class="row">
					
					<div class="col-lg-12">
						<div class="booking-details mb-0 pb-lg-3 pb-0">
							<h4>Name and Address Details</h4>
							
						
							
					</div>

					<form action="./action_order_pet.php" method="post">
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <div class="review-form">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="review-form">
                <label>Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter your Address" required>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="review-form">
                <label>Phone Number</label>
                <input type="number" name="phone" class="form-control" placeholder="Enter your Number" required>
            </div>
        </div>
        <!-- Hidden field for petId -->
        <input type="hidden" name="petId" value="<?php echo $pets['petId']; ?>"> 
    </div>
    
    <div class="col-lg-12">
        <div class="booking-details-btn">
            <a href="rental-order-step2.html" class="btn btn-lightred me-2">Go Back</a>
            <button type="submit" class="btn btn-primary">Book Now</button>
        </div>
    </div>
</form>

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
							<input type="text" class="search-input" placeholder="Type a  Keyword...." id="search-input"
								aria-label="Type to search" role="searchbox" autocomplete="off">
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

		<!-- Modal -->
		<div class="modal fade modal-succeess" id="success" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog  modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body">
						<div class="success-popup">
							<h4><img src="assets/img/icons/double-tick.svg" alt="img"></h4>
							<h5>Payment Successful</h5>
							<p>You Payment has been successfully done.Trasaction Id : #5064164454</p>
							<a href="index.html" class="btn btn-primary w-100">Back to Home</a>
						</div>
					</div>
				</div>
			</div>
		</div>

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

	<!-- Sticky Sidebar JS -->
	<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
	<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

	<!-- Select2 JS -->
	<script src="assets/plugins/select2/js/select2.min.js"></script>

	<!-- Bootstrap Datetimepicker JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>

</body>

</html>