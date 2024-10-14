<?php
include './conn_connection.php'; // Include the database connection

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = ""; // Variable to store error/success message

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data and escape it to prevent SQL injection
    $applying_country = $conn->real_escape_string($_POST['applying_country']);
    $no_of_adults = $conn->real_escape_string($_POST['no_of_adults']);
    $no_of_kids = $conn->real_escape_string($_POST['no_of_kids']);
    $main_fullname = $conn->real_escape_string($_POST['main_fullname']);
    $main_dob = $conn->real_escape_string($_POST['main_dob']);
    $main_gender = $conn->real_escape_string($_POST['main_gender']);
    $main_passport_no = $conn->real_escape_string($_POST['main_passport_no']);
    $main_passport_expiry = $conn->real_escape_string($_POST['main_passport_expiry']);
    $main_marital_status = $conn->real_escape_string($_POST['main_marital_status']);
    $main_ielts_results = $conn->real_escape_string($_POST['main_ielts_results']);
    $main_degree = $conn->real_escape_string($_POST['main_degree']);
    $main_study_field = $conn->real_escape_string($_POST['main_study_field']);
    $main_job = $conn->real_escape_string($_POST['main_job']);
    $main_highest_qualification = $conn->real_escape_string($_POST['main_highest_qualification']);
    $main_qualification_details = $conn->real_escape_string($_POST['main_qualification_details']);
    $main_experience = $conn->real_escape_string($_POST['main_experience']);
    $spouse_fullname = $conn->real_escape_string($_POST['spouse_fullname']);
    $spouse_dob = $conn->real_escape_string($_POST['spouse_dob']);
    $spouse_gender = $conn->real_escape_string($_POST['spouse_gender']);
    $spouse_passport_no = $conn->real_escape_string($_POST['spouse_passport_no']);
    $spouse_passport_expiry = $conn->real_escape_string($_POST['spouse_passport_expiry']);
    $spouse_ielts_results = $conn->real_escape_string($_POST['spouse_ielts_results']);
    $spouse_degree = $conn->real_escape_string($_POST['spouse_degree']);
    $spouse_study_field = $conn->real_escape_string($_POST['spouse_study_field']);
    $spouse_job = $conn->real_escape_string($_POST['spouse_job']);
    $spouse_highest_qualification = $conn->real_escape_string($_POST['spouse_highest_qualification']);
    $spouse_qualification_details = $conn->real_escape_string($_POST['spouse_qualification_details']);
    $spouse_experience = $conn->real_escape_string($_POST['spouse_experience']);

    // Prepared statement to insert data
    $stmt = $conn->prepare("INSERT INTO registration (applying_country, no_of_adults, no_of_kids, main_fullname, main_dob, main_gender, main_passport_no, main_passport_expiry, main_marital_status, main_ielts_results, main_degree, main_study_field, main_job, main_highest_qualification, main_qualification_details, main_experience, spouse_fullname, spouse_dob, spouse_gender, spouse_passport_no, spouse_passport_expiry, spouse_ielts_results, spouse_degree, spouse_study_field, spouse_job, spouse_highest_qualification, spouse_qualification_details, spouse_experience)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("ssssssssssssssssssssssssssss", 
            $applying_country, $no_of_adults, $no_of_kids, $main_fullname, $main_dob, $main_gender, 
            $main_passport_no, $main_passport_expiry, $main_marital_status, $main_ielts_results, 
            $main_degree, $main_study_field, $main_job, $main_highest_qualification, 
            $main_qualification_details, $main_experience, $spouse_fullname, $spouse_dob, 
            $spouse_gender, $spouse_passport_no, $spouse_passport_expiry, $spouse_ielts_results, 
            $spouse_degree, $spouse_study_field, $spouse_job, $spouse_highest_qualification, 
            $spouse_qualification_details, $spouse_experience
        );
        
        if ($stmt->execute()) {
          $new_id = $conn->insert_id; // Get the ID of the newly inserted record
          header("Location: viewregistration.php?id=" . $new_id); // Redirect to view page
          exit();
      } else {
          $message = "Error: " . $stmt->error;
      }


        // Close the statement
        $stmt->close();
    } else {
        // Display SQL statement preparation error
        $message = "Error preparing SQL statement: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Initial Registration</title>

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<style>
/* General Style */
body {
  font-family: 'Open Sans', sans-serif;
  color: #444444;
  background-color: #f8f9fa;
}

h2, h3 {
  color:#444444;
  margin-bottom: 20px;
}
.container1 {
    background-color: #fff;
    padding: 20px;
    margin: 0 auto;
    max-width: 800px;
    border-radius: 8px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
}

/* Form */
form {
  background-color: white;
  padding: 30px;
  margin: 20px 0;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
form h4 {
    margin-top: 30px;
    margin-bottom: 20px;
    font-size: 20px;
    color: #006fbe;
}

form label {
  display: block;
  margin-top: 15px;
  color: #444444;
}

form input, form select, form textarea {
  width: 100%;
  padding: 8px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

form button[type="submit"] {
  background-color: #006fbe;
  color: white;
  font-size: 16px;
  padding: 12px;
  margin-top: 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

form button[type="submit"]:hover {
  background-color: #008df1;
}
</style>
<body>
<?php include 'header.php'; ?>

<main id="main">
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Registration Form</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Registration Form</li>
        </ol>
      </div>
    </div>
  </section>

  <div class="container1">
    <?php if ($message): ?>
      <div class="alert alert-info">
        <?php echo $message; ?>
      </div>
    <?php endif; ?>
    
    <form action="" method="post">
      <label for="country">Applying Country:</label>
      <input type="text" id="country" name="applying_country" required />

      <label for="adults">No of Adults:</label>
      <input type="number" id="adults" name="no_of_adults" required />

      <label for="kids">No of Kids (Under 18):</label>
      <input type="number" id="kids" name="no_of_kids" required />

      <h4>Main Applicant</h4>
      <label for="main_fullname">Full Name:</label>
      <input type="text" id="main_fullname" name="main_fullname" required />
      <label for="main_dob">Date of Birth:</label>
      <input type="date" id="main_dob" name="main_dob" required />
      <label for="main_gender">Gender:</label>
      <select id="main_gender" name="main_gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
      <label for="main_passport_no">Passport Number:</label>
      <input type="text" id="main_passport_no" name="main_passport_no" required />
      <label for="main_passport_expiry">Passport Expiry Date:</label>
      <input type="date" id="main_passport_expiry" name="main_passport_expiry" required />
      <label for="main_marital_status">Marital Status:</label>
      <select id="main_marital_status" name="main_marital_status" required>
        <option value="single">Single</option>
        <option value="married">Married</option>
      </select>
      <label for="main_ielts_results">IELTS Results:</label>
      <input type="text" id="main_ielts_results" name="main_ielts_results" />
      <label for="main_degree">Degree:</label>
      <input type="text" id="main_degree" name="main_degree" />
      <label for="main_study_field">Field of Study:</label>
      <input type="text" id="main_study_field" name="main_study_field" />
      <label for="main_job">Job Title:</label>
      <input type="text" id="main_job" name="main_job" />
      <label for="main_highest_qualification">Highest Qualification:</label>
      <input type="text" id="main_highest_qualification" name="main_highest_qualification" />
      <label for="main_qualification_details">Qualification Details:</label>
      <textarea id="main_qualification_details" name="main_qualification_details"></textarea>
      <label for="main_experience">Experience:</label>
      <input type="text" id="main_experience" name="main_experience" />

      <h4>Spouse Details</h4>
      <label for="spouse_fullname">Full Name:</label>
      <input type="text" id="spouse_fullname" name="spouse_fullname" />
      <label for="spouse_dob">Date of Birth:</label>
      <input type="date" id="spouse_dob" name="spouse_dob" />
      <label for="spouse_gender">Gender:</label>
      <select id="spouse_gender" name="spouse_gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
      <label for="spouse_passport_no">Passport Number:</label>
      <input type="text" id="spouse_passport_no" name="spouse_passport_no" />
      <label for="spouse_passport_expiry">Passport Expiry Date:</label>
      <input type="date" id="spouse_passport_expiry" name="spouse_passport_expiry" />
      <label for="spouse_ielts_results">IELTS Results:</label>
      <input type="text" id="spouse_ielts_results" name="spouse_ielts_results" />
      <label for="spouse_degree">Degree:</label>
      <input type="text" id="spouse_degree" name="spouse_degree" />
      <label for="spouse_study_field">Field of Study:</label>
      <input type="text" id="spouse_study_field" name="spouse_study_field" />
      <label for="spouse_job">Job Title:</label>
      <input type="text" id="spouse_job" name="spouse_job" />
      <label for="spouse_highest_qualification">Highest Qualification:</label>
      <input type="text" id="spouse_highest_qualification" name="spouse_highest_qualification" />
      <label for="spouse_qualification_details">Qualification Details:</label>
      <textarea id="spouse_qualification_details" name="spouse_qualification_details"></textarea>
      <label for="spouse_experience">Experience:</label>
      <input type="text" id="spouse_experience" name="spouse_experience" />

      <button type="submit">Submit</button>
    </form>
  </div>
</main>

<?php include 'footer.php'; ?>
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
