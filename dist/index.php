<?php
require_once 'reservation_controller.php';

// Database connection settings
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'reservation';
$db = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Route requests to appropriate controller method
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$controller = new ReservationController($db);
switch ($action) {
    case 'processReservation':
        $controller->processReservation();
        break;
    case 'deleteReservation':
        $controller->deleteReservation();
        break;
    case 'updateReservation':
        $controller->updateReservation();
        break;
    default:
        $controller->index();
        break;
}
?>
