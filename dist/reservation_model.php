<?php
class ReservationModel {
    private $db;
    private $pdo;

    public function __construct($db) {
        $this->db = $db;
        $this->pdo = $db;
    }

    public function createReservation($customerName, $contactNumber, $startDate, $endDate, $roomType, $capacity, $paymentType) {
        // Example: Insertion query
        $query = "INSERT INTO reservations (customername, contactnumber,startdate, enddate, roomtype, roomcapacity, paymenttype) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        // Example: Prepared statement
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssssss", $customerName, $contactNumber, $startDate, $endDate, $roomType, $capacity, $paymentType);
        $stmt->execute();
        $stmt->close();
    }
    public function getAllReservations() {
        $reservations = [];
        $result = $this->db->query("SELECT * FROM reservations");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $reservations[] = $row;
            }
        }
        return $reservations;
    }
    public function deleteReservation($reservationId)
    {
        try {
            // Prepare SQL statement to delete reservation
            $stmt = $this->pdo->prepare("DELETE FROM reservations WHERE id = ?");
        
            // Bind reservation ID parameter
            $stmt->bind_param("i", $reservationId); // "i" indicates integer type
        
            // Execute the prepared statement
            $stmt->execute();
        
            // Check if any rows were affected
            if ($stmt->affected_rows > 0) {
                // Reservation deleted successfully
                return true;
            } else {
                // No rows affected, reservation with given ID not found
                return false;
            }
        } catch (PDOException $e) {
            // Handle database errors
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function updateReservation($reservationId, $customerName, $contactNumber, $startDate, $endDate, $roomType, $capacity, $paymentType) {
        try {
            // Prepare SQL statement to update reservation
            $stmt = $this->pdo->prepare("UPDATE reservations SET customername = ?, contactnumber = ?, startdate = ?, enddate = ?, roomtype = ?, roomcapacity = ?, paymenttype = ? WHERE id = ?");
        
            // Bind parameters
            $stmt->bind_param("sssssssi", $customerName, $contactNumber, $startDate, $endDate, $roomType, $capacity, $paymentType, $reservationId);
    
            // Execute the prepared statement
            $stmt->execute();
        
            // Check if any rows were affected
            if ($stmt->affected_rows > 0) {
                // Reservation updated successfully
                return true;
            } else {
                // No rows affected, reservation with given ID not found or no changes made
                return false;
            }
        } catch (PDOException $e) {
            // Handle database errors
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
        
}
?>
