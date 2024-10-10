<?php
require_once './config.php';
require_once './firebaseRDB.php';

// Start the session
session_name('MyCustomSessionName');
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    echo '<script>alert("User not logged in."); window.location.href="login.php";</script>';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect data from the form
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);
    $petId = htmlspecialchars($_POST['petId']);  // Assuming petId is part of the form

    if (empty($petId)) {
        echo '<script>alert("Pet ID is required."); window.location.href = "previous-page.php";</script>';
        exit;
    }

    try {
        // Initialize FirebaseRDB class
        $db = new firebaseRDB($databaseURL);

        // Prepare the data to store in the "orders" collection
        $data = [
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'petId' => $petId,
            'userId' => $_SESSION['user']['id'],
            'userName' => $_SESSION['user']['name'],
            'status' => 'pending',  // Example status
            'createdAt' => date('Y-m-d H:i:s'),
        ];

        // Save the order data to Firebase under the 'orders' collection
        $response = $db->insert('orders', $data);

        // If successfully inserted, update the pet's "isBooked" status to true
        if ($response) {
            // Update the pet's booking status
            $new_data = ['isBooked' => true]; // Create a new array for the update

            // Update the pet document in the database
            $db->update("pets",$petId, $new_data); // Ensure correct path to update

            // Redirect back to the property listing page
            header("Location: index.php"); // Replace with your actual listing page
            exit();
        } else {
            echo '<script>alert("Failed to place order. Please try again.");</script>';
        }
    } catch (Exception $e) {
        echo '<script>alert("Error: ' . addslashes($e->getMessage()) . '");</script>';
    }
}
?>
