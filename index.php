<!-- MAIN SOURCE: https://www.free-css.com/free-css-templates/page295/makaan-->
<?php
 
// Username is root
include 'config.php';
$mysqli = new mysqli($servername, $username, $password, $dbname);
 
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
// SQL query to select data from database
$sql = " SELECT * FROM event_details;";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<?php
session_start();

// Check if the user is logged in (username is stored in session)
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page if not logged in
    header("Location: log-in.html");
    exit();
}

// Retrieve the username from the session
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Community</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        

        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.php" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">Community</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="myProfile.php" class="nav-item nav-link">My Profile</a>
                        <div class="nav-item dropdown">
                            <a href="events.php" class="nav-item nav-link">Events</a>
                            
                        </div>
                        
                        <a href="logout.php" class="nav-item nav-link">Log-Out</a>
                    </div>
                    <a href="add-event.html" class="btn btn-primary px-3 d-none d-lg-flex">Add Event</a>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Find An <span class="text-primary">Exciting Event</span> With Your Future Family</h1>
                    <p class="animated fadeIn mb-4 pb-2">Looking for a fun event, a group of new people, or an exciting adventure. Find exciting and welcoming community events near you!</p>
                   
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-fluid" src="img/com.jpg" alt="">

                </div>
            </div>
        </div>
        <!-- Header End -->
       
       
       
       
       
       <!-- Search Form Start -->
        <form action="search.php" method="GET" class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-4">
                        <input type="text" name="keyword" class="form-control border-0 py-3" placeholder="Search Keyword">
                    </div>
                    <div class="col-md-3">
                        <select name="eventType" class="form-select border-0 py-3">
                            <option value="">All Events</option>
                            <option value="Meals">Meals</option>
                            <option value="Sports">Sports</option>
                            <option value="Games">Games</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="location" class="form-control border-0 py-3" placeholder="Location">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-dark border-0 w-100 py-3">Search</button>
                    </div>
                </div>
            </div>
        </form>


                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Events</h1>
                    <p> Here you can find the most popular catogories of events to connect to your local community!</p> 
               
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="subpages\meals.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-apartment.png" alt="Icon">
                                </div>
                                <h6>Meals</h6>
                                <span> </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="subpages\sports.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-villa.png" alt="Icon">
                                </div>
                                <h6>Sports</h6>
                                <span></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="subpages\games.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-house.png" alt="Icon">
                                </div>
                                <h6>Games</h6>
                                <span></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="subpages\other.php">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-housing.png" alt="Icon">
                                </div>
                                <h6>Other</h6>
                                <span></span>
                            </div>
                        </a>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End -->


        <!-- About Start -->

        <!-- About End -->


        <!-- Property List Start -->
        <div class="container-xxl py-5">
        <!-- TABLE CONSTRUCTION -->
       

                        <div class="container">
                            <div class="row g-4">
                            <?php
                                // Connect to your database
                                include 'config.php';

                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Retrieve event data from the database
                                $sql = "SELECT * FROM event_details";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // Fetch all rows into an array
                                    $rows = $result->fetch_all(MYSQLI_ASSOC);
                                    // Reverse the array
                                    $rows = array_reverse($rows);
                                
                                    // Output data of each row
                                    foreach ($rows as $row) {
                                        // Display event information in formatted blocks
                                        echo '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">';
                                        echo '<div class="property-item rounded overflow-hidden">';
                                        echo '<div class="position-relative overflow-hidden">';
                                        echo '<a href="subpages/indEvent.php?id=' . $row["id"] . '">';
                                        echo '<div class="image-container" style="width: 100%; height: 200px; overflow: hidden;">'; // Adjust height as needed
                                        echo '<img class="img-fluid" src="' . $row["image_url"] . '" alt="" style="width: 100%; height: auto;">'; // Ensure the image covers the container
                                        echo '</div>';
                                        echo '</a>';
                                        echo '<div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">Event</div>';
                                        echo '</div>';
                                        echo '<div class="p-4 pb-0">';
                                        echo '<h5 class="text-primary mb-3">' . $row["event_name"] . '</h5>';
                                        echo '<p><i class="fa fa-map-marker-alt text-primary me-2"></i>' . $row["location"] . '</p>';
                                        echo '<p><i class="fa fa-calendar-alt text-primary me-2"></i>' . $row["event_date"] . '</p>'; // Display event date
                                        echo '<p><i class="fa fa-tags text-primary me-2"></i>' . $row["category"] . '</p>'; // Display event category
                                        echo '</div>';
                                        echo '<div class="d-flex border-top">';
                                        echo '<small class="flex-fill text-center border-end py-2"><i class="fa fa-user text-primary me-2"></i>' . $row["num_people"] . '</small>';
                                        // Add additional details if needed
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';


                                    }
                                } else {
                                    echo "No events found.";
                                }

                                $conn->close();
                                ?>

                            </div>
                        </div>
                            
        <!-- Property List End -->


        <!-- Call to Action Start -->
    
        <!-- Call to Action End -->


        <!-- Team Start -->
        
        <!-- Team End -->


        <!-- Testimonial Start -->
        <
        <!-- Testimonial End -->
        

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Community</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>