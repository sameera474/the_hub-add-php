<?php
// Include the header file (assumes header.php contains the top layout code)
include 'header.php';

// Include the database connection
require_once './conn_connection.php';

// Query to fetch courses from the database
$query = "SELECT * FROM courses"; // Assume you have a 'courses' table in your database
$result = $conn->query($query);
?>

<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Course Overview</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Course Overview</li>
        </ol>
      </div>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- ======= Course List Section ======= -->
  <section id="event-list" class="event-list">
    <div class="container">
      <div class="row">

        <?php
        // Loop through the courses fetched from the database
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            // Output each course in a card layout
            echo '
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="card">
                <div class="card-img">
                  <img src="' . $row['course_image'] . '" alt="Course Image" />
                </div>
                <div class="card-body">
                  <h5 class="card-title">' . $row['course_title'] . '</h5>
                  <p class="fst-italic text-center">
                    ' . $row['course_date'] . '
                  </p>
                  <p class="card-text">
                    ' . $row['course_description'] . '
                  </p>
                  <p><strong>Course Amount:</strong> $' . $row['course_amount'] . '</p>
                  <p><strong>Course ID:</strong> ' . $row['course_id'] . '</p>
                </div>
                <form action="course_details.php" method="get">
                  <input type="hidden" name="course_id" value="' . $row['course_id'] . '">
                  <button type="submit">View details and Enroll</button>
                </form>
              </div>
            </div>
            ';
          }
        } else {
          echo "<p>No courses available at the moment.</p>";
        }
        ?>

      </div>
    </div>
  </section>
  <!-- End Course List Section -->
</main>
<!-- End #main -->

<!-- ======= Footer ======= -->
<?php include 'footer.php'; ?>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<?php
// Close the database connection
$conn->close();
?>
