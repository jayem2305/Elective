<?php
// Database connection settings
$host = 'localhost';
$dbname = 'Reservation';
$username = 'root';
$password = '';

// Establish database connection using PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Check if reservation ID is provided via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reservation_id'])) {
    // Retrieve reservation ID from POST data
    $reservation_id = $_POST['reservation_id'];

    // Prepare SQL statement to delete the reservation
    $stmt = $pdo->prepare("DELETE FROM reservations WHERE id = :id");

    // Bind the reservation ID parameter
    $stmt->bindParam(':id', $reservation_id);

    // Execute the prepared statement
    try {
        $stmt->execute();
        // Redirect back to the page where reservations are displayed after deletion
        header("Location: ../displayresrvation.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Print any errors that occur during execution
    }
} else {
    // If reservation ID is not provided or if the request method is not POST, redirect to an error page or display an error message
    // Redirect or display error message as per your application's requirements
}
?>
