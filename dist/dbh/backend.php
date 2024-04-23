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
    $customername = $_POST['customername'];
    $contactnumber = $_POST['contactnumber'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $roomtype = $_POST['radio-stacked'];
    $roomcapacity = $_POST['Capacity-stacked'];
    $paymenttype = $_POST['Payment-stacked'];

    // Prepare SQL INSERT statement
    $stmt = $pdo->prepare("INSERT INTO reservations (customername, contactnumber, startdate, enddate, roomtype, roomcapacity, paymenttype) 
                            VALUES (:customername, :contactnumber, :startdate, :enddate, :roomtype, :roomcapacity, :paymenttype)");

    // Bind parameters
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
        header("Location: ../displayresrvation.php");
        echo "Reservation submitted successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
