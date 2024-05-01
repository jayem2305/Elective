<?php
require_once 'reservation_model.php';

class ReservationController {
    private $model;

    // Constructor: Initializes the model with the provided database connection
    public function __construct($db) {
        $this->model = new ReservationModel($db);
    }

    // Index Method: Displays a list of reservations
    public function index() {
        // Retrieve all reservations from the model
        $reservations = $this->model->getAllReservations();
        
        // Include the view file to display the reservations
        include 'reservation_view.php';
    }

    // Process Reservation Method: Handles form submission to create a new reservation
    public function processReservation() {
        // Check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $customerName = $_POST['customername'];
            $contactNumber = $_POST['contactnumber'];
            $startDate = $_POST['startdate'];
            $endDate = $_POST['enddate'];
            $roomType = $_POST['radio-stacked'];
            $capacity = $_POST['Capacity-stacked'];
            $paymentType = $_POST['Payment-stacked'];

            // Call the model to create a new reservation
            $this->model->createReservation($customerName, $contactNumber, $startDate, $endDate, $roomType, $capacity, $paymentType);

            // Redirect to index page or display success message
            header("Location: reservations_list.php");
            exit();
        }
    }
    
    // Delete Reservation Method: Handles deletion of a reservation
    public function deleteReservation() {
        // Check if the request method is POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ensure reservation ID is provided
            if (!empty($_POST['reservation_id'])) {
                // Get reservation ID from POST data
                $reservationId = $_POST['reservation_id'];
                
                // Call the model to delete the reservation
                $this->model->deleteReservation($reservationId);
                
                // Redirect to appropriate page
                header("Location: reservations_list.php");
                exit(); // Prevent further execution of the script
            } else {
                $error_message = "Reservation ID not provided.";
            header("Location: reservations_list.php?error=" . urlencode($error_message));
                exit(); // Prevent further execution of the script
            }
        }
    }
    public function updateReservation() {
        // Check if the request method is POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ensure reservation ID is provided
            if (!empty($_POST['reservation_id'])) {
                // Get reservation ID from POST data
                $reservationId = $_POST['reservation_id'];
    
                // Retrieve updated data from the form
                $customerName = $_POST['customername'];
                $contactNumber = $_POST['contactnumber'];
                $startDate = $_POST['startdate'];
                $endDate = $_POST['enddate'];
                $roomType = $_POST['radio-stacked'];
                $capacity = $_POST['Capacity-stacked'];
                $paymentType = $_POST['Payment-stacked'];
    
                // Call the model to update the reservation
                $this->model->updateReservation($reservationId, $customerName, $contactNumber, $startDate, $endDate, $roomType, $capacity, $paymentType);
    
                // Redirect or display success message
                // For demonstration purposes, let's redirect to a success page
                header("Location: reservations_list.php");
                exit(); // Prevent further execution of the script
            } else {
                // Handle error: Reservation ID not provided
                // For demonstration purposes, let's redirect to an error page
                $error_message = "Reservation ID not provided.";
                header("Location: reservations_list.php?error=" . urlencode($error_message));
                exit(); // Prevent further execution of the script
            }
        }
    }
    
    // Add other controller methods as needed
    
}

?>
