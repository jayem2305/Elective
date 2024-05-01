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
                        <li class="nav-item"><a class="nav-link "  href="reservations_list.php" >Reserved information</a></li>
                        <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Reservation: (Supply the Necessary Information below)</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="index.php?action=processReservation">

       
    <div class="row">
        <div class="col-lg-6">
            <label for="customername" class="form-label">Customer name</label>
            <input type="text" class="form-control is-invalid" id="customername" name="customername" placeholder="Lastname, Firstname Middle Initial" required>
            <div class="invalid-feedback" id="name">
            Please enter Your FullName.
            </div>
        </div>
        <div class="col-lg-6">
        <div class="mb-3">
            <label for="contact" class="form-label">Contact Number</label>
            <input type="tel" class="form-control is-invalid"pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" name="contactnumber" id="contact" placeholder="09xx-xxx-xxxx" maxlength="13" required>
            <div class="invalid-feedback">
            Please enter Your Contact Number.
            </div>
        </div>
        </div>
        <hr>
        <label  class="form-label fw-bolder" >Reservation Date</label>
        <div class="col-lg-6 mb-3">
        <label for="startdate" class="form-label">From: </label>
        <input type="date" class="form-control is-invalid" id="startdate" name="startdate" required>
            <div class="invalid-feedback" id="startDateError">Enter your prefered Date</div>
        </div>
        <div class="col-lg-6 mb-3">
        <label for="enddate" class="form-label">To: </label>
        <input type="date" class="form-control is-invalid" id="enddate" name="enddate" required>
            <div class="invalid-feedback" id="endDateError">Enter your prefered Date</div>
        </div>
        <div class="col-lg-4 mb-3">
            <!--roomtype-->
        <label for="validationServer01" class="form-label">Room Type: </label>
            <div class="form-check ">
                <input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" value="Suite" checked >
                <label class="form-check-label text-black" for="validationFormCheck2">Suite</label>
            </div>
            <div class="form-check ">
                <input type="radio" class="form-check-input" id="validationFormCheck3"value="Deluxe" name="radio-stacked" >
                <label class="form-check-label text-black" for="validationFormCheck3">Deluxe</label>
            </div>
            <div class="form-check ">
                <input type="radio" class="form-check-input" id="validationFormCheck4"value="Regular" name="radio-stacked" >
                <label class="form-check-label text-black" for="validationFormCheck4">Regular</label>
            </div>
        </div>
         <!--roomtypecapacity-->
        <div class="col-lg-4 mb-3">
        <label for="validationServer01" class="form-label">Room Capacity: </label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="validationFormCheck2"value="Family"name="Capacity-stacked"checked required>
                <label class="form-check-label text-black" for="validationFormCheck2">Family</label>
            </div>
            <div class="form-check ">
                <input type="radio" class="form-check-input" id="validationFormCheck3"value="Double" name="Capacity-stacked" required>
                <label class="form-check-label text-black" for="validationFormCheck3">Double</label>
            </div>
            <div class="form-check ">
                <input type="radio" class="form-check-input" id="validationFormCheck3"value="Single" name="Capacity-stacked" required>
                <label class="form-check-label text-black" for="validationFormCheck3">Single</label>
            </div>
        </div>
         <!--paymenttype-->
        <div class="col-lg-4 mb-3">
        <label for="validationServer01" class="form-label">Payment Type: </label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="validationFormCheck2"value="Cash" name="Payment-stacked"checked  required>
                <label class="form-check-label text-black" for="validationFormCheck2">Cash</label>
            </div>
            <div class="form-check ">
                <input type="radio" class="form-check-input" id="validationFormCheck3"value="Check" name="Payment-stacked" required>
                <label class="form-check-label text-black" for="validationFormCheck3">Check</label>
            </div>
             <div class="form-check ">
                <input type="radio" class="form-check-input" id="validationFormCheck3"value="Credit Card" name="Payment-stacked" required>
                <label class="form-check-label text-black" for="validationFormCheck3">Credit Card</label>
            </div>
        </div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="reset" class="btn btn-secondary">Clear</button>
        <button type="submit" class="btn btn-primary" name="submit" >Submit Reservation</button>
    </div>
        </form>
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
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">BOOK NOW</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="projects-section" id="about">
            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/service.png" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>About Us</h4>
                            <p class="text-black-50 mb-0">DR. Pepe stays devoted to helping individuals attain their best potential. Even as we grow, we place the highest value on people. DR. Pepe suites, founded on family values, provides a work climate in which coworkers become close friends. Our everyday goal is to meet the requirements of our visitors, and this commitment is vital to our business. DR. Pepe Suites is well-known for its revolutionary guest-centric strategy, which has helped it become one of the most successful hospitality companies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Signup-->
        <section class="signup-section" id="signup">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-10 col-lg-8 mx-auto text-center" style="margin-top: 7rem;">
                        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5">Subscribe to receive updates!</h2>
                        <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Email address input-->
                            <div class="row input-group-newsletter">
                                <div class="col"><input class="form-control" id="emailAddress" type="email" placeholder="Enter email address..." aria-label="Enter email address..." data-sb-validations="required,email" /></div>
                                <div class="col-auto"><button class="btn btn-primary" id="submitButton" type="submit">Notify Me!</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">143 Mwahmwah St. Barangay kissko28, Sayo lang City</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="#!">jrizz@gmail.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">+6399-9872-6506</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Jayem 2023</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script>
    const inputElement = document.getElementById('customername');

    inputElement.addEventListener('input', function() {
      const inputValue = this.value;

      // Regular expression to check if the input contains letters with comma or period
      const pattern = /^[a-zA-Z,.\s]+$/;

      // If input matches the pattern, set class to is-valid, else set to is-invalid
      if (pattern.test(inputValue)) {
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

