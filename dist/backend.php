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
                    <li class="nav-item"><a class="nav-link" href="#page-top">Home</a></li>
                        <li class="nav-item"><a class="nav-link " href="#about">Company’s Profile</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" href="">Reservation</a></li>
                        <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Reservation: (Supply the Necessary Information below)</h1>
      </div>
      <div class="modal-body">
        <div class="container">
        <div class="alert alert-primary d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="50" height="50" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
  <div>
  <h6>Enjoy our 10% discount for 3-5 days of reservation or Enjoy our 15% discount for 6 days or above of reservation </h6>
  </div>
</div>
     
      <?php 
        if(isset($_POST['submit'])){
        $name = $_POST['customername'];
        $contact = $_POST['contactnumber'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $roomtype = $_POST['radio-stacked'];
        $capacity = $_POST['Capacity-stacked'];
        $payment = $_POST['Payment-stacked'];

      
            // Validate Name
            if (empty($_POST["customername"])) {
                echo  "Full Name is required";
            } elseif (!preg_match("/^[a-zA-Z ,.']*$/", $_POST["customername"])) {
            echo "Invalid Full Name";
            } else {
                echo "<h5> <b>Customer Name: </b>".$name."</h5>";
            }
        
            // Validate Contact Number
            if (empty($_POST["contactnumber"])) {
              echo "Contact Number is required";
            } elseif (!preg_match("/^\d{4}-\d{3}-\d{4}$/", $_POST["contactnumber"])) {
                echo "Invalid Contact Number format. Please use 4-3-4 format (e.g., 1234-567-8901)";
            } else {
                date_default_timezone_set(date_default_timezone_get());
                $currentTime = date("h:i:s A");
                $today = date("Y-m-d");
                echo "<h5> <b>Customer Name: </b>".$contact."</h5>";?>
                <div class="row">
                <?php
                echo "<div class='col-lg-6'><h5><b> Date reserved:</b> ".date("F j, Y", strtotime($today))."</h5></div><div class='col-lg-6'><h5><b>Time: </b>".$currentTime."</h5><br></div>";
            }

              // Validate End Date
    if (empty($_POST["enddate"])|| empty($_POST["startdate"])) {
       echo "End Date is required";
    } elseif ($_POST["enddate"] < $_POST["startdate"]) {
        echo "End Date cannot be less than Start Date";
    } else {
        echo "<h5><b>Date of Reservation </b></h5><div class='col-lg-1'></div>";
        echo  "<div class='col-lg-5'><h5><b>From: </b>".date("F j, Y", strtotime($startdate))."</h5></div>";
        echo  "<div class='col-lg-6'><h5><b>To: </b>".date("F j, Y", strtotime($enddate))."</h5></div>";
        echo "";
    }
    ?>
    <div class="col-lg-5">
    </div>
    <div class="col-lg-7">
    
    </div>
    </div>
    
    <?php
        }
        $priceroom = 0;
        $pricepayment = 0;
        $discount = 0;
        $date3 = 0;
        ?>
        

        <?php
        if($capacity == "Single"){
            if($roomtype == "Regular"){
                $priceroom = 100;
            }else if($roomtype == "Deluxe"){
                $priceroom = 300;
            }else if($roomtype == "Suite"){
                $priceroom =500;
            }else{
                echo "Invalid Rooms";
            }
        }else if($capacity == "Double"){
            if($roomtype == "Regular"){
                $priceroom = 200;
            }else if($roomtype == "Deluxe"){
                $priceroom = 500;
            }else if($roomtype == "Suite"){
                $priceroom = 800;
            }else{
                echo "Invalid Rooms";
            }
        }else if($capacity == "Family"){
            if($roomtype == "Regular"){
                $priceroom = 500;
            }else if($roomtype == "Deluxe"){
                $priceroom = 750;
            }else if($roomtype == "Suite"){
                $priceroom = 1000;
            }else{
                echo "Invalid Rooms";
            }
        }else{
            echo "Invalid Rooms Capacity";
        }

        if($payment == "Cash"){
            $pricepayment = 0;
        }else if($payment == "Check"){
            $pricepayment = .05;
        }else if($payment == "Credit Card"){
            $pricepayment = .10;
        }else{
            echo "invalid mode of payment";
        }
        $date1 = date("j", strtotime($enddate));
        $date2 = date("j", strtotime($startdate));
        $date3 = $date1-$date2;

        if($date3 <= 5){
            $discount = .10;
        }elseif($date3 > 5){
            $discount = .15;
        }
       
        $subtotal = ($priceroom * $date3);
        $discounttotal =  $subtotal  * ($discount-$pricepayment);
        $total = $subtotal - $discounttotal;
        ?>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <br>
                <h5>Room Type: <b><?php echo $roomtype; ?></b></h5>
                <h5>Room Capacity: <b><?php echo $roomtype; ?></b></h5>
                <h5>Payment Type: <b><?php echo $payment; ?></b></h5>
            </div>
            <div class="col-lg-6">
            <h4><b>Billing Statement</b></h4>
            <h5>No. of Days: <b><?php echo $date3; ?></b></h5>
                <h5>Subtotal: <b>₱<?php echo number_format($subtotal, 2); ?></b></h5>
                <h5>Discount: <b>₱<?php echo number_format($discounttotal, 2); ?></b></h5>
                <h5>Total bill: <b>₱<?php echo number_format($total, 2); ?></b></h5>
            </div>
            <a href="ReservationEnriqueCanlas.php" class="btn btn-secondary" tabindex="-1" role="button" aria-disabled="true">Home</a>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">Dr. Pepe</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">A Five Star Hotel On-line Reservation.</h2>
                        <a class="btn btn-primary" href="#projects">BOOK NOW</a>
                    </div>
                </div>
            </div>
        </header>
       
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Jayem 2023</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script>
    window.onload = function() {
      var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
      myModal.show();
    };
  </script>
    </body>
</html>
