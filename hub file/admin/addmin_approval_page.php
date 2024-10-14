<?php
require_once '../customer/conn_connection.php'; // Database connection

// Handle the approve/reject actions
if (isset($_POST['action']) && isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];
    $action = $_POST['action'];

    // Approve the student
    if ($action === 'approve') {
        $stmt = $conn->prepare("UPDATE students SET approval_status = 'Approved', approval_date = CURDATE() WHERE student_id = ?");
        $stmt->bind_param("s", $student_id);
        $stmt->execute();
        $stmt->close();
    }
    // Reject the student
    elseif ($action === 'reject') {
        $stmt = $conn->prepare("UPDATE students SET approval_status = 'Not Approved' WHERE student_id = ?");
        $stmt->bind_param("s", $student_id);
        $stmt->execute();
        $stmt->close();
    }
}

// Fetch all pending students
$pending_students = $conn->query("SELECT * FROM students WHERE approval_status = 'Pending'");

// Fetch all approved students
$approved_students = $conn->query("SELECT * FROM students WHERE approval_status = 'Approved'");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Registration Details</title>
    <link rel="stylesheet" href="styles.css">
    <link href="../customer/assets/img/favicon.png" rel="icon">
    <link href="../customer/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="../customer/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../customer/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../customer/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../customer/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../customer/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../customer/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../customer/assets/css/style.css" rel="stylesheet">

    <style>
        .payment-status {
            height: 12px;
            width: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }
        .payment-done { background-color: green; }
        .payment-not-done { background-color: red; }
    </style>
</head>

<body>
<main id="main">
    <!-- Admin Interface Section -->
    <section id="admin-interface" class="mt-5">
        <div class="container">
            <h2>Student Approval Interface</h2>
            <!-- Student Table -->
            <table class="table table-bordered table-striped mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Student ID</th>
                        <th>Course ID</th>
                        <th>Study Field</th>
                        <th>Payment</th>
                        <th>Date of Register</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($pending_students->num_rows > 0) {
                        while ($student = $pending_students->fetch_assoc()) {
                            echo "<tr>
                                <td>{$student['id']}</td>
                                <td>{$student['full_name']}</td>
                                <td>{$student['dob']}</td>
                                <td>{$student['gender']}</td>
                                <td>{$student['student_id']}</td>
                                <td>{$student['course_id']}</td>
                                <td>{$student['study_field']}</td>
                                <td><span class='payment-status " . ($student['payment_status'] === 'Done' ? "payment-done" : "payment-not-done") . "'></span>{$student['payment_status']}</td>
                                <td>{$student['registration_date']}</td>
                                <td>
                                    <form method='POST' style='display: inline;'>
                                        <input type='hidden' name='student_id' value='{$student['student_id']}'>
                                        <button type='submit' name='action' value='approve' class='btn btn-success btn-sm'>Approve</button>
                                    </form>
                                    <form method='POST' style='display: inline;'>
                                        <input type='hidden' name='student_id' value='{$student['student_id']}'>
                                        <button type='submit' name='action' value='reject' class='btn btn-danger btn-sm'>Not Approved</button>
                                    </form>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10' class='text-center'>No pending students.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Approved Students Section -->
    <section id="approved-students" class="mt-5">
        <div class="container">
            <h2>Approved Students List</h2>
            <!-- Approved Students Table -->
            <table class="table table-bordered table-striped mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Date of Birth</th>
                        <th>Student ID</th>
                        <th>Study Field</th>
                        <th>Approval Date</th>
                    </tr>
                </thead>
                <tbody id="approvedStudentsTableBody">
                    <?php
                    if ($approved_students->num_rows > 0) {
                        while ($student = $approved_students->fetch_assoc()) {
                            echo "<tr>
                                <td>{$student['id']}</td>
                                <td>{$student['full_name']}</td>
                                <td>{$student['dob']}</td>
                                <td>{$student['student_id']}</td>
                                <td>{$student['study_field']}</td>
                                <td>{$student['approval_date']}</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>No approved students.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="../customer/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../customer/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../customer/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../customer/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../customer/assets/vendor/php-email-form/validate.js"></script>
<script src="../customer/assets/js/main.js"></script>
</body>
</html>
