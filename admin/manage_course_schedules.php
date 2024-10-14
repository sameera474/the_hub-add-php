<?php
// Database connection
require_once '../customer/conn_connection.php';

// Initialize messages and variables
$error_message = '';
$success_message = '';

// Handle form submission to insert schedule
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize form inputs
    $course_name = trim($_POST['course_name']);
    $course_id = trim($_POST['course_id']);
    $instructor = trim($_POST['instructor']);
    $schedule_date = trim($_POST['date']);
    $schedule_time = trim($_POST['time']);
    $location = trim($_POST['location']);

    // Validate that required fields are not empty
    if (empty($course_name) || empty($course_id) || empty($instructor) || empty($schedule_date) || empty($schedule_time) || empty($location)) {
        $error_message = 'Please fill all the required fields.';
    } else {
        // Insert course schedule into the database
        $stmt = $conn->prepare("INSERT INTO course_schedules (course_name, course_id, instructor, schedule_date, schedule_time, location) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sissss", $course_name, $course_id, $instructor, $schedule_date, $schedule_time, $location);

        if ($stmt->execute()) {
            $success_message = 'Course schedule created successfully.';
        } else {
            $error_message = 'Error: ' . $stmt->error;
        }

        $stmt->close();
    }
}

// Fetch all the course schedules from the database
$schedules = $conn->query("SELECT * FROM course_schedules ORDER BY schedule_date, schedule_time");

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Course Schedules</title>

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      color: #444444;
      background-color: #f8f9fa;
    }
    h2, h3 {
      color: #444444;
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
    form input, form select {
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
</head>

<body>

<main id="main">

  <!-- Breadcrumbs -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Manage Course Schedules</h2>
        <ol>
          
          <li><a href="admin_logout.php">Logout</a></li>
          <li>Manage Course Schedules</li>
        </ol>
      </div>
    </div>
  </section><!-- End Breadcrumbs -->

  <div class="container1">
    <!-- Display error or success messages -->
    <?php if (!empty($error_message)) : ?>
      <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <?php if (!empty($success_message)) : ?>
      <div class="alert alert-success"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <form action="" method="post">
      <!-- Course Schedule Form -->
      <h4>Course Schedules</h4>

      <label for="course_name">Course Name:</label>
      <input type="text" id="course_name" name="course_name" required>

      <label for="course_id">Course Identification Number (Course ID):</label>
      <input type="number" id="course_id" name="course_id" required />

      <label for="instructor">Instructor:</label>
      <input type="text" id="instructor" name="instructor" required>

      <label for="date">Date:</label>
      <input type="date" id="date" name="date" required>

      <label for="time">Time:</label>
      <input type="time" id="time" name="time" required>

      <label for="location">Location:</label>
      <input type="text" id="location" name="location" required>

      <button type="submit">Create/Update Schedule</button>
    </form>

    <h4>Scheduled Courses</h4>
    <div id="scheduleList">
      <!-- Dynamically populate this with schedules from the database -->
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Course Name</th>
            <th>Instructor</th>
            <th>Date</th>
            <th>Time</th>
            <th>Location</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($schedules->num_rows > 0) {
            while ($row = $schedules->fetch_assoc()) {
              echo "<tr>
                <td>{$row['course_name']}</td>
                <td>{$row['instructor']}</td>
                <td>{$row['schedule_date']}</td>
                <td>{$row['schedule_time']}</td>
                <td>{$row['location']}</td>
              </tr>";
            }
          } else {
            echo "<tr><td colspan='5'>No courses scheduled yet.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

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
