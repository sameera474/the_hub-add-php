<?php
include './conn_connection.php'; // Include the database connection

// Assume we're getting the registration ID from a GET parameter
// In a real application, you'd want to validate and sanitize this input
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// If no ID is provided, fetch the most recent registration
if ($id === 0) {
    $sql = "SELECT id FROM registration ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
    } else {
        echo "No registrations found.";
        exit;
    }
}

// Prepare SQL to fetch the registration details
$sql = "SELECT * FROM registration WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No registration found with this ID.";
    exit;
}

$stmt->close();
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
  <style>
    /* General Style */
/* General Style */
body {
  font-family: 'Open Sans', sans-serif;
  color: #444444;
  background-color: #f8f9fa;
  margin: 0; /* Reset default margin */
  padding: 0; /* Reset default padding */
}

h2, h3 {
  color: #444444;
  margin-bottom: 20px;
}

/* Container */
.container1 {
  background-color: #fff;
  padding: 20px;
  margin: 20px auto;
  max-width: 800px;
  border-radius: 8px;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
}

/* Table */
.table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

.table th, .table td {
  border: 1px solid #ccc;
  padding: 12px;
  text-align: left;
}

.table th {
  background-color: #006fbe;
  color: white;
}

.table tr:nth-child(even) {
  background-color: #f2f2f2;
}

.table tr:hover {
  background-color: #e9e9e9;
}

/* Buttons */
.edit-button {
  display: inline-block; /* Ensure proper layout */
  background-color: #006fbe;
  color: white;
  font-size: 16px;
  padding: 10px 15px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
  margin: 10px 0;
  text-decoration: none; /* Remove underline */
  text-align: center; /* Center text */
}

.edit-button:hover {
  background-color: #008df1;
}

/* Alerts */
.alert {
  padding: 15px;
  background-color: #f9f9f9;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-top: 20px;
}

.alert-info {
  border-color: #006fbe;
  color: #006fbe;
}

/* Responsive Design */
@media (max-width: 768px) {
  .container1 {
    padding: 15px;
    margin: 10px;
  }

  .table th, .table td {
    padding: 8px;
    font-size: 14px;
  }

  .edit-button {
    font-size: 14px;
    padding: 8px 10px;
    margin: 5px 0; /* Adjust margin for smaller screens */
  }
}

/* Additional Styles for Heading */
h4 {
  color: #333; /* Darker color for headings */
  margin-top: 20px; /* Spacing above h4 elements */
}

strong {
  color: #006fbe; /* Color for strong elements for emphasis */
}

    </style>
</head>
<body>
<?php include 'header.php'; ?>

    <main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Registration Details</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Registration Details</li>
        </ol>
      </div>
    </div>
  </section>


        <div class="container1">
       
            <p><strong>Applying Country:</strong> <?php echo htmlspecialchars($row['applying_country']); ?></p>
            <p><strong>No of Adults:</strong> <?php echo htmlspecialchars($row['no_of_adults']); ?></p>
            <p><strong>No of Kids (Under 18):</strong> <?php echo htmlspecialchars($row['no_of_kids']); ?></p>

            <h4>Main Applicant</h4>
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($row['main_fullname']); ?></p>
            <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($row['main_dob']); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($row['main_gender']); ?></p>
            <p><strong>Passport No:</strong> <?php echo htmlspecialchars($row['main_passport_no']); ?></p>
            <p><strong>Passport Expiry Date:</strong> <?php echo htmlspecialchars($row['main_passport_expiry']); ?></p>
            <p><strong>Marital Status:</strong> <?php echo htmlspecialchars($row['main_marital_status']); ?></p>
            <p><strong>IELTS/PTE & Results:</strong> <?php echo htmlspecialchars($row['main_ielts_results']); ?></p>
            <p><strong>Bachelor's or Master's Degree:</strong> <?php echo htmlspecialchars($row['main_degree']); ?></p>
            <p><strong>Study Field:</strong> <?php echo htmlspecialchars($row['main_study_field']); ?></p>
            <p><strong>Current Job:</strong> <?php echo htmlspecialchars($row['main_job']); ?></p>
            <p><strong>Highest Educational Qualification:</strong> <?php echo htmlspecialchars($row['main_highest_qualification']); ?></p>
            <p><strong>Qualification Details:</strong> <?php echo htmlspecialchars($row['main_qualification_details']); ?></p>
            <p><strong>Provable Working Experience:</strong> <?php echo htmlspecialchars($row['main_experience']); ?></p>

            <h4>Spouse (If Applicable)</h4>
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($row['spouse_fullname']); ?></p>
            <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($row['spouse_dob']); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($row['spouse_gender']); ?></p>
            <p><strong>Passport No:</strong> <?php echo htmlspecialchars($row['spouse_passport_no']); ?></p>
            <p><strong>Passport Expiry Date:</strong> <?php echo htmlspecialchars($row['spouse_passport_expiry']); ?></p>
            <p><strong>IELTS/PTE & Results:</strong> <?php echo htmlspecialchars($row['spouse_ielts_results']); ?></p>
            <p><strong>Bachelor's or Master's Degree:</strong> <?php echo htmlspecialchars($row['spouse_degree']); ?></p>
            <p><strong>Study Field:</strong> <?php echo htmlspecialchars($row['spouse_study_field']); ?></p>
            <p><strong>Current Job:</strong> <?php echo htmlspecialchars($row['spouse_job']); ?></p>
            <p><strong>Highest Educational Qualification:</strong> <?php echo htmlspecialchars($row['spouse_highest_qualification']); ?></p>
            <p><strong>Qualification Details:</strong> <?php echo htmlspecialchars($row['spouse_qualification_details']); ?></p>
            <p><strong>Provable Working Experience:</strong> <?php echo htmlspecialchars($row['spouse_experience']); ?></p>

            <a href="editregistration.php?id=<?php echo $id; ?>" class="edit-button">Edit Registration</a>
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