
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Payment Slip</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<?php include 'header.php'; ?>

<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Upload Payment Slip</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Upload Payment Slip</li>
                </ol>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="container1">
            <form action="uploadslip.php" method="post" enctype="multipart/form-data">
                <label for="student_name">Student Name:</label>
                <input type="text" id="student_name" name="student_name" required />

                <label for="course_name">Course Name:</label>
                <input type="text" id="course_name" name="course_name" required />

                <label for="payment_slip">Upload Payment Slip (PDF, JPG, PNG):</label>
                <input type="file" id="payment_slip" name="payment_slip" accept=".pdf, .jpg, .png" required />

                <button type="submit" name="submit">Upload Slip</button>
            </form>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
