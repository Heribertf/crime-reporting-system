<?php
require_once "includes/sess.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CRS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script type="text/javascript">
        // Check if crime date and time are in the future
        function checkDateTime() {
            var currentDate = new Date();
            var crimeDate = new Date(document.getElementById("crime_date").value);
            var crimeTime = new Date(document.getElementById("crime_time").value);
            var crimeDateTime = new Date(crimeDate.getFullYear(), crimeDate.getMonth(), crimeDate.getDate(), crimeTime.getHours(), crimeTime.getMinutes(), crimeTime.getSeconds());
            console.log(crimeDate);
            console.log(crimeTime);
            console.log(crimeDateTime);
            console.log(currentDate)
            if (crimeDate > currentDate) {
                alert("The date and time of the crime cannot be in the future.");
                return false;
            }
            return true;
        }
        // Get user's location
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        // Set location inputs to user's position
        function showPosition(position) {
            document.getElementById("latitude").value = position.coords.latitude;
            document.getElementById("longitude").value = position.coords.longitude;
        }
    </script>

</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>CRS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo htmlspecialchars($_SESSION["username"]); ?></h6>
                        <span>User</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="report_crime_form.php" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>Report Crime</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Crime Report Form</h6>
                            <form action="crime_report.php" method="post" enctype="multipart/form-data" onsubmit="return checkDateTime();">
                                <label for="crime_type">Type of Crime:</label>
                                <select id="crime_type" name="crime_type">
                                    <option value="assault">Assault</option>
                                    <option value="burglary">Burglary</option>
                                    <option value="fraud">Fraud</option>
                                    <option value="robbery">Robbery</option>
                                    <option value="theft">Theft</option>
                                    <option value="vandalism">Vandalism</option>
                                    <option value="others">Others</option>
                                </select><br><br>

                                <label for="crime_location">Location of Crime:</label>
                                <input type="text" class="form-control" id="crime_location" name="crime_location" required><br><br>

                                <label for="crime_date">Date of Crime:</label>
                                <input type="date"  id="crime_date" name="crime_date" required><br><br>

                                <label for="crime_time">Time of Crime:</label>
                                <input type="time" id="crime_time" name="crime_time" required><br><br>

                                <label for="crime_description">Description of Crime:</label><br>
                                <textarea id="crime_description" class="form-control" name="crime_description" rows="4" cols="50" required></textarea><br><br>

                                <label for="crime_photo" class="form-label">Upload a Photo:</label><br>
                                <input type="file" class="form-control" id="crime_photo" name="crime_photo"><br><br>

                                <label for="latitude">Latitude:</label>
                                <input type="text" class="form-control" id="latitude" name="latitude"><br><br>

                                <label for="longitude">Longitude:</label>
                                <input type="text" class="form-control" id="longitude" name="longitude"><br><br>

                                <button type="button" onclick="getLocation()">Share My Location</button><br><br>

                                <input type="submit" class="btn btn-primary" value="Submit Report">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">CRS</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        $(document).ready(function() {
          $('form').submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            
            $.ajax({
              type: 'POST',
              url: 'crime_report.php',
              data: new FormData(this),
              cache: false,
              contentType: false,
              processData: false,
              success: function(response) {
                alert('Crime report submitted successfully');
              },
              error: function(xhr, status, error) {
                alert('Error submitting crime report: ' + error);
              }
            });
          });
        });

    </script>
</body>

</html>