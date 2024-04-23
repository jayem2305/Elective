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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['reservation_id']; // Hidden input field containing reservation ID
    $customername = $_POST['customername'];
    $contactnumber = $_POST['contactnumber'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $roomtype = $_POST['radio-stacked'];
    $roomcapacity = $_POST['Capacity-stacked'];
    $paymenttype = $_POST['Payment-stacked'];

    // Prepare SQL UPDATE statement
    $stmt = $pdo->prepare("UPDATE reservations SET customername = :customername, contactnumber = :contactnumber, startdate = :startdate, enddate = :enddate, roomtype = :roomtype, roomcapacity = :roomcapacity, paymenttype = :paymenttype WHERE id = :id");

    // Bind parameters
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':customername', $customername);
    $stmt->bindParam(':contactnumber', $contactnumber);
    $stmt->bindParam(':startdate', $startdate);
    $stmt->bindParam(':enddate', $enddate);
    $stmt->bindParam(':roomtype', $roomtype);
    $stmt->bindParam(':roomcapacity', $roomcapacity);
    $stmt->bindParam(':paymenttype', $paymenttype);

    // Execute the prepared statement
    try {
        $stmt->execute();
        // Redirect back to displayreservation.php after update
        header("Location: ../displayresrvation.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Print any errors that occur during execution
    }
}
?>
