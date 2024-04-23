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

// Query to fetch all reservations
$stmt = $pdo->query("SELECT * FROM reservations");
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($reservations as &$reservation) {
    // Compute number of days between start date and end date
    $startDate = new DateTime($reservation['startdate']);
    $endDate = new DateTime($reservation['enddate']);
    $interval = $startDate->diff($endDate);
    $reservation['num_days'] = $interval->format('%a'); // Store number of days in the reservation array
}


unset($reservation);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reservation Enrique Canlas</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
</svg>
<style>
    .vl {
  border-left: 6px solid #d3d3d3;
  height: 400px;
}
</style>
</style>
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container-fluid px-4 px-lg-5">
            <img class="img-fluid mb-3 mb-lg-0" src="assets/img/logo.png" alt="..." width="70" style="margin-right:10px;" /><a class="navbar-brand" href="#page-top" >EC-RESERVATION</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item"><a class="nav-link" href="ReservationEnriqueCanlas.php#page-top">Home</a></li>
                    <li class="nav-item"><a class="nav-link " href="ReservationEnriqueCanlas.php#about">Company’s Profile</a></li>
                    <li class="nav-item"><a class="nav-link"  href="ReservationEnriqueCanlas.php">Reservation</a></li>
                    <li class="nav-item"><a class="nav-link text-decoration-underline"  href="displayreservation.php" >Reserved information</a></li>
                    <li class="nav-item"><a class="nav-link" href="ReservationEnriqueCanlas.php#signup">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container-fluid d-flex h-100 align-items-center justify-content-center" >
            <div class="d-flex justify-content-center" style="margin-top: 5rem;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card w-100 mb-3">
                            <div class="card-body">
                                <table class="table" id="myTable">
                                  <thead>
                                    <tr>
                                      <th >ID</th>
                                      <th >Customer Name</th>
                                      <th >Contact Number</th>
                                      <th >Start Date</th>
                                      <th >End Date</th>
                                      <th >Room Type</th>
                                      <th >Room Capacity</th>
                                      <th >Payment Type</th>
                                      <th >Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($reservations as $reservation): ?>
                                    <tr>
                                        <td>RS_<?php echo sprintf('%02d',$reservation['id']); ?></td>
                                        <td><?php echo $reservation['customername']; ?></td>
                                        <td><?php echo $reservation['contactnumber']; ?></td>
                                        <td><?php echo $reservation['startdate']; ?></td>
                                        <td><?php echo $reservation['enddate']; ?></td>
                                        <td><?php echo $reservation['roomtype']; ?></td>
                                        <td><?php echo $reservation['roomcapacity']; ?></td>
                                        <td><?php echo $reservation['paymenttype']; ?></td>
                                        <td><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $reservation['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg></button>
<form method="post" action="dbh/delete_reservation.php">
<input type="hidden" name="reservation_id" value="<?php echo $reservation['id']; ?>">
                                        <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
</svg></button>
</form>                                 </div></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
</header>

<!-- Footer-->
<footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Jayem 2023</div></footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>



<?php foreach ($reservations as $reservation): ?>
<div class="modal fade" id="exampleModal<?php echo $reservation['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Reservation: (Supply the Necessary Information below)</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="post" action="dbh/update_reservation.php">
       <?php
       $stmt_reserve = $pdo->query("SELECT * FROM reservations where id = ".$reservation['id']."");
       $update_reservations = $stmt_reserve->fetchAll(PDO::FETCH_ASSOC);
       foreach ($update_reservations as $update_reservation):
       ?>
    <div class="row">
    <div class="col-lg-6">
        <div class="row" > 
        <div class="col-lg-6">
        <input type="hidden" name="reservation_id" value="<?php echo $update_reservation['id']; ?>">
            <label for="customername" class="form-label">Customer name</label>
            <input type="text" class="form-control is-valid" id="customername" value="<?php echo $update_reservation['customername']; ?>" name="customername" placeholder="Lastname, Firstname Middle Initial" required>
            <div class="valid-feedback" id="name">
            Please enter Your FullName.
            </div>
        </div>
        <div class="col-lg-6">
        <div class="mb-3">
            <label for="contact" class="form-label">Contact Number</label>
            <input type="tel" class="form-control is-valid"pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}"value="<?php echo $update_reservation['contactnumber']; ?>" name="contactnumber" id="contact" placeholder="09xx-xxx-xxxx" maxlength="13" required>
            <div class="valid-feedback">
            Please enter Your Contact Number.
            </div>
        </div>
        </div>
        <hr>
        <label  class="form-label fw-bolder" >Reservation Date</label>
        <div class="col-lg-6 mb-3">
        <label for="startdate" class="form-label">From: </label>
        <input type="date" class="form-control is-valid" id="startdate" name="startdate"value="<?php echo $update_reservation['startdate']; ?>" required>
            <div class="valid-feedback" id="startDateError">Enter your prefered Date</div>
        </div>
        <div class="col-lg-6 mb-3">
        <label for="enddate" class="form-label">To: </label>
        <input type="date" class="form-control is-valid" id="enddate" name="enddate"value="<?php echo $update_reservation['enddate']; ?>" required>
            <div class="valid-feedback" id="endDateError">Enter your prefered Date</div>
        </div>
        <div class="col-lg-4 mb-3">
            <!--roomtype-->
        <label for="validationServer01" class="form-label">Room Type: </label>
            <div class="form-check ">
                <input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" value="Suite"<?php  if($update_reservation['roomtype'] =="Suite"){ ?> checked <?php } ?>>
                <label class="form-check-label text-black" for="validationFormCheck2">Suite</label>
            </div>
            <div class="form-check ">
                <input type="radio" class="form-check-input" id="validationFormCheck3"value="Deluxe" name="radio-stacked"<?php  if($update_reservation['roomtype'] =="Deluxe"){ ?> checked <?php } ?> >
                <label class="form-check-label text-black" for="validationFormCheck3">Deluxe</label>
            </div>
            <div class="form-check ">
                <input type="radio" class="form-check-input" id="validationFormCheck4"value="Regular" name="radio-stacked"<?php  if($update_reservation['roomtype'] =="Regular"){ ?> checked <?php } ?> >
                <label class="form-check-label text-black" for="validationFormCheck4">Regular</label>
            </div>
        </div>
         <!--roomtypecapacity-->
        <div class="col-lg-4 mb-3">
        <label for="validationServer01" class="form-label">Room Capacity: </label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="validationFormCheck2"value="Family"name="Capacity-stacked"<?php  if($update_reservation['roomcapacity'] =="Family"){ ?> checked <?php } ?>>
                <label class="form-check-label text-black" for="validationFormCheck2">Family</label>
            </div>
            <div class="form-check ">
                <input type="radio" class="form-check-input" id="validationFormCheck3"value="Double" name="Capacity-stacked" <?php  if($update_reservation['roomcapacity'] =="Double"){ ?> checked <?php } ?>>
                <label class="form-check-label text-black" for="validationFormCheck3">Double</label>
            </div>
            <div class="form-check ">
                <input type="radio" class="form-check-input" id="validationFormCheck3"value="Single" name="Capacity-stacked" <?php  if($update_reservation['roomcapacity'] =="Single"){ ?> checked <?php } ?>>
                <label class="form-check-label text-black" for="validationFormCheck3">Single</label>
            </div>
        </div>
         <!--paymenttype-->
        <div class="col-lg-4 mb-3">
        <label for="validationServer01" class="form-label">Payment Type: </label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="validationFormCheck2"value="Cash" name="Payment-stacked"  <?php  if($update_reservation['paymenttype'] =="Cash"){ ?> checked <?php } ?>>
                <label class="form-check-label text-black" for="validationFormCheck2">Cash</label>
            </div>
            <div class="form-check ">
                <input type="radio" class="form-check-input" id="validationFormCheck3"value="Check" name="Payment-stacked" <?php  if($update_reservation['paymenttype'] =="Check"){ ?> checked <?php } ?>>
                <label class="form-check-label text-black" for="validationFormCheck3">Check</label>
            </div>
             <div class="form-check ">
                <input type="radio" class="form-check-input" id="validationFormCheck3"value="Credit Card" name="Payment-stacked" <?php  if($update_reservation['paymenttype'] =="Credit Card"){ ?> checked <?php } ?>>
                <label class="form-check-label text-black" for="validationFormCheck3">Credit Card</label>
            </div>
        </div>
      </div>
      </div> 
      
        <div class="col-lg-1">
        <div class="vl"></div> 
        </div>
        <?php
$rateperday = 0;
$discount = 0;
$discountpay = 0;

// Calculate rate per day based on room type and capacity
if ($update_reservation['roomtype'] == "Regular" && $update_reservation['roomcapacity'] == "Single") {
    $rateperday = 100;
} elseif ($update_reservation['roomtype'] == "Deluxe" && $update_reservation['roomcapacity'] == "Single") {
    $rateperday = 300;
} elseif ($update_reservation['roomtype'] == "Suite" && $update_reservation['roomcapacity'] == "Single") {
    $rateperday = 500;
} elseif ($update_reservation['roomtype'] == "Regular" && $update_reservation['roomcapacity'] == "Double") {
    $rateperday = 200;
} elseif ($update_reservation['roomtype'] == "Deluxe" && $update_reservation['roomcapacity'] == "Double") {
    $rateperday = 500;
} elseif ($update_reservation['roomtype'] == "Suite" && $update_reservation['roomcapacity'] == "Double") {
    $rateperday = 800;
} elseif ($update_reservation['roomtype'] == "Regular" && $update_reservation['roomcapacity'] == "Family") {
    $rateperday = 500;
} elseif ($update_reservation['roomtype'] == "Deluxe" && $update_reservation['roomcapacity'] == "Family") {
    $rateperday = 750;
} elseif ($update_reservation['roomtype'] == "Suite" && $update_reservation['roomcapacity'] == "Family") {
    $rateperday = 1000;
}

// Calculate discount based on number of days
if ($reservation['num_days'] >= 3 && $reservation['num_days'] <= 5) {
    $discount = 0.10; // 10% discount for 3-5 days
} else if ($reservation['num_days'] >= 6) {
    $discount = 0.15; // 15% discount for 6 days and above
} else {
    $discount = 0; // No discount for less than 3 days
    
}

// Calculate discount based on payment type
if ($update_reservation['paymenttype'] == "Check") {
    $discountpay = 0.05;
} elseif ($update_reservation['paymenttype'] == "Credit Card") {
    $discountpay = 0.10;
}

// Calculate subtotal, discount, and total bills
$subTotal = $rateperday * $reservation['num_days'];
$totalDiscount = $subTotal * $discount;
$totalDiscounted = $subTotal - $totalDiscount;
$totalBills = $totalDiscounted * (1 - $discountpay);
?>

<div class="col-lg-5">
    <h2>Billing Statements:</h2>
    <div style="margin-left: -3rem;">
        <h3>No. of days: <?php echo $reservation['num_days']; ?> </h3>
        <h3>Sub-Total: ₱<?php echo number_format($subTotal, 2); ?> </h3>
        <h3>Discount: ₱<?php echo number_format($totalDiscount, 2); ?> </h3>
        <h3>Total Bills: ₱<?php echo number_format($totalBills, 2); ?> </h3>
    </div>
</div>

        
        </div>
    <?php endforeach; ?>
    <hr>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-primary" name="submit" >Update Reservation</button>
    </div>
    </div>
        </form>
      </div>   
    </div>
  </div>
<?php endforeach; ?>


<script>
    const inputElement = document.getElementById('customername');

    inputElement.addEventListener('input', function() {
      const inputValue = this.value;

      // Regular expression to check if the input contains letters with comma or period
      const pattern = /^[a-zA-Z,.\s]+$/;

      // If input matches the pattern, set class to is-valid, else set to is-invalid
      if (pattern.test(inputValue)) {
        this.classList.remove('is-invalid');
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
      } else {
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
      }
    });

    document.getElementById("contact").addEventListener("input", function() {
    const phoneNumberInput = this.value;
    const phoneNumberPattern = /^\d{4}-\d{3}-\d{4}$/;

    if (phoneNumberPattern.test(phoneNumberInput)) {
        // Valid phone number format
        this.classList.remove("is-invalid");
        this.classList.add("is-valid");
        
    } else {
        // Invalid phone number format
        this.classList.remove("is-valid");
        this.classList.add("is-invalid");
        
    }
});

document.getElementById("startdate").addEventListener("input", function() {
    validateDateInputs();
});

document.getElementById("enddate").addEventListener("input", function() {
    validateDateInputs();
});

function validateDateInputs() {
    const startDateInput = document.getElementById("startdate");
    const endDateInput = document.getElementById("enddate");
    const startDateValue = startDateInput.value;
    const endDateValue = endDateInput.value;

    if (startDateValue.trim() !== "" && endDateValue.trim() !== "") {
        if (new Date(startDateValue) <= new Date(endDateValue)) {
            // Both dates are valid, end date is not less than start date
            startDateInput.classList.remove("is-invalid");
            startDateInput.classList.add("is-valid");
            endDateInput.classList.remove("is-invalid");
            endDateInput.classList.add("is-valid");
            document.getElementById("startDateError").style.display = "none";
            document.getElementById("endDateError").style.display = "none";
        } else {
            // End date is less than start date
            startDateInput.classList.remove("is-valid");
            startDateInput.classList.add("is-invalid");
            endDateInput.classList.remove("is-valid");
            endDateInput.classList.add("is-invalid");
            document.getElementById("startDateError").style.display = "block";
            document.getElementById("endDateError").style.display = "block";
        }
    } else {
        // One or both inputs are empty
        startDateInput.classList.remove("is-valid");
        startDateInput.classList.add("is-invalid");
        endDateInput.classList.remove("is-valid");
        endDateInput.classList.add("is-invalid");
        document.getElementById("startDateError").style.display = "block";
        document.getElementById("endDateError").style.display = "block";
    }
}



  </script>
</body>
</html>
