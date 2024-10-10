<?php
require_once './config.php';
require_once './firebaseRDB.php';

// Start the session
session_name('MyCustomSessionName');
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    echo '<script>alert("User not logged in.");</script>';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collecting data from the form
    $petId = htmlspecialchars($_POST['petId']);
    $petName = htmlspecialchars($_POST['petName']);
    $petType = htmlspecialchars($_POST['petType']);
    $skinColor = htmlspecialchars($_POST['skinColor']);
    $age = intval($_POST['age']);
    $breed = htmlspecialchars($_POST['breed']);
    $weight = intval($_POST['weight']);
    $specialNeeds = htmlspecialchars($_POST['specialNeeds']);
    $vaccinationDate = htmlspecialchars($_POST['vaccinationDate']);
    $price = floatval($_POST['price']);
    $location=htmlspecialchars($_POST['location']);
    $phone=htmlspecialchars($_POST['phone']);
    $description=htmlspecialchars($_POST['description']);
    
    // Handle file uploads for medical documents
    $medicalDocs = [];
    if (isset($_FILES['medicalDocuments'])) {
        $uploadDir = 'uploads/';
        foreach ($_FILES['medicalDocuments']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['medicalDocuments']['name'][$key];
            $file_size = $_FILES['medicalDocuments']['size'][$key];
            $file_tmp = $_FILES['medicalDocuments']['tmp_name'][$key];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            
            if ($file_size > 8388608) { // 8MB limit
                echo '<script>alert("File size exceeds 8MB limit.");</script>';
                exit;
            }
            
            $allowed_extensions = array("jpeg", "jpg", "png", "pdf");
            if (!in_array($file_ext, $allowed_extensions)) {
                echo '<script>alert("Invalid file format.");</script>';
                exit;
            }
            
            $new_file_name = uniqid() . "." . $file_ext;
            if (move_uploaded_file($file_tmp, $uploadDir . $new_file_name)) {
                $medicalDocs[] = $uploadDir . $new_file_name;
            }
        }
    }

    // Handle file upload for pet image
    $petImage = '';
    if (isset($_FILES['petImage'])) {
        $image_name = $_FILES['petImage']['name'];
        $image_tmp = $_FILES['petImage']['tmp_name'];
        $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        
        if ($_FILES['petImage']['size'] > 8388608) { // 8MB limit
            echo '<script>alert("Image file size exceeds 8MB.");</script>';
            exit;
        }
        
        $allowed_image_ext = array("jpeg", "jpg", "png");
        if (!in_array($image_ext, $allowed_image_ext)) {
            echo '<script>alert("Invalid image format.");</script>';
            exit;
        }
        
        $new_image_name = uniqid() . "." . $image_ext;
        if (move_uploaded_file($image_tmp, $uploadDir . $new_image_name)) {
            $petImage = $uploadDir . $new_image_name;
        }
    }

    try {
        // Initialize FirebaseRDB class
        $db = new firebaseRDB($databaseURL);

        // Prepare data to be saved in Firebase
        $data = [
            'petId' => $petId,
            'petName' => $petName,
            'petType' => $petType,
            'skinColor' => $skinColor,
            'age' => $age,
            'breed' => $breed,
            'weight' => $weight,
            'specialNeeds' => $specialNeeds,
            'vaccinationDate' => $vaccinationDate,
            'price' => $price,
            'location'=>$location,
            'phone' =>$phone,
            'descrption' =>$description,
            
            
            'userName' => $_SESSION['user']['name'],
            'userId' => $_SESSION['user']['id'],
            'userName' =>$_SESSION['user']['name'],
            'status' => false,
            'isBooked' =>false
        ];

        // Save the data to Firebase
        $response = $db->insert('pets', $data);

        // Check response and provide feedback
        if ($response) {
            echo '<script>alert("Pet added successfully!"); window.location.href = "index.php";</script>';
        } else {
            echo '<script>alert("Failed to add pet. Please try again.");</script>';
        }
    } catch (Exception $e) {
        echo '<script>alert("Error: ' . addslashes($e->getMessage()) . '");</script>';
    }
}
?>
