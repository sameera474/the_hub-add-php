<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Registration Details</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file here -->

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
    <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Me &amp; Family</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="our-story.html">Our Story</a></li>
          <li><a href="events.html">Events</a></li>
          <li><a href="gallery.html">Gallery</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="active" href="contact.html">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <style>
    /* General Body Style */
body {
    font-family: 'Open Sans', sans-serif;
    background-color: #f8f9fa;
    color: #444444;
    margin: 0;
    padding: 0;
}

/* Container */
.container1 {
    background-color: #fff;
    padding: 20px;
    margin: 30px auto;
    max-width: 800px;
    border-radius: 8px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
}



/* Form Style */
form {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

form label {
    display: block;
    margin-top: 15px;
    color: #444444;
    font-weight: 500;
}

form input[type="text"], 
form input[type="date"], 
form input[type="number"], 
form textarea, 
form select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
    background-color: #fff;
}

form input[type="text"]:focus, 
form input[type="date"]:focus, 
form input[type="number"]:focus, 
form textarea:focus, 
form select:focus {
    border-color: #006fbe;
    outline: none;
}

form h4 {
    margin-top: 30px;
    margin-bottom: 20px;
    font-size: 20px;
    color: #006fbe;
}

form textarea {
    resize: vertical;
}

/* Submit Button */
form button[type="submit"] {
    background-color: #006fbe;
    color: white;
    font-size: 16px;
    padding: 12px;
    margin-top: 30px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

form button[type="submit"]:hover {
    background-color: #008df1;
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    .container1 {
        padding: 15px;
    }

    form {
        padding: 20px;
    }
}

  </style>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Edit Registration Details</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Edit Registration Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <div class="container1">
        

        <form action="/update_registration" method="post">

            <!-- Applying Country & Number of Applicants -->
            <label for="country">Applying Country:</label>
            <input type="text" id="country" name="applying_country" value="USA" required />

            <label for="adults">No of Adults:</label>
            <input type="number" id="adults" name="no_of_adults" value="2" required />

            <label for="kids">No of Kids (Under 18):</label>
            <input type="number" id="kids" name="no_of_kids" value="1" required />

            <!-- Main Applicant Details -->
            <h4>Main Applicant</h4>
            <label for="main_fullname">Full Name:</label>
            <input type="text" id="main_fullname" name="main_fullname" value="John Doe" required />

            <label for="main_dob">Date of Birth:</label>
            <input type="date" id="main_dob" name="main_dob" value="1985-06-15" required />

            <label for="main_gender">Gender:</label>
            <select id="main_gender" name="main_gender" required>
                <option value="Male" selected>Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="main_passport">Passport No:</label>
            <input type="text" id="main_passport" name="main_passport_no" value="123456789" required />

            <label for="main_passport_expiry">Passport Expiry Date:</label>
            <input type="date" id="main_passport_expiry" name="main_passport_expiry" value="2030-12-31" required />

            <label for="main_marital_status">Marital Status:</label>
            <select id="main_marital_status" name="main_marital_status" required>
                <option value="Single">Single</option>
                <option value="Married" selected>Married</option>
                <option value="Divorced">Divorced</option>
            </select>

            <label for="main_ielts">IELTS/PTE & Results:</label>
            <input type="text" id="main_ielts" name="main_ielts_results" value="6.5" />

            <label for="main_degree">Bachelor's or Master’s Degree:</label>
            <input type="text" id="main_degree" name="main_degree" value="Bachelor's" required />

            <label for="main_study_field">Study Field:</label>
            <input type="text" id="main_study_field" name="main_study_field" value="Computer Science" required />

            <label for="main_job">Current Job:</label>
            <input type="text" id="main_job" name="main_job" value="Software Developer" required />

            <label for="main_qualification">Highest Educational Qualification:</label>
            <input type="text" id="main_qualification" name="main_highest_qualification" value="Bachelor's" required />

            <label for="main_qualification_details">Qualification Details:</label>
            <textarea id="main_qualification_details" name="main_qualification_details" rows="3" required>Graduated with honors</textarea>

            <label for="main_experience">Provable Working Experience:</label>
            <textarea id="main_experience" name="main_experience" rows="3" required>5 years in software development</textarea>

            <!-- Spouse Details -->
            <h4>Spouse (If Applicable)</h4>
            <label for="spouse_fullname">Full Name:</label>
            <input type="text" id="spouse_fullname" name="spouse_fullname" value="Jane Doe" />

            <label for="spouse_dob">Date of Birth:</label>
            <input type="date" id="spouse_dob" name="spouse_dob" value="1987-08-21" />

            <label for="spouse_gender">Gender:</label>
            <select id="spouse_gender" name="spouse_gender">
                <option value="Male">Male</option>
                <option value="Female" selected>Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="spouse_passport">Passport No:</label>
            <input type="text" id="spouse_passport" name="spouse_passport_no" value="987654321" />

            <label for="spouse_passport_expiry">Passport Expiry Date:</label>
            <input type="date" id="spouse_passport_expiry" name="spouse_passport_expiry" value="2032-11-30" />

            <label for="spouse_ielts">IELTS/PTE & Results:</label>
            <input type="text" id="spouse_ielts" name="spouse_ielts_results" value="7.0" />

            <label for="spouse_degree">Bachelor's or Master’s Degree:</label>
            <input type="text" id="spouse_degree" name="spouse_degree" value="Master's" />

            <label for="spouse_study_field">Study Field:</label>
            <input type="text" id="spouse_study_field" name="spouse_study_field" value="Finance" />

            <label for="spouse_job">Current Job:</label>
            <input type="text" id="spouse_job" name="spouse_job" value="Financial Analyst" />

            <label for="spouse_qualification">Highest Educational Qualification:</label>
            <input type="text" id="spouse_qualification" name="spouse_highest_qualification" value="Master's" />

            <label for="spouse_qualification_details">Qualification Details:</label>
            <textarea id="spouse_qualification_details" name="spouse_qualification_details" rows="3">Graduated with distinction</textarea>

            <label for="spouse_experience">Provable Working Experience:</label>
            <textarea id="spouse_experience" name="spouse_experience" rows="3">3 years in finance</textarea>

            <!-- Submit Button -->
            <button type="submit">Update Registration</button>
        </form>
    </div>
    <footer id="footer">
        <div class="container">
          <h3>MeFamily</h3>
          <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
          <div class="social-links">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
          <div class="copyright">
            &copy; Copyright <strong><span>MeFamily</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/family-multipurpose-html-bootstrap-template-free/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </footer><!-- End Footer -->
    
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
      <!-- Vendor JS Files -->
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
      <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
      <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>
    
      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>
    

</body>

</html>
