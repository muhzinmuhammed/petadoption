<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>DreamsEstate - Add Pet</title>
	<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>    
<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="content inner-content" style="background-color: rgb(255, 255, 255);">
            <div class="container">
                <form action="./action_new_pet.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="property-info">
                                <h4>Pet Details</h4>
                                <p>Please provide information about the pet.</p>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="add-property-wrap">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="review-form">
                                            <label>Pet ID</label>
                                            <input type="text" name="petId" class="form-control" placeholder="Enter Pet ID" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="review-form">
                                            <label>Pet Name</label>
                                            <input type="text" name="petName" class="form-control" placeholder="Enter Pet Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="review-form">
                                            <label>Type</label>
                                            <select name="petType" class="form-control">
                                                <option>Cat</option>
                                                <option>Dog</option>
                                                <option>Hamster</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="review-form">
                                            <label>Skin Color</label>
                                            <input type="text" name="skinColor" class="form-control" placeholder="Enter Color">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="review-form">
                                            <label>Age</label>
                                            <input type="number" name="age" class="form-control" placeholder="Enter Age">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="review-form">
                                            <label>Breed</label>
                                            <input type="text" name="breed" class="form-control" placeholder="Enter Breed">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="review-form">
                                            <label>Weight</label>
                                            <input type="number" name="weight" class="form-control" placeholder="Enter Weight">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="review-form">
                                            <label>Special Needs</label>
                                            <input type="text" name="specialNeeds" class="form-control" placeholder="Enter Needs">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="review-form">
                                            <label>Last Vaccination Date</label>
                                            <input type="date" name="vaccinationDate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="review-form">
                                            <label>Price</label>
                                            <input type="number" name="price" class="form-control" placeholder="Enter Price">
                                        </div>
                                    </div>

									<div class="col-md-6">
                                        <div class="review-form">
                                            <label>Location</label>
                                            <input type="text" name="location" class="form-control" placeholder="Enter location">
                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="review-form">
                                            <label>Phone</label>
                                            <input type="number" name="phone" class="form-control" placeholder="Enter number">
                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="review-form">
                                            <label>Description</label>
                                            <input type="text" name="description" class="form-control" placeholder="Enter description">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-8">
                                        <div class="review-form">
                                            <label>Medical Documents</label>
                                            <input type="file" name="medicalDocuments[]" class="form-control" multiple>
                                            <small>Max file size: 8MB. Formats allowed: PDF, JPG, PNG.</small>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-8">
                                        <div class="review-form">
                                            <label>Pet Image</label>
                                            <input type="file" name="petImage" class="form-control" accept="image/*">
                                        </div>
                                    </div> -->
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Add Pet</button>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
