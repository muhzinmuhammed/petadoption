<?php
session_name('MyCustomSessionName');
session_start(); // Start the session

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user']);
?>

<header class="header header-fix">
				
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
					
					<li class="searchbar">
						<div class="filter-content looking-input form-group mb-0">
								  <input type="text" class="form-control" placeholder="Search">
							  </div>
							 
					</li>
                    <ul class="nav header-navbar-rht">
            <?php if ($isLoggedIn): ?>
                <li class="new-property-btn">
                    <a href="add-new-property.php">
                        <i class="bx bxs-plus-circle"></i> Sell Pet
                    </a>
                </li>
				<li class="new-property-btn">
                   Hi <?php echo ($_SESSION['user']['name']) ?>
                </li>
                <li>
                    <a href="logout.php" class="btn btn-primary"><i class="feather-log-out"></i> Logout</a>
                </li>
            <?php else: ?>
                <li>
                    <a href="register.php" class="btn btn-primary"><i class="feather-user-plus"></i> Sign Up</a>
                </li>
                <li>
                    <a href="login.php" class="btn sign-btn"><i class="feather-unlock"></i> Sign In</a>
                </li>
            <?php endif; ?>
        </ul>
				</nav>
			</header>