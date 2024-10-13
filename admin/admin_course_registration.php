<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to admin login page if not logged in
    header("Location: admin_login.php");
    exit;
}

require_once '../customer/conn_connection.php'; // Database connection

$error_message = '';
$success_message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form processing code here (same as the previous form processing code)

    // Collect and sanitize form inputs
    $course_name = trim($_POST['course_name']);
    $course_id = trim($_POST['course_id']);
    $course_start_date = trim($_POST['course_start_date']);
    $course_end_date = trim($_POST['course_end_date']);
    $brief_course_description = trim($_POST['brief_course_description']);
    $course_description = trim($_POST['course_description']);
    $course_amount = trim($_POST['course_amount']);
    $currency = trim($_POST['currency']);
    $places = trim($_POST['places']);
    $course_dashboard_image = ''; // Image handling code

    // Handle file upload for the course image
    if (isset($_FILES['course_dashboard_image']) && $_FILES['course_dashboard_image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/'; // Ensure this directory exists and is writable
        $file_name = basename($_FILES['course_dashboard_image']['name']);
        $target_file = $upload_dir . $file_name;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['course_dashboard_image']['tmp_name'], $target_file)) {
            $course_dashboard_image = $target_file;
        } else {
            $error_message = 'Failed to upload the course image.';
        }
    }

    // Insert form data into the database
    if (empty($error_message)) {
        $stmt = $conn->prepare("INSERT INTO course_registrations (course_name, course_id, course_start_date, course_end_date, brief_course_description, course_description, course_amount, currency, places, course_dashboard_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sissssdsis", $course_name, $course_id, $course_start_date, $course_end_date, $brief_course_description, $course_description, $course_amount, $currency, $places, $course_dashboard_image);

        if ($stmt->execute()) {
            $success_message = "Course registered successfully!";
        } else {
            $error_message = "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Course Registration</title>
    <!-- Add your CSS links here -->
</head>
<body>
<?php include '../customer/header.php'; ?>

<main id="main">
    <!-- Breadcrumbs section as in your original file -->

    <div class="container1">
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Error Message -->
            <?php if (!empty($error_message)) : ?>
                <div class="error-message" style="color: red;"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <!-- Success Message -->
            <?php if (!empty($success_message)) : ?>
                <div class="success-message" style="color: green;"><?php echo $success_message; ?></div>
            <?php endif; ?>

            <!-- Form fields -->
            <h4>Fill the Course Details</h4>
            <label for="course_title">Course Title:</label>
            <input type="text" id="courseName" name="course_name" placeholder="Course Name: Mathematics, English, IT" required />

            <label for="course_id">Course Identification Number (Course ID):</label>
            <input type="number" id="course_id" placeholder="ID_1" name="course_id" required />

            <label for="course_start_date">Course Start Date:</label>
            <input type="date" id="course_start_date" name="course_start_date" required />

            <label for="course_end_date">Course End Date:</label>
            <input type="date" id="course_end_date" name="course_end_date" required />

            <label for="brief_course_description">Course Description in Brief:</label>
            <textarea id="brief_course_description" name="brief_course_description" placeholder="Course Details in brief for Overview page" rows="1" maxlength="100"></textarea>

            <label for="course_description">Course Description:</label>
            <textarea id="course_description" name="course_description" rows="5"></textarea>

            <label for="course_amount">Course Amount:</label>
            <input type="number" id="course_amount" name="course_amount" placeholder="Enter course amount" step="0.01" min="0" required />

            <label for="currency">Currency:</label>
            <select id="currency" name="currency">
                <option value="USD">$ (USD)</option>
                <option value="EUR">€ (Euro)</option>
                <option value="LKR">LKR (Sri Lankan Rupee)</option>
            </select>

            <label for="study_places">No of Study Places:</label>
            <input type="number" id="places" name="places" placeholder="student count" required />

            <label for="course_dashboard_image">Upload Course Dashboard Image:</label>
            <input type="file" id="course_dashboard_image" name="course_dashboard_image" accept="image/*">

            <!-- Submit Button -->
            <button type="submit">Submit Registration</button>
        </form>
    </div>

<?php include '../customer/footer.php'; ?>
</main>
</body>
</html>
